<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Machinepart Controller
 *
 * @property \App\Model\Table\MachinepartTable $Machinepart
 * @method \App\Model\Entity\Machinepart[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MachinepartController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Machines', 'Parts'],
        ];
        $machinepart = $this->paginate($this->Machinepart);

        $this->set(compact('machinepart'));
    }

    /**
     * View method
     *
     * @param string|null $id Machinepart id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $machinepart = $this->Machinepart->get($id, [
            'contain' => ['Machines', 'Parts'],
        ]);

        $this->set(compact('machinepart'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $machinepart = $this->Machinepart->newEmptyEntity();
        if ($this->request->is('post')) {
            $machinepart = $this->Machinepart->patchEntity($machinepart, $this->request->getData());
            if ($this->Machinepart->save($machinepart)) {
                 (__('The machinepart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machinepart could not be saved. Please, try again.'));
        }
        $machines = $this->Machinepart->Machines->find('list', ['limit' => 200])->all();
        $parts = $this->Machinepart->Parts->find('list', ['limit' => 200])->all();
        $this->set(compact('machinepart', 'machines', 'parts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Machinepart id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $machinepart = $this->Machinepart->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machinepart = $this->Machinepart->patchEntity($machinepart, $this->request->getData());
            if ($this->Machinepart->save($machinepart)) {
                 (__('The machinepart has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machinepart could not be saved. Please, try again.'));
        }
        $machines = $this->Machinepart->Machines->find('list', ['limit' => 200])->all();
        $parts = $this->Machinepart->Parts->find('list', ['limit' => 200])->all();
        $this->set(compact('machinepart', 'machines', 'parts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Machinepart id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machinepart = $this->Machinepart->get($id);
        if ($this->Machinepart->delete($machinepart)) {
             (__('The machinepart has been deleted.'));
        } else {
            $this->Flash->error(__('The machinepart could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
