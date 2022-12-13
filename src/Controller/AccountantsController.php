<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\Chronos\Chronos;
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
            'contain' => ['Machines', 'Casinos'],
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
            'contain' => ['Machines', 'Casinos'],
        ]);

        $this->set(compact('accountant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */

    public function add($casinoid = null, $token = null)
    {
        $this->Authorization->skipAuthorization();
        $accountant = $this->Accountants->newEmptyEntity();

        $coljuegosValue =  $this->fetchTable('Dataiportants')->find()->where(['id' => 2])->first()->value;
        $adminValue =  $this->fetchTable('Dataiportants')->find()->where(['id' => 3])->first()->value;
        $iva = $this->fetchTable('Dataiportants')->find()->where(['id' => 1])->first()->value;

        // $casinoid = $this->request->getQuery('casinoid');
        $casinos = $this->fetchTable('Casinos')->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => 200
        ])->select(['name'])->select(['Machines.contract_id'])->join([
            'Machines' => [
                'table' => 'machines',
                'type' => 'INNER',
                'conditions' => [
                    'Machines.casino_id = Casinos.id',
                    'Machines.contract_id' => 2
                ],
            ],
        ])->all();

        if ($this->request->is('post')) {
            $accountant = $this->Accountants->patchEntity($accountant, $this->request->getData());
            $percent = floatval($this->request->getData('percent'));
            $accountant->profit = $accountant->cashin - $accountant->cashout;
            $accountant->coljuegos = $accountant->profit * $coljuegosValue;
            $accountant->admin = $accountant->coljuegos * $adminValue;
            $accountant->total = $accountant->profit - $accountant->coljuegos - $accountant->admin - $iva;
            $accountant->alfastreet = $accountant->total * $percent;
            $accountant->month_id = date('m', strtotime(date('d-m-Y') . "- 1 month"));
            $accountant->year = date('Y');
            $image = $_FILES['image'];

            if ($image) {

                $time =  FrozenTime::now()->toUnixString();
                $nameImage = $time . "_" . $image['name'];
                $destiny = WWW_ROOT . "img/Accountants/" . $nameImage;
                $move = move_uploaded_file($image['tmp_name'], $destiny);
                if ($move) {
                    $accountant->image = $nameImage;
                }
            }

            if ($this->Accountants->save($accountant)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }

        $this->set(compact('accountant', 'casinos'));
    }

    public function general()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Machines', 'Casinos'],
        ];
        $accountants = $this->paginate($this->Accountants, [
            'limit' => 10000,
            'maxLimit' => 10000,
        ]);

        $clients = $this->fetchTable('Business')
            ->find()->select([
                'id', 'name'
            ])
            ->select([
                'Casinos.id',
                'Casinos.name',
            ])
            ->select([
                'Machines.id',
                'Machines.contract_id'
            ])->join([
                'Casinos' => [
                    'table' => 'casinos',
                    'type' => 'INNER',
                    'conditions' => 'Casinos.business_id = Business.id'
                ],
                'Machines' => [
                    'table' => 'machines',
                    'type' => 'INNER',
                    'conditions' => [
                        'Machines.casino_id = Casinos.id',
                        'Machines.contract_id' => 2,
                    ]
                ]
            ])->all();

        $enero = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 1, 'year' => date('Y')])->first();
        $febrero = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 2, 'year' => date('Y')])->first();
        $marzo = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 3, 'year' => date('Y')])->first();
        $abril = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 4, 'year' => date('Y')])->first();
        $mayo = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 5, 'year' => date('Y')])->first();
        $junio = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 6, 'year' => date('Y')])->first();
        $julio = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 7, 'year' => date('Y')])->first();
        $agosto = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 8, 'year' => date('Y')])->first();
        $septiembre = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 9, 'year' => date('Y')])->first();
        $octubre = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 10, 'year' => date('Y')])->first();
        $noviembre = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 11, 'year' => date('Y')])->first();
        $diciembre = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 12, 'year' => date('Y')])->first();

        $this->set(compact('accountants', 'clients', 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'));
    }

    public function lastvalue($machineid =  null)
    {
        $this->autoRender = false;

        $machineid = $this->request->getQuery('machineid');

        $q = $this->db->execute("SELECT cashin, machine_id FROM accountants WHERE machine_id = " . $machineid . " ORDER BY ID DESC LIMIT 1")->fetchAll('obj');

        if ($q) {
            echo json_encode($q);
            die;
        }

        echo json_encode('error');
        die;
    }

    public function lastAccountants($machineid = null)
    {
        $dateNow = Chronos::parse('-2 Months');
        $machineid = $this->request->getQuery('machineid');


        if ($machineid === 0 || $machineid === '' || $machineid === null) {
            echo json_encode('error');
            die;
        }

        $lastAccountant = $this->Accountants->find()->where(['machine_id' => $machineid, 'month_id' => $dateNow->month, 'year' => $dateNow->year])->all();

        if (sizeof($lastAccountant) > 0) {
            echo json_encode($lastAccountant);
            die;
        } else {
            echo json_encode('vacio');
            die;
        }
    }

    public function liquidations($casinoid = null) {
        $casinoid = intval($this->request->getQuery('casinoid'));
        $date = Chronos::parse('-1 Month');

        if($casinoid === null || $casinoid === ''){
            echo json_encode('vacio');
            die;
        };

        $contadores = $this->Accountants->find()->select(['id',  'day_init', 'day_end', 'cashin', 'cashout', 'bet', 'win', 'profit', 'jackpot', 'gamesplayed', 'coljuegos', 'admin', 'total', 'alfastreet'])->select(['Machines.serial'])->join([
            'Machines' => [
                'table' => 'machines',
                'type' => 'INNER',
                'conditions' => 'Machines.id = Accountants.machine_id'
            ], 
            'Casinos' => [
                'table' => 'casinos',
                'type' => 'INNER',
                'conditions' => [
                    'Casinos.id' => $casinoid,
                    'Casinos.id = Accountants.casino_id'
                ],
            ],
        ])->where(['month_id' => $date->month, 'year' => $date->year, 'Casinos.id' => $casinoid])->all();

        if(sizeof($contadores) > 0){
            echo json_encode($contadores);
            die;
        } else {
            echo json_encode('vacio');
            die;
        }
    }

    public function accountMachine($machineid = null){
        $machineid = $this->request->getQuery('machineid');
        $date = Chronos::parse('-1 Month');

        if($machineid === '' || $machineid === null){
            echo json_encode('error');
            die; 
        }

        $query = $this->Accountants->find()->where(['machine_id' => $machineid, 'month_id' => $date->month])->first();

        echo(json_encode($query));
        die;
    }

    public function csv()
    {

        $data = $this->Accountants->find();
        $this->setResponse($this->getResponse()->withDownload('my-file.csv'));
        $this->set(compact('data'));
        $this->viewBuilder()
            ->setClassName('CsvView.Csv')
            ->setOption('serialize', 'data');
    }
}
