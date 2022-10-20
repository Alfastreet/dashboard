<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Agreements Controller
 *
 * @property \App\Model\Table\AgreementsTable $Agreements
 * @method \App\Model\Entity\Agreement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgreementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Machines', 'Agreementstatuses'],
        ];
        $agreements = $this->paginate($this->Agreements);

        $this->set(compact('agreements'));
    }

    /**
     * View method
     *
     * @param string|null $id Agreement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agreement = $this->Agreements->get($id, [
            'contain' => ['Machines', 'Agreementstatuses'],
        ]);

        $this->set(compact('agreement'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agreement = $this->Agreements->newEmptyEntity();
        if ($this->request->is('post')) {
            $agreement = $this->Agreements->patchEntity($agreement, $this->request->getData());
            if ($this->Agreements->save($agreement)) {
                $this->Flash->success(__('The agreement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agreement could not be saved. Please, try again.'));
        }
        $machines = $this->Agreements->Machines->find('list', ['limit' => 200])->all();
        $clients = $this->Agreements->Client->find('list', ['limit' => 200])->all();
        $business = $this->Agreements->Business->find('list', ['limit' => 200])->all();
        $agreementstatuses = $this->Agreements->Agreementstatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('agreement', 'machines', 'agreementstatuses', 'clients', 'business'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Agreement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agreement = $this->Agreements->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agreement = $this->Agreements->patchEntity($agreement, $this->request->getData());
            if ($this->Agreements->save($agreement)) {
                $this->Flash->success(__('The agreement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agreement could not be saved. Please, try again.'));
        }
        $machines = $this->Agreements->Machines->find('list', ['limit' => 200])->all();
        $agreementstatuses = $this->Agreements->Agreementstatuses->find('list', ['limit' => 200])->all();
        $this->set(compact('agreement', 'machines', 'agreementstatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Agreement id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agreement = $this->Agreements->get($id);
        if ($this->Agreements->delete($agreement)) {
            $this->Flash->success(__('The agreement has been deleted.'));
        } else {
            $this->Flash->error(__('The agreement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
