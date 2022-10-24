<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Client Controller
 *
 * @property \App\Model\Table\ClientTable $Client
 * @method \App\Model\Entity\Client[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientController extends AppController
{

    private $db;

    public function initialize(): void
    {
        parent::initialize();
        $this->db = ConnectionManager::get("default");
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Clientposition', 'Business'],
        ];
        $client = $this->paginate($this->Client, ['limit' => 10000]);

        $this->set(compact('client'));
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Client->get($id, [
            'contain' => ['Clientposition', 'Business', 'Clientscasinos'],
        ]);
        $this->Authorization->authorize($client);

        $casinos = $this->fetchTable('casinos')->find('all')->all();
        $this->set(compact('client', 'casinos'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $client = $this->Client->newEmptyEntity();
        $this->Authorization->authorize($client);
        if ($this->request->is('post')) {
            
            $client = $this->Client->patchEntity($client, $this->request->getData());

            
            $client->token = uniqid();
            
            if ($this->Client->save($client)) {
                 (__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $clientposition = $this->Client->Clientposition->find('list', ['limit' => 200])->all();
        $business = $this->Client->Business->find('list', ['limit' => 200])->all();
        $this->set(compact('client', 'clientposition', 'business'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Client->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($client);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Client->patchEntity($client, $this->request->getData());
            $client->token = uniqid();
            if ($this->Client->save($client)) {
                 (__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $clientposition = $this->Client->Clientposition->find('list', ['limit' => 200])->all();
        $business = $this->Client->Business->find('list', ['limit' => 200])->all();
        $this->set(compact('client', 'clientposition', 'business'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        
        $client = $this->Client->get($id);
        $this->Authorization->authorize($client);
        if ($this->Client->delete($client)) {
             (__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getClients () {

        if($this->request->is('ajax')) {
            
            $business_id = $this->request->getQuery("business_id");

            $user = $this->db->execute("SELECT c.id, c.name, cp.position FROM client c INNER JOIN clientposition cp ON c.position_id = cp.id WHERE c.business_id = ".$business_id)->fetchAll('assoc');

            echo json_encode($user);
            die;
        }

    }

    public function searchclient($client = null)
    {
        $this->autoRender = false;
        $client = $this->request->getQuery('client');

        $query = $this->Client->find()->where(['name' => $client])->count();

        if($query === 1){
            echo json_encode('error');
            die;
        }
        echo json_encode('ok');
        die;
    }

    public function searchClientBusiness($id = null)
    {
        $this->autoRender = false;
        $id = $this->request->getQuery('id');

        $query = $this->Client->find()->select(['id', 'name'])->where(['business_id' => $id])->all();

        if(sizeof($query) !== 0){
            echo json_encode($query);
            die;
        }
        echo json_encode('error');
        die;

    }
    
}
