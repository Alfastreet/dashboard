<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Liquidations Controller
 *
 * @property \App\Model\Table\LiquidationsTable $Liquidations
 * @method \App\Model\Entity\Liquidation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LiquidationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Casinos', 'Machines', 'Months'],
        ];
        $liquidations = $this->paginate($this->Liquidations);

        $this->set(compact('liquidations'));
    }

    /**
     * View method
     *
     * @param string|null $id Liquidation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $liquidation = $this->Liquidations->get($id, [
            'contain' => ['Casinos', 'Machines', 'Months'],
        ]);

        $this->set(compact('liquidation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $liquidation = $this->Liquidations->newEmptyEntity();
        if ($this->request->is('post')) {
            $liquidation = $this->Liquidations->patchEntity($liquidation, $this->request->getData());
            if ($this->Liquidations->save($liquidation)) {
                $this->Flash->success(__('The liquidation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The liquidation could not be saved. Please, try again.'));
        }
        $casinos = $this->Liquidations->Casinos->find('list', ['limit' => 200])->all();
        $machines = $this->Liquidations->Machines->find('list', ['limit' => 200])->all();
        $months = $this->Liquidations->Months->find('list', ['limit' => 200])->all();
        $this->set(compact('liquidation', 'casinos', 'machines', 'months'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Liquidation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $liquidation = $this->Liquidations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $liquidation = $this->Liquidations->patchEntity($liquidation, $this->request->getData());
            if ($this->Liquidations->save($liquidation)) {
                $this->Flash->success(__('The liquidation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The liquidation could not be saved. Please, try again.'));
        }
        $casinos = $this->Liquidations->Casinos->find('list', ['limit' => 200])->all();
        $machines = $this->Liquidations->Machines->find('list', ['limit' => 200])->all();
        $months = $this->Liquidations->Months->find('list', ['limit' => 200])->all();
        $this->set(compact('liquidation', 'casinos', 'machines', 'months'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Liquidation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $liquidation = $this->Liquidations->get($id);
        if ($this->Liquidations->delete($liquidation)) {
            $this->Flash->success(__('The liquidation has been deleted.'));
        } else {
            $this->Flash->error(__('The liquidation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
