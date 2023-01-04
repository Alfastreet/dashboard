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
        $accountant = $this->Accountants->newEmptyEntity();
        $date = Chronos::parse('-1 Month');
        $this->Authorization->authorize($accountant);
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
            $dayInit = new Chronos($accountant->day_init);
            $dayEnd =  new Chronos($accountant->day_end);
            $diffDays = $dayInit->diffInDays($dayEnd);
            $percent = floatval($this->request->getData('percent'));
            $accountant->day_init = $dayInit;
            $accountant->day_end = $dayEnd;
            $accountant->totaldays = $diffDays;
            $accountant->profit = $accountant->cashin - $accountant->cashout;
            $accountant->coljuegos = $accountant->profit * $coljuegosValue;
            $accountant->admin = $accountant->coljuegos * $adminValue;
            $accountant->total = $accountant->profit - $accountant->coljuegos - $accountant->admin - $iva;
            $accountant->alfastreet = $accountant->total * $percent;
            $accountant->month_id = $date->month;
            $accountant->year = $date->year;
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
        $query = $this->Accountants->find();
        $this->Authorization->authorize($query);      
        $date = Chronos::parse('-1 Month');
        $this->paginate = [
            'contain' => ['Machines', 'Casinos'],
        ];
        $accountants = $this->paginate($this->Accountants, [
            'limit' => 10000,
            'maxLimit' => 10000,
        ]);

        $liquidations = $this->fetchTable('Totalaccountants')->find()->contain(['Casinos', 'Months'])->all();
        $totalMes = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => $date->month
        ])->all();
        $recaudado = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => $date->month, 'estatus' => 'Liquidado'])->all();

        $this->set(compact('accountants', 'liquidations', 'totalMes', 'date', 'recaudado'));
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

        $contadores = $this->Accountants->find()->select(['id',  'day_init', 'day_end', 'cashin', 'cashout', 'bet', 'win', 'profit', 'jackpot', 'gamesplayed', 'coljuegos', 'admin', 'total', 'alfastreet', 'totaldays'])->select(['Machines.serial'])->join([
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

    public function pdf($casino = null)
    {
        $this->Authorization->skipAuthorization();
        $casino = $this->request->getQuery('casino');
        $date = Chronos::parse('-1 Month');

        $this->viewBuilder()->enableAutoLayout(false);

        $maquinas = $this->fetchTable('Liquidations')->find()->where(['casino_id' => $casino, 'month_id' => $date->month])->all();

        $nameCasino = $this->fetchTable('Casinos')->find()->select(['name'])->where(['id' => $casino])->first();

        $totalLiquidacion = $this->fetchTable('Totalaccountants')->find()->where(['casino_id' => $casino, 'month_id' => $date->month])->first();

        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig', [
                'orientation' => 'portrait',
                'pageSize' => 'A3',
                'filename' => 'Liquidación-'.$date->month.'-casino-'.$nameCasino->name.'.pdf',
                'isHtml5ParserEnabled' => true,
            ],
        );

        $this->set(compact('maquinas', 'totalLiquidacion', 'casino', 'nameCasino'));
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
