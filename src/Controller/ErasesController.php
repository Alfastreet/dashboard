<?php

declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;

/**
 * Erases Controller
 *
 * @property \App\Model\Table\ErasesTable $Erases
 * @method \App\Model\Entity\Erase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ErasesController extends AppController
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
            'contain' => ['Machines', 'Month'],
        ];
        $erases = $this->paginate($this->Erases);

        $this->set(compact('erases'));
    }

    /**
     * View method
     *
     * @param string|null $id Erase id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $erase = $this->Erases->get($id, [
            'contain' => ['Machine', 'Month'],
        ]);

        $this->set(compact('erase'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($machineId = null, $casinoId = null)
    {
        $this->Authorization->skipAuthorization();
        $casinoId = $this->request->getQuery('casinoId');
        $machineId = $this->request->getQuery('machineId');

        $coljuegosValue =  $this->fetchTable('Dataiportants')->find()->where(['id' => 2 ])->first()->value;
        $adminValue =  $this->fetchTable('Dataiportants')->find()->where(['id' => 3 ])->first()->value;
        $iva = $this->fetchTable('Dataiportants')->find()->where(['id' => 1])->first()->value;
        $alfaValue = $this->fetchTable('Dataiportants')->find()->where(['id' => 4])->first()->value;
        
        $erase = $this->Erases->newEmptyEntity();
        $erase = $this->Erases->patchEntity($erase, $this->request->getData());
        if ($this->request->is('post')) {
        
        $erase->profit = $erase->cashin - $erase->cashout;
            $erase->coljuegos = $erase->profit * $coljuegosValue;
            $erase->admin = $erase->coljuegos * $adminValue;
            $erase->total = $erase->profit - $erase->coljuegos - $erase->admin - $iva;
            $erase->alfastreet = $erase->total * $alfaValue;
            $erase->casino_id = $casinoId;
            $erase->month_id = date('m', strtotime(date('d-m-Y') . "- 1 month"));
            $erase->year = date('Y');

            $image = $this->request->getData('image');

            if ($image) {

                $time =  FrozenTime::now()->toUnixString();
                $nameImage = $time . "_" . $image->getClientFileName();
                $destiny = WWW_ROOT . "img/Erase/" . $nameImage;
                $image->moveTo($destiny);
                $erase->image = $nameImage;
            }
        }
        $machines = $this->Erases->Machines->find('list')->where(['casino_id' => $casinoId, 'contract_id' => 2])->all();
        $months = $this->Erases->Months->find('list', ['limit' => 200])->all();
        $erases = $this->fetchTable('Erases')->find('all')->where(['casino_id' => $casinoId])->all();

        $this->set(compact('erase', 'machines', 'months', 'erases'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Erase id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $erase = $this->Erases->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $erase = $this->Erases->patchEntity($erase, $this->request->getData());
            if ($this->Erases->save($erase)) {
                $this->Flash->success(__('The erase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The erase could not be saved. Please, try again.'));
        }
        $machines = $this->Erases->Machines->find('list', ['limit' => 200])->all();
        $months = $this->Erases->Months->find('list', ['limit' => 200])->all();
        $this->set(compact('erase', 'machines', 'months'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Erase id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $erase = $this->Erases->get($id);
        if ($this->Erases->delete($erase)) {
            $this->Flash->success(__('The erase has been deleted.'));
        } else {
            $this->Flash->error(__('The erase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function addAccount() 
    {
        $this->autoRender = false;

        $data = $_POST;

        $query = $this->db->execute("INSERT INTO accountants (`machine_id`, `casino_id`, `day_init`, `day_end`, `month_id`, `year`, `cashin`, `cashout`, `bet`, `win`, `profit`, `jackpot`, `gamesplayed`, `coljuegos`, `admin`, `total`, `alfastreet`, `image`) VALUES (".$data['machine_id'].", ".$data['casino_id'].", ".$data['day_init'].", ".$data['day_end'].", ".$data['month_id'].", ".$data['year'].", ".$data['cashin'].", ".$data['cashout'].", ".$data['bet'].", ".$data['win'].", ".$data['profit'].", ".$data['jackpot'].", ".$data['gamesplayed'].", ".$data['coljuegos'].", ".$data['admin'].", ".$data['total'].", ".$data['alfastreet'].", 'Nulo')");
        
        if($query){
            echo json_encode('ok');
            die;
        }
    }

}
