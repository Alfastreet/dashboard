<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Detailsquotes Controller
 *
 * @property \App\Model\Table\DetailsquotesTable $Detailsquotes
 * @method \App\Model\Entity\Detailsquote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DetailsquotesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Quotes', 'TypeProduct', 'Parts'],
        ];
        $detailsquotes = $this->paginate($this->Detailsquotes);

        $this->set(compact('detailsquotes'));
    }

    /**
     * View method
     *
     * @param string|null $id Detailsquote id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsquote = $this->Detailsquotes->get($id, [
            'contain' => ['Quotes', 'TypeProduct', 'Parts'],
        ]);

        $this->set(compact('detailsquote'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $detailsquote = $this->Detailsquotes->newEmptyEntity();
        if ($this->request->is('post')) {
            $detailsquote = $this->Detailsquotes->patchEntity($detailsquote, $this->request->getData());
            if ($this->Detailsquotes->save($detailsquote)) {
                $this->Flash->success(__('The detailsquote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detailsquote could not be saved. Please, try again.'));
        }
        $quotes = $this->Detailsquotes->Quotes->find('list', ['limit' => 200])->all();
        $typeProducts = $this->Detailsquotes->TypeProduct->find('list', ['limit' => 200])->all();
        $products = $this->Detailsquotes->Parts->find('list', ['limit' => 200])->all();
        $this->set(compact('detailsquote', 'quotes', 'typeProducts', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detailsquote id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detailsquote = $this->Detailsquotes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsquote = $this->Detailsquotes->patchEntity($detailsquote, $this->request->getData());
            if ($this->Detailsquotes->save($detailsquote)) {
                $this->Flash->success(__('The detailsquote has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detailsquote could not be saved. Please, try again.'));
        }
        $quotes = $this->Detailsquotes->Quotes->find('list', ['limit' => 200])->all();
        $typeProducts = $this->Detailsquotes->TypeProduct->find('list', ['limit' => 200])->all();
        $products = $this->Detailsquotes->Parts->find('list', ['limit' => 200])->all();
        $this->set(compact('detailsquote', 'quotes', 'typeProducts', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detailsquote id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsquote = $this->Detailsquotes->get($id);
        if ($this->Detailsquotes->delete($detailsquote)) {
            $this->Flash->success(__('The detailsquote has been deleted.'));
        } else {
            $this->Flash->error(__('The detailsquote could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
