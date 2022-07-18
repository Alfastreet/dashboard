<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Casinos Controller
 *
 * @property \App\Model\Table\CasinosTable $Casinos
 * @method \App\Model\Entity\Casino[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CasinosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['City', 'State', 'Owner', 'Company'],
        ];
        $casinos = $this->paginate($this->Casinos);

        $this->set(compact('casinos'));
    }

    /**
     * View method
     *
     * @param string|null $id Casino id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $casino = $this->Casinos->get($id, [
            'contain' => ['City', 'State', 'Owner', 'Company', 'Clientscasinos', 'Machines'],
        ]);

        $this->set(compact('casino'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $casino = $this->Casinos->newEmptyEntity();
        if ($this->request->is('post')) {
            $casino = $this->Casinos->patchEntity($casino, $this->request->getData());
            if ($this->Casinos->save($casino)) {
                $this->Flash->success(__('The casino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The casino could not be saved. Please, try again.'));
        }
        $cities = $this->Casinos->City->find('list', ['limit' => 200])->all();
        $states = $this->Casinos->State->find('list', ['limit' => 200])->all();
        $owners = $this->Casinos->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Casinos->Company->find('list', ['limit' => 200])->all();
        $this->set(compact('casino', 'cities', 'states', 'owners', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Casino id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $casino = $this->Casinos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $casino = $this->Casinos->patchEntity($casino, $this->request->getData());
            if ($this->Casinos->save($casino)) {
                $this->Flash->success(__('The casino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The casino could not be saved. Please, try again.'));
        }
        $cities = $this->Casinos->City->find('list', ['limit' => 200])->all();
        $states = $this->Casinos->State->find('list', ['limit' => 200])->all();
        $owners = $this->Casinos->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Casinos->Company->find('list', ['limit' => 200])->all();
        $this->set(compact('casino', 'cities', 'states', 'owners', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Casino id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $casino = $this->Casinos->get($id);
        if ($this->Casinos->delete($casino)) {
            $this->Flash->success(__('The casino has been deleted.'));
        } else {
            $this->Flash->error(__('The casino could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
