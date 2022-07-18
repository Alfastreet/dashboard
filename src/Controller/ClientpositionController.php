<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Clientposition Controller
 *
 * @property \App\Model\Table\ClientpositionTable $Clientposition
 * @method \App\Model\Entity\Clientposition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientpositionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $clientposition = $this->paginate($this->Clientposition);

        $this->set(compact('clientposition'));
    }

    /**
     * View method
     *
     * @param string|null $id Clientposition id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientposition = $this->Clientposition->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('clientposition'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clientposition = $this->Clientposition->newEmptyEntity();
        
        if ($this->request->is('post')) {
            
            $clientposition = $this->Clientposition->patchEntity($clientposition, $this->request->getData());
            if ($this->Clientposition->save($clientposition)) {
                $this->Flash->success(__('The clientposition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clientposition could not be saved. Please, try again.'));
        }
        $this->set(compact('clientposition'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Clientposition id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clientposition = $this->Clientposition->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientposition = $this->Clientposition->patchEntity($clientposition, $this->request->getData());
            if ($this->Clientposition->save($clientposition)) {
                $this->Flash->success(__('The clientposition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clientposition could not be saved. Please, try again.'));
        }
        $this->set(compact('clientposition'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Clientposition id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientposition = $this->Clientposition->get($id);
        if ($this->Clientposition->delete($clientposition)) {
            $this->Flash->success(__('The clientposition has been deleted.'));
        } else {
            $this->Flash->error(__('The clientposition could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
