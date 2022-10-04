<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Model Controller
 *
 * @property \App\Model\Table\ModelTable $Model
 * @method \App\Model\Entity\Model[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModelController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $model = $this->paginate($this->Model, ['limit' => 10000]);

        $this->set(compact('model'));
    }

    /**
     * View method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $model = $this->Model->get($id, [
            'contain' => ['Machines'],
        ]);

        $this->set(compact('model'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $model = $this->Model->newEmptyEntity();
        if ($this->request->is('post')) {
            $model = $this->Model->patchEntity($model, $this->request->getData());
            if ($this->Model->save($model)) {
                 (__('The model has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model could not be saved. Please, try again.'));
        }
        $this->set(compact('model'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $model = $this->Model->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $model = $this->Model->patchEntity($model, $this->request->getData());
            if ($this->Model->save($model)) {
                 (__('The model has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The model could not be saved. Please, try again.'));
        }
        $this->set(compact('model'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Model id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $model = $this->Model->get($id);
        if ($this->Model->delete($model)) {
             (__('The model has been deleted.'));
        } else {
            $this->Flash->error(__('The model could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
