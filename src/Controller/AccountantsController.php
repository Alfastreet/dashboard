<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\FrozenTime;

/**
 * Accountants Controller
 *
 * @property \App\Model\Table\AccountantsTable $Accountants
 * @method \App\Model\Entity\Accountant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        
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
            'contain' => ['Machines', 'Casinos'],
        ]);

        $this->set(compact('accountant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
   
    public function add( $casinoid = null )
    {

        //$this->autoRender = false;

        $casinoid = $_GET['casinoid'];

        $accountant = $this->Accountants->newEmptyEntity();
                
        $accountant = $this->Accountants->patchEntity($accountant, $this->request->getData());


        $accountant->profit = $accountant->cashin - $accountant-> cashout;
        $accountant->coljuegos = $accountant->profit * 0.12;
        $accountant->admin = $accountant->coljuegos *0.01;
        $accountant->total = $accountant->profit - $accountant->coljuegos - $accountant->admin - 144415;
        $accountant->alfastreet = $accountant->total * 0.40;
        $accountant->casino_id = $casinoid;
        $accountant->month_id = date('m', strtotime(date('d-m-Y')."- 1 month"));
        $accountant->year = date('Y');
        $accountant->casino_id = $casinoid;
        
        $image = $this->request->getData('image');
        
        if($image) {
            
            $time =  FrozenTime::now()->toUnixString();
            $nameImage = $time. "_" . $image->getClientFileName();
            $destiny = WWW_ROOT."img/Accountants/".$nameImage;
            $image->moveTo($destiny);
            $accountant->image = $nameImage;
            
        }

        if ($this->Accountants->save($accountant)) {
            

            return $this->redirect(['controller' => 'casinos', 'action' => 'view', $casinoid]);
        }
        $this->Flash->error(__('The accountant could not be saved. Please, try again.'));

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
                

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountant could not be saved. Please, try again.'));
        }
        $machines = $this->Accountants->Machines->find('list', ['limit' => 200])->all();
        $casinos = $this->Accountants->Casinos->find('list', ['limit' => 200])->all();
        $months = $this->Accountants->Months->find('list', ['limit' => 200])->all();
        $this->set(compact('accountant', 'machines', 'casinos'));
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
              
        } else {
            $this->Flash->error(__('The accountant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function general() {
        $this->paginate = [
            'contain' => ['Machines', 'Casinos'],
        ];
        $accountants = $this->paginate($this->Accountants);

        $this->set(compact('accountants'));
    }

    public function csv() {
        $this->response = $this->response->withDownload('participaciones.csv');
        $data = $this->Accountants->find();
        $_serialize = 'data';
        $_header = ['ID', 'Maquina', 'Casino', 'Dia inicio', 'Dia fin', 'Mes', 'Año', 'CashIn', 'CashOut', 'Bet', 'Win', 'Profit', 'Jackpot', 'Total Juegos', 'Coljuegos', 'Admin', 'Total', 'AlfaStreet'];
        $_extract = ['id', 'machine_id', 'casino_id', 'day_init', 'day_end', 'month_id', 'year', 'cashin', 'cashout', 'bet', 'win', 'profit', 'jackpot', 'gamesplayed', 'coljuegos', 'admin', 'total', 'alfastreet'];

        $this->viewBuilder()->setClassName('CsvView.Csv');
        $this->set(compact('data', '_serialize', '_header', '_extract'));
    }
}
