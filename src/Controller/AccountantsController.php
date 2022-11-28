<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
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
        $this->autoRender =  false;

        $coljuegosValue =  $this->fetchTable('Dataiportants')->find()->where(['id' => 2])->first()->value;
        $adminValue =  $this->fetchTable('Dataiportants')->find()->where(['id' => 3])->first()->value;
        $iva = $this->fetchTable('Dataiportants')->find()->where(['id' => 1])->first()->value;
        $alfaValue = $this->fetchTable('Dataiportants')->find()->where(['id' => 4])->first()->value;

        $casinoid = $this->request->getQuery('casinoid');
        $token = $this->request->getQuery('token');

        $accountant = $this->Accountants->newEmptyEntity();

        $accountant = $this->Accountants->patchEntity($accountant, $this->request->getData());



        $accountant->profit = $accountant->cashin - $accountant->cashout;
        $accountant->coljuegos = $accountant->profit * $coljuegosValue;
        $accountant->admin = $accountant->coljuegos * $adminValue;
        $accountant->total = $accountant->profit - $accountant->coljuegos - $accountant->admin - $iva;
        $accountant->alfastreet = $accountant->total * $alfaValue;
        $accountant->casino_id = $casinoid;
        $accountant->month_id = date('m', strtotime(date('d-m-Y') . "- 1 month"));
        $accountant->year = date('Y');
        $accountant->casino_id = $casinoid;
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

        $enero = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 1 , 'year' => date('Y')])->first();
        $febrero = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 2 , 'year' => date('Y')])->first();
        $marzo = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 3 , 'year' => date('Y')])->first();
        $abril = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 4 , 'year' => date('Y')])->first();
        $mayo = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 5 , 'year' => date('Y')])->first();
        $junio = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 6 , 'year' => date('Y')])->first();
        $julio = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 7 , 'year' => date('Y')])->first();
        $agosto = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 8 , 'year' => date('Y')])->first();
        $septiembre = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 9 , 'year' => date('Y')])->first();
        $octubre = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 10 , 'year' => date('Y')])->first();
        $noviembre = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 11 , 'year' => date('Y')])->first();
        $diciembre = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => 12 , 'year' => date('Y')])->first();

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
