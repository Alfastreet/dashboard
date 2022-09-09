<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Liquidation Controller
 *
 * @property \App\Model\Table\LiquidationTable $Liquidation
 * @method \App\Model\Entity\Liquidation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LiquidationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accountants', 'Accountantsstatus'],
        ];
        $liquidation = $this->paginate($this->Liquidation);

        $this->set(compact('liquidation'));
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
        $liquidation = $this->Liquidation->get($id, [
            'contain' => ['Accountants', 'Accountantsstatus'],
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
        $liquidation = $this->Liquidation->newEmptyEntity();
        if ($this->request->is('post')) {
            $liquidation = $this->Liquidation->patchEntity($liquidation, $this->request->getData());
            if ($this->Liquidation->save($liquidation)) {
                 (__('The liquidation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The liquidation could not be saved. Please, try again.'));
        }
        $accountants = $this->Liquidation->Accountants->find('list', ['limit' => 200])->all();
        $accountantsstatuses = $this->Liquidation->Accountantsstatus->find('list', ['limit' => 200])->all();
        $this->set(compact('liquidation', 'accountants', 'accountantsstatuses'));
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
        $liquidation = $this->Liquidation->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $liquidation = $this->Liquidation->patchEntity($liquidation, $this->request->getData());
            if ($this->Liquidation->save($liquidation)) {
                 (__('The liquidation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The liquidation could not be saved. Please, try again.'));
        }
        $accountants = $this->Liquidation->Accountants->find('list', ['limit' => 200])->all();
        $accountantsstatuses = $this->Liquidation->Accountantsstatus->find('list', ['limit' => 200])->all();
        $this->set(compact('liquidation', 'accountants', 'accountantsstatuses'));
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
        $liquidation = $this->Liquidation->get($id);
        if ($this->Liquidation->delete($liquidation)) {
             (__('The liquidation has been deleted.'));
        } else {
            $this->Flash->error(__('The liquidation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
