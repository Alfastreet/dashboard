<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ownercompany Controller
 *
 * @property \App\Model\Table\OwnercompanyTable $Ownercompany
 * @method \App\Model\Entity\Ownercompany[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OwnercompanyController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Owner', 'Company'],
        ];
        $ownercompany = $this->paginate($this->Ownercompany);

        $this->set(compact('ownercompany'));
    }

    /**
     * View method
     *
     * @param string|null $id Ownercompany id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ownercompany = $this->Ownercompany->get($id, [
            'contain' => ['Owner', 'Company'],
        ]);

        $this->set(compact('ownercompany'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ownercompany = $this->Ownercompany->newEmptyEntity();
        if ($this->request->is('post')) {
            $ownercompany = $this->Ownercompany->patchEntity($ownercompany, $this->request->getData());
            if ($this->Ownercompany->save($ownercompany)) {
                 (__('The ownercompany has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ownercompany could not be saved. Please, try again.'));
        }
        $owners = $this->Ownercompany->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Ownercompany->Company->find('list', ['limit' => 200])->all();
        $this->set(compact('ownercompany', 'owners', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ownercompany id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ownercompany = $this->Ownercompany->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ownercompany = $this->Ownercompany->patchEntity($ownercompany, $this->request->getData());
            if ($this->Ownercompany->save($ownercompany)) {
                 (__('The ownercompany has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ownercompany could not be saved. Please, try again.'));
        }
        $owners = $this->Ownercompany->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Ownercompany->Company->find('list', ['limit' => 200])->all();
        $this->set(compact('ownercompany', 'owners', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ownercompany id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ownercompany = $this->Ownercompany->get($id);
        if ($this->Ownercompany->delete($ownercompany)) {
             (__('The ownercompany has been deleted.'));
        } else {
            $this->Flash->error(__('The ownercompany could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
