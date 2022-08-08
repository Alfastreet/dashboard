<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Accountants Controller
 *
 * @property \App\Model\Table\AccountantsTable $Accountants
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountantsController extends AppController
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
            'contain' => ['Machines', 'Casinos', 'Accountantsstatus'],
        ];
        $accountants = $this->paginate($this->Accountants);

        $this->set(compact('accountants'));
    }

    /**
     * View method
     *
     * @param string|null $id Accountant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountant = $this->Accountants->get($id, [
            'contain' => ['Machines', 'Casinos', 'Accountantsstatus'],
        ]);

        $this->set(compact('accountant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null, $casinoid = null, $token = null)
    {

        
        $id = $_GET['id'];
        $casinoid = $_GET['casinoid'];
        $token = $_GET['token'];
        
        $client = $this->db->execute('SELECT token FROM client WHERE id = '.$id)->fetchAll('assoc');
        $tokenConfirm = $client[0]['token'];

        if($token !== $tokenConfirm){
            return $this->redirect(['controller' => 'client', 'action' => 'index' ]);
        }
        if(isset($id) && isset($casinoid) &&  empty($token)) {            
            return $this->redirect(['controller' => 'client', 'action' => 'index' ]);
        }

        $accountant = $this->Accountants->newEmptyEntity();
        $casinos = $this->db->execute('SELECT c.id, c.name FROM clientscasinos clcs INNER JOIN casinos c ON clcs.casino_id = c.id WHERE clcs.client_id = '.$id.' AND c.id = '.$casinoid)->fetchAll('assoc');
        $nameCasino = $casinos[0]['name'];
        $machines = $this->db->execute('SELECT m.*, mo.name AS modelName, ma.name AS nameMark FROM machines m INNER JOIN model mo ON mo.id = m.model_id INNER JOIN maker ma ON m.maker_id = ma.id WHERE m.casino_id = '.$casinoid)->fetchAll('obj');
        // print_r($machines);
        // exit;

        $this->set(compact('accountant' , 'casinos', 'nameCasino', 'machines'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Accountant id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountant = $this->Accountants->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountant = $this->Accountants->patchEntity($accountant, $this->request->getData());
            if ($this->Accountants->save($accountant)) {
                $this->Flash->success(__('The accountant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountant could not be saved. Please, try again.'));
        }
        $machines = $this->Accountants->Machines->find('list', ['limit' => 200])->all();
        $casinos = $this->Accountants->Casinos->find('list', ['limit' => 200])->all();
        $accountantsstatuses = $this->Accountants->Accountantsstatus->find('list', ['limit' => 200])->all();
        $this->set(compact('accountant', 'machines', 'casinos', 'accountantsstatuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Accountant id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountant = $this->Accountants->get($id);
        if ($this->Accountants->delete($accountant)) {
            $this->Flash->success(__('The accountant has been deleted.'));
        } else {
            $this->Flash->error(__('The accountant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
