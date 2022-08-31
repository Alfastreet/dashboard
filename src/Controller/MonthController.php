<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Month Controller
 *
 * @property \App\Model\Table\MonthTable $Month
 * @method \App\Model\Entity\Month[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonthController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $month = $this->paginate($this->Month);

        $this->set(compact('month'));
    }

    /**
     * View method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $month = $this->Month->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('month'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $month = $this->Month->newEmptyEntity();
        if ($this->request->is('post')) {
            $month = $this->Month->patchEntity($month, $this->request->getData());
            if ($this->Month->save($month)) {
                $this->Flash->success(__('The month has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The month could not be saved. Please, try again.'));
        }
        $this->set(compact('month'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $month = $this->Month->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $month = $this->Month->patchEntity($month, $this->request->getData());
            if ($this->Month->save($month)) {
                $this->Flash->success(__('The month has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The month could not be saved. Please, try again.'));
        }
        $this->set(compact('month'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Month id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $month = $this->Month->get($id);
        if ($this->Month->delete($month)) {
            $this->Flash->success(__('The month has been deleted.'));
        } else {
            $this->Flash->error(__('The month could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
