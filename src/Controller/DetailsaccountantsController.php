<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;

/**
 * Detailsaccountants Controller
 *
 * @property \App\Model\Table\DetailsaccountantsTable $Detailsaccountants
 * @method \App\Model\Entity\Detailsaccountant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DetailsaccountantsController extends AppController
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
            'contain' => ['Accountants'],
        ];
        $detailsaccountants = $this->paginate($this->Detailsaccountants);

        $this->set(compact('detailsaccountants'));
    }

    /**
     * View method
     *
     * @param string|null $id Detailsaccountant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detailsaccountant = $this->Detailsaccountants->get($id, [
            'contain' => ['Accountants'],
        ]);

        $this->set(compact('detailsaccountant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null, $casinoid = null, $machineid = null, $token = null)
    {

        $id = $_GET['id'];
        $casinoid = $_GET['casinoid'];
        $machineid = $_GET['machineid'];
        $token = $_GET['token'];

        $tokenValidate = $this->db->execute('SELECT token FROM client WHERE id = '.$id)->fetchAll('obj');

        if($token !== $tokenValidate[0]->token){
            return $this->redirect(['controller' => 'client', 'action' => 'index' ]); //Cambiar por un mensaje de sin autorizacion para ver esta pagina
        }

        if($id === null && isset($casinoid) && empty($machineid) && empty($token)){
            return $this->redirect(['controller' => 'client', 'action' => 'index' ]); //Cambiar por un mensaje de sin autorizacion para ver esta pagina
        }


        // print_r();
        // exit;


        $detailsaccountant = $this->Detailsaccountants->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $detailsaccountant = $this->Detailsaccountants->patchEntity($detailsaccountant, $this->request->getData());
        //     if ($this->Detailsaccountants->save($detailsaccountant)) {
        //         $this->Flash->success(__('The detailsaccountant has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The detailsaccountant could not be saved. Please, try again.'));
        // }
        $months = $this->db->execute('SELECT * FROM months')->fetchAll('obj');
        $accountants = $this->Detailsaccountants->Accountants->find('list', ['limit' => 200])->all();
        $this->set(compact('detailsaccountant', 'accountants', 'months'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detailsaccountant id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null, $token = null)
    {
        $detailsaccountant = $this->Detailsaccountants->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detailsaccountant = $this->Detailsaccountants->patchEntity($detailsaccountant, $this->request->getData());
            if ($this->Detailsaccountants->save($detailsaccountant)) {
                $this->Flash->success(__('The detailsaccountant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detailsaccountant could not be saved. Please, try again.'));
        }
        $accountants = $this->Detailsaccountants->Accountants->find('list', ['limit' => 200])->all();
        $this->set(compact('detailsaccountant', 'accountants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detailsaccountant id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detailsaccountant = $this->Detailsaccountants->get($id);
        if ($this->Detailsaccountants->delete($detailsaccountant)) {
            $this->Flash->success(__('The detailsaccountant has been deleted.'));
        } else {
            $this->Flash->error(__('The detailsaccountant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    

}

