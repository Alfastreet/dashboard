<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Money Controller
 *
 * @property \App\Model\Table\MoneyTable $Money
 * @method \App\Model\Entity\Money[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MoneyController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $money = $this->paginate($this->Money);

        $this->set(compact('money'));
    }

    /**
     * View method
     *
     * @param string|null $id Money id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $money = $this->Money->get($id, [
            'contain' => ['Parts', 'Services'],
        ]);

        $this->set(compact('money'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $money = $this->Money->newEmptyEntity();
        if ($this->request->is('post')) {
            $money = $this->Money->patchEntity($money, $this->request->getData());
            if ($this->Money->save($money)) {
                $this->Flash->success(__('The money has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The money could not be saved. Please, try again.'));
        }
        $this->set(compact('money'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Money id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $money = $this->Money->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $money = $this->Money->patchEntity($money, $this->request->getData());
            if ($this->Money->save($money)) {
                $this->Flash->success(__('The money has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The money could not be saved. Please, try again.'));
        }
        $this->set(compact('money'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Money id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $money = $this->Money->get($id);
        if ($this->Money->delete($money)) {
            $this->Flash->success(__('The money has been deleted.'));
        } else {
            $this->Flash->error(__('The money could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
