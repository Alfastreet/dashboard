<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Erases Controller
 *
 * @property \App\Model\Table\ErasesTable $Erases
 * @method \App\Model\Entity\Erase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ErasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Machines', 'Month'],
        ];
        $erases = $this->paginate($this->Erases);

        $this->set(compact('erases'));
    }

    /**
     * View method
     *
     * @param string|null $id Erase id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $erase = $this->Erases->get($id, [
            'contain' => ['Machine', 'Month'],
        ]);

        $this->set(compact('erase'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add( $token = null, $casinoId = null, $machineId = null )
    {
        $token = $_GET['token'];
        $casinoId = $_GET['casinoId'];
        $machineId = $_GET['machineId'];
        
        $erase = $this->Erases->newEmptyEntity();
        if ($this->request->is('post')) {
            $erase = $this->Erases->patchEntity($erase, $this->request->getData());
            if ($this->Erases->save($erase)) {
                $this->Flash->success(__('The erase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The erase could not be saved. Please, try again.'));
        }
        $machines = $this->Erases->Machines->find('list', ['limit' => 200])->all();
        $months = $this->Erases->Month->find('list', ['limit' => 200])->all();
        $casino = $this->Erases->Casinos->find('list', ['limit' => 200])->all();
        $this->set(compact('erase', 'machines', 'months', 'casino'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Erase id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $erase = $this->Erases->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $erase = $this->Erases->patchEntity($erase, $this->request->getData());
            if ($this->Erases->save($erase)) {
                $this->Flash->success(__('The erase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The erase could not be saved. Please, try again.'));
        }
        $machines = $this->Erases->Machines->find('list', ['limit' => 200])->all();
        $months = $this->Erases->Months->find('list', ['limit' => 200])->all();
        $this->set(compact('erase', 'machines', 'months'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Erase id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $erase = $this->Erases->get($id);
        if ($this->Erases->delete($erase)) {
            $this->Flash->success(__('The erase has been deleted.'));
        } else {
            $this->Flash->error(__('The erase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
