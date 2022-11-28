<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Movedcellars Controller
 *
 * @property \App\Model\Table\MovedcellarsTable $Movedcellars
 * @method \App\Model\Entity\Movedcellar[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MovedcellarsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cellars', 'Parts'],
        ];
        $movedcellars = $this->paginate($this->Movedcellars);

        $this->set(compact('movedcellars'));
    }

    /**
     * View method
     *
     * @param string|null $id Movedcellar id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $movedcellar = $this->Movedcellars->get($id, [
            'contain' => ['Cellars', 'Parts'],
        ]);

        $this->set(compact('movedcellar'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $movedcellar = $this->Movedcellars->newEmptyEntity();
        if ($this->request->is('post')) {
            $movedcellar = $this->Movedcellars->patchEntity($movedcellar, $this->request->getData());
            if ($this->Movedcellars->save($movedcellar)) {
                $this->Flash->success(__('The movedcellar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movedcellar could not be saved. Please, try again.'));
        }
        $cellars = $this->Movedcellars->Cellars->find('list', ['limit' => 200])->all();
        $parts = $this->Movedcellars->Parts->find('list', ['limit' => 200])->all();
        $this->set(compact('movedcellar', 'cellars', 'parts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Movedcellar id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $movedcellar = $this->Movedcellars->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $movedcellar = $this->Movedcellars->patchEntity($movedcellar, $this->request->getData());
            if ($this->Movedcellars->save($movedcellar)) {
                $this->Flash->success(__('The movedcellar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The movedcellar could not be saved. Please, try again.'));
        }
        $cellars = $this->Movedcellars->Cellars->find('list', ['limit' => 200])->all();
        $parts = $this->Movedcellars->Parts->find('list', ['limit' => 200])->all();
        $this->set(compact('movedcellar', 'cellars', 'parts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Movedcellar id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $movedcellar = $this->Movedcellars->get($id);
        if ($this->Movedcellars->delete($movedcellar)) {
            $this->Flash->success(__('The movedcellar has been deleted.'));
        } else {
            $this->Flash->error(__('The movedcellar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
