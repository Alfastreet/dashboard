<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Business Controller
 *
 * @property \App\Model\Table\BusinessTable $Business
 * @method \App\Model\Entity\Busines[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Owner'],
        ];
        $business = $this->paginate($this->Business);

        $this->set(compact('business'));
    }

    /**
     * View method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $busines = $this->Business->get($id, [
            'contain' => ['Owner'],
        ]);

        $this->set(compact('busines'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $busines = $this->Business->newEmptyEntity();
        if ($this->request->is('post')) {
            $busines = $this->Business->patchEntity($busines, $this->request->getData());
            if ($this->Business->save($busines)) {
                

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The busines could not be saved. Please, try again.'));
        }
        $owner = $this->Business->Owner->find('list', ['limit' => 200])->all();
        $this->set(compact('busines', 'owner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $busines = $this->Business->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $busines = $this->Business->patchEntity($busines, $this->request->getData());
            if ($this->Business->save($busines)) {
                

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The busines could not be saved. Please, try again.'));
        }
        $owner = $this->Business->Owner->find('list', ['limit' => 200])->all();
        $this->set(compact('busines', 'owner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $busines = $this->Business->get($id);
        if ($this->Business->delete($busines)) {
            
        } else {
            $this->Flash->error(__('The busines could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
