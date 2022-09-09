<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Accountantsstatus Controller
 *
 * @property \App\Model\Table\AccountantsstatusTable $Accountantsstatus
 * @method \App\Model\Entity\Accountantsstatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountantsstatusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $accountantsstatus = $this->paginate($this->Accountantsstatus);

        $this->set(compact('accountantsstatus'));
    }

    /**
     * View method
     *
     * @param string|null $id Accountantsstatus id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountantsstatus = $this->Accountantsstatus->get($id, [
            'contain' => ['Accountants'],
        ]);

        $this->set(compact('accountantsstatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accountantsstatus = $this->Accountantsstatus->newEmptyEntity();
        if ($this->request->is('post')) {
            $accountantsstatus = $this->Accountantsstatus->patchEntity($accountantsstatus, $this->request->getData());
            if ($this->Accountantsstatus->save($accountantsstatus)) {
                 (__('The accountantsstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountantsstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('accountantsstatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Accountantsstatus id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountantsstatus = $this->Accountantsstatus->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountantsstatus = $this->Accountantsstatus->patchEntity($accountantsstatus, $this->request->getData());
            if ($this->Accountantsstatus->save($accountantsstatus)) {
                 (__('The accountantsstatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountantsstatus could not be saved. Please, try again.'));
        }
        $this->set(compact('accountantsstatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Accountantsstatus id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountantsstatus = $this->Accountantsstatus->get($id);
        if ($this->Accountantsstatus->delete($accountantsstatus)) {
             (__('The accountantsstatus has been deleted.'));
        } else {
            $this->Flash->error(__('The accountantsstatus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
