<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Typeproduct Controller
 *
 * @property \App\Model\Table\TypeproductTable $Typeproduct
 * @method \App\Model\Entity\Typeproduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypeproductController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $typeproduct = $this->paginate($this->Typeproduct);

        $this->set(compact('typeproduct'));
    }

    /**
     * View method
     *
     * @param string|null $id Typeproduct id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typeproduct = $this->Typeproduct->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('typeproduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typeproduct = $this->Typeproduct->newEmptyEntity();
        if ($this->request->is('post')) {
            $typeproduct = $this->Typeproduct->patchEntity($typeproduct, $this->request->getData());
            if ($this->Typeproduct->save($typeproduct)) {
                $this->Flash->success(__('The typeproduct has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The typeproduct could not be saved. Please, try again.'));
        }
        $this->set(compact('typeproduct'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Typeproduct id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typeproduct = $this->Typeproduct->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typeproduct = $this->Typeproduct->patchEntity($typeproduct, $this->request->getData());
            if ($this->Typeproduct->save($typeproduct)) {
                $this->Flash->success(__('The typeproduct has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The typeproduct could not be saved. Please, try again.'));
        }
        $this->set(compact('typeproduct'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Typeproduct id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typeproduct = $this->Typeproduct->get($id);
        if ($this->Typeproduct->delete($typeproduct)) {
            $this->Flash->success(__('The typeproduct has been deleted.'));
        } else {
            $this->Flash->error(__('The typeproduct could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
