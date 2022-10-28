<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Business Controller
 *
 * @property \App\Model\Table\BusinessTable $Business
 * @method \App\Model\Entity\Busines[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BusinessController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();   
        $this->paginate = [
            'contain' => ['Owner'],
        ];
        $business = $this->paginate($this->Business, ['limit' => 10000]);

        $this->set(compact('business'));
    }

    /**
     * View method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $busines = $this->Business->get($id, [
            'contain' => ['Owner'],
        ]);

        $this->set(compact('busines'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $busines = $this->Business->newEmptyEntity();
        $this->Authorization->authorize($busines);
        if ($this->request->is('post')) {
            $busines = $this->Business->patchEntity($busines, $this->request->getData());
            $nit = $busines->nit;
            $query = $this->Business->find('all')->where(['nit' => $nit])->all();

            if(sizeof($query) === 0){
                
                if ($this->Business->save($busines)) {    
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Hubo un error al Guardar los datos'));
            }
            $this->Flash->error(__('La empresa ya existe'));

        }
        $owner = $this->Business->Owner->find('list', ['limit' => 200])->all();
        $this->set(compact('busines', 'owner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $busines = $this->Business->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($busines);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $busines = $this->Business->patchEntity($busines, $this->request->getData());
            if ($this->Business->save($busines)) {
                

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The busines could not be saved. Please, try again.'));
        }
        $owner = $this->Business->Owner->find('list', ['limit' => 200])->all();
        $this->set(compact('busines', 'owner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Busines id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $busines = $this->Business->get($id);
        if ($this->Business->delete($busines)) {
            
        } else {
            $this->Flash->error(__('The busines could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function searchBussines($nit = null) 
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $nit = $this->request->getQuery('nit');

        $query = $this->Business->find('all')->where(['nit' => $nit])->all();
        
        if(sizeof($query) > 0){
            echo json_encode('error');
            die;
        }
        echo json_encode('ok');
        die;
    }
}
