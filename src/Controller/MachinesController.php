<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Machines Controller
 *
 * @property \App\Model\Table\MachinesTable $Machines
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MachinesController extends AppController
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
            'contain' => ['Model', 'Maker', 'Casinos', 'Owner', 'Company'],
        ];
        $machines = $this->paginate($this->Machines);

        $this->set(compact('machines'));
    }

    /**
     * View method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $machine = $this->Machines->get($id, [
            'contain' => ['Model', 'Maker', 'Casinos', 'Owner', 'Company', 'Machinepart'],
        ]);

        $this->set(compact('machine'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $machine = $this->Machines->newEmptyEntity();
        if ($this->request->is('post')) {
            $machine = $this->Machines->patchEntity($machine, $this->request->getData());
            if ($this->Machines->save($machine)) {
                $this->Flash->success(__('The machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machine could not be saved. Please, try again.'));
        }
        $models = $this->Machines->Model->find('list', ['limit' => 200])->all();
        $makers = $this->Machines->Maker->find('list', ['limit' => 200])->all();
        $casinos = $this->Machines->Casinos->find('list', ['limit' => 200])->all();
        $owners = $this->Machines->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Machines->Company->find('list', ['limit' => 200])->all();
        $this->set(compact('machine', 'models', 'makers', 'casinos', 'owners', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $machine = $this->Machines->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machine = $this->Machines->patchEntity($machine, $this->request->getData());
            if ($this->Machines->save($machine)) {
                $this->Flash->success(__('The machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machine could not be saved. Please, try again.'));
        }
        $models = $this->Machines->Model->find('list', ['limit' => 200])->all();
        $makers = $this->Machines->Maker->find('list', ['limit' => 200])->all();
        $casinos = $this->Machines->Casinos->find('list', ['limit' => 200])->all();
        $owners = $this->Machines->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Machines->Company->find('list', ['limit' => 200])->all();
        $this->set(compact('machine', 'models', 'makers', 'casinos', 'owners', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machine = $this->Machines->get($id);
        if ($this->Machines->delete($machine)) {
            $this->Flash->success(__('The machine has been deleted.'));
        } else {
            $this->Flash->error(__('The machine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getMachine() {
        if($this->request->is('ajax')) {
            
            $casino_id = $this->request->getQuery('casino_id');

            $machine = $this->db->execute('SELECT m.id, m.serial, m.name, c.id FROM machines m INNER JOIN casinos c ON m.casino_id = c.id WHERE c.id = '.$casino_id)->fetchAll('assoc');

            echo json_encode($machine);
            die;

        }
    }
}
