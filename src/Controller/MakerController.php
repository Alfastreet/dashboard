<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Maker Controller
 *
 * @property \App\Model\Table\MakerTable $Maker
 * @method \App\Model\Entity\Maker[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MakerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $maker = $this->paginate($this->Maker);

        $this->set(compact('maker'));
    }

    /**
     * View method
     *
     * @param string|null $id Maker id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $maker = $this->Maker->get($id, [
            'contain' => ['Machines'],
        ]);

        $this->set(compact('maker'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $maker = $this->Maker->newEmptyEntity();
        if ($this->request->is('post')) {
            $maker = $this->Maker->patchEntity($maker, $this->request->getData());
            if ($this->Maker->save($maker)) {
                $this->Flash->success(__('The maker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The maker could not be saved. Please, try again.'));
        }
        $this->set(compact('maker'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Maker id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $maker = $this->Maker->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $maker = $this->Maker->patchEntity($maker, $this->request->getData());
            if ($this->Maker->save($maker)) {
                $this->Flash->success(__('The maker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The maker could not be saved. Please, try again.'));
        }
        $this->set(compact('maker'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Maker id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $maker = $this->Maker->get($id);
        if ($this->Maker->delete($maker)) {
            $this->Flash->success(__('The maker has been deleted.'));
        } else {
            $this->Flash->error(__('The maker could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
