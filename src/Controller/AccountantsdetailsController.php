<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Accountantsdetails Controller
 *
 * @property \App\Model\Table\AccountantsdetailsTable $Accountantsdetails
 * @method \App\Model\Entity\Accountantsdetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountantsdetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accountants', 'Details'],
        ];
        $accountantsdetails = $this->paginate($this->Accountantsdetails);

        $this->set(compact('accountantsdetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Accountantsdetail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountantsdetail = $this->Accountantsdetails->get($id, [
            'contain' => ['Accountants', 'Details'],
        ]);

        $this->set(compact('accountantsdetail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accountantsdetail = $this->Accountantsdetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $accountantsdetail = $this->Accountantsdetails->patchEntity($accountantsdetail, $this->request->getData());
            if ($this->Accountantsdetails->save($accountantsdetail)) {
                 (__('The accountantsdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountantsdetail could not be saved. Please, try again.'));
        }
        $accountants = $this->Accountantsdetails->Accountants->find('list', ['limit' => 200])->all();
        $details = $this->Accountantsdetails->Details->find('list', ['limit' => 200])->all();
        $this->set(compact('accountantsdetail', 'accountants', 'details'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Accountantsdetail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountantsdetail = $this->Accountantsdetails->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountantsdetail = $this->Accountantsdetails->patchEntity($accountantsdetail, $this->request->getData());
            if ($this->Accountantsdetails->save($accountantsdetail)) {
                 (__('The accountantsdetail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountantsdetail could not be saved. Please, try again.'));
        }
        $accountants = $this->Accountantsdetails->Accountants->find('list', ['limit' => 200])->all();
        $details = $this->Accountantsdetails->Details->find('list', ['limit' => 200])->all();
        $this->set(compact('accountantsdetail', 'accountants', 'details'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Accountantsdetail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountantsdetail = $this->Accountantsdetails->get($id);
        if ($this->Accountantsdetails->delete($accountantsdetail)) {
             (__('The accountantsdetail has been deleted.'));
        } else {
            $this->Flash->error(__('The accountantsdetail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
