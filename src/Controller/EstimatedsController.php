<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Estimateds Controller
 *
 * @property \App\Model\Table\EstimatedsTable $Estimateds
 * @method \App\Model\Entity\Estimated[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstimatedsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Agreements'],
        ];
        $estimateds = $this->paginate($this->Estimateds);

        $this->set(compact('estimateds'));
    }

    /**
     * View method
     *
     * @param string|null $id Estimated id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estimated = $this->Estimateds->get($id, [
            'contain' => ['Agreements'],
        ]);

        $this->set(compact('estimated'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estimated = $this->Estimateds->newEmptyEntity();
        if ($this->request->is('post')) {
            $estimated = $this->Estimateds->patchEntity($estimated, $this->request->getData());
            if ($this->Estimateds->save($estimated)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;            
        }
        $agreements = $this->Estimateds->Agreements->find('list', ['limit' => 200])->all();
        $this->set(compact('estimated', 'agreements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estimated id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estimated = $this->Estimateds->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estimated = $this->Estimateds->patchEntity($estimated, $this->request->getData());
            if ($this->Estimateds->save($estimated)) {
                $this->Flash->success(__('The estimated has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estimated could not be saved. Please, try again.'));
        }
        $agreements = $this->Estimateds->Agreements->find('list', ['limit' => 200])->all();
        $this->set(compact('estimated', 'agreements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estimated id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estimated = $this->Estimateds->get($id);
        if ($this->Estimateds->delete($estimated)) {
            $this->Flash->success(__('The estimated has been deleted.'));
        } else {
            $this->Flash->error(__('The estimated could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
