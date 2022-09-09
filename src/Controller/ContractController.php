<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Contract Controller
 *
 * @method \App\Model\Entity\Contract[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContractController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $contract = $this->paginate($this->Contract);

        $this->set(compact('contract'));
    }

    /**
     * View method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contract = $this->Contract->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('contract'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contract = $this->Contract->newEmptyEntity();
        if ($this->request->is('post')) {
            $contract = $this->Contract->patchEntity($contract, $this->request->getData());
            if ($this->Contract->save($contract)) {
                 (__('The contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $this->set(compact('contract'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contract = $this->Contract->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contract = $this->Contract->patchEntity($contract, $this->request->getData());
            if ($this->Contract->save($contract)) {
                 (__('The contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The contract could not be saved. Please, try again.'));
        }
        $this->set(compact('contract'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Contract id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contract = $this->Contract->get($id);
        if ($this->Contract->delete($contract)) {
             (__('The contract has been deleted.'));
        } else {
            $this->Flash->error(__('The contract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
