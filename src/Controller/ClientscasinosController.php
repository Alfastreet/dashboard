<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Clientscasinos Controller
 *
 * @property \App\Model\Table\ClientscasinosTable $Clientscasinos
 * @method \App\Model\Entity\Clientscasino[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientscasinosController extends AppController
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
        $this->paginate = [
            'contain' => ['Client', 'Casinos'],
        ];
        $clientscasinos = $this->paginate($this->Clientscasinos);

        $this->set(compact('clientscasinos'));
    }

    /**
     * View method
     *
     * @param string|null $id Clientscasino id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clientscasino = $this->Clientscasinos->get($id, [
            'contain' => ['Client', 'Casinos'],
        ]);

        $this->set(compact('clientscasino'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($casinoid = null, $token = null)
    {
        $casinoid = $this->request->getQuery('casinoid'); 
        $token = $this->request->getQuery('token'); 

        if($casinoid == null){
            return $this->redirect(['controller' => 'Casinos', 'action' => 'index']);
        }

        $clientscasino = $this->Clientscasinos->newEmptyEntity();
        if ($this->request->is('post')) {
            $clientscasino = $this->Clientscasinos->patchEntity($clientscasino, $this->request->getData());
            if ($this->Clientscasinos->save($clientscasino)) {
                 (__('The clientscasino has been saved.'));

                return $this->redirect(['controller' => 'Casinos', 'action' => 'view', $casinoid, '?' => ['token' => $token]]);
            }
            $this->Flash->error(__('The clientscasino could not be saved. Please, try again.'));
        }
        $clients = $this->Clientscasinos->Client->find('list', ['limit' => 200])->all();
        $casinos = $this->Clientscasinos->Casinos->find('list', ['limit' => 200])->all();
        $this->set(compact('clientscasino', 'clients', 'casinos', 'casinoid'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Clientscasino id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $casinoid = null, $token = null)
    {
        $casinoid = $this->request->getQuery('casinoid');
        $token = $this->request->getQuery('token');

        if($casinoid == null){
            return $this->redirect(['controller' => 'Casinos', 'action' => 'index']);
        }

        $clientscasino = $this->Clientscasinos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clientscasino = $this->Clientscasinos->patchEntity($clientscasino, $this->request->getData());
            if ($this->Clientscasinos->save($clientscasino)) {
                 (__('The clientscasino has been saved.'));

                return $this->redirect(['controller' => 'Casinos', 'action' => 'view', $casinoid, '?' => ['token' => $token]]);
            }
            $this->Flash->error(__('The clientscasino could not be saved. Please, try again.'));
        }
        $clients = $this->Clientscasinos->Client->find('list', ['limit' => 200])->all();
        $casinos = $this->Clientscasinos->Casinos->find('list', ['limit' => 200])->all();
        $this->set(compact('clientscasino', 'clients', 'casinos', 'casinoid'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Clientscasino id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clientscasino = $this->Clientscasinos->get($id);
        if ($this->Clientscasinos->delete($clientscasino)) {
             (__('The clientscasino has been deleted.'));
        } else {
            $this->Flash->error(__('The clientscasino could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getCasino() {
        if($this->request->is('ajax')) {

            $client_id = $this->request->getQuery('client_id');

            $casino = $this->db->execute('SELECT cs.id, cs.name FROM clientscasinos clcs  INNER JOIN casinos cs ON clcs.casino_id = cs.id WHERE clcs.client_id = '.$client_id)->fetchAll('assoc');

            echo json_encode($casino);
            die;

        }
    }
}
