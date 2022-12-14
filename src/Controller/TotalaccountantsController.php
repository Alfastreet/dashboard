<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Chronos\Chronos;
use Cake\Controller\Exception\MissingActionException;

/**
 * Totalaccountants Controller
 *
 * @property \App\Model\Table\TotalaccountantsTable $Totalaccountants
 * @method \App\Model\Entity\Totalaccountant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TotalaccountantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Casinos', 'Month'],
        ];
        $totalaccountants = $this->paginate($this->Totalaccountants);

        $this->set(compact('totalaccountants'));
    }

    /**
     * View method
     *
     * @param string|null $id Totalaccountant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $totalaccountant = $this->Totalaccountants->get($id, [
            'contain' => ['Casinos', 'Machines', 'Months'],
        ]);

        $this->set(compact('totalaccountant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $totalaccountant = $this->Totalaccountants->newEmptyEntity();
        $date = Chronos::parse('-1 Month');
        $dateNow = Chronos::today();
        if ($this->request->is('post')) {
            $totalaccountant = $this->Totalaccountants->patchEntity($totalaccountant, $this->request->getData());
            $totalaccountant->month_id = $date->month;
            $totalaccountant->year = $date->year;
            $totalaccountant->estatus = 'Pendiente';
            $totalaccountant->dateliquidation = $dateNow;

            if ($totalaccountant->totalLiquidation < 0) {
                $totalaccountant->estatus = 'Negativo';
            }
            
            if ($this->Totalaccountants->save($totalaccountant)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }
        $casinos = $this->Totalaccountants->Casinos->find('list', ['limit' => 200])->all();
        $months = $this->Totalaccountants->Month->find('list', ['limit' => 200])->all();
        $this->set(compact('totalaccountant', 'casinos', 'months'));
    }

    public function resume($id = null, $token = null)
    {
        $this->Authorization->skipAuthorization();
        $id = $this->request->getQuery('casino_id');
        $token = $this->request->getQuery('token');
        $tokenCasino = $this->fetchTable('Casinos')->find()->select(['token'])->where(['id' => $id])->first();

        if ($token != $tokenCasino->token) {
            throw new MissingActionException();
        }

        $totalaccountant = $this->Totalaccountants->find()->select([
            'id',
            'year',
            'totalLiquidation',
            'dateliquidation',
            'estatus'
        ])->select([
            'Month.month'
        ])->join([
            'Month' => [
                'table' => 'month',
                'type' => 'INNER',
                'conditions' => 'Month.id = Totalaccountants.month_id'
            ]
        ])->where([
            'casino_id' => $id
        ])->all();
        $casinoBusiness = $this->fetchTable('Casinos')->find()->select(['business_id'])->where(['id' => $id])->first();
        $business = $this->fetchTable('Business')->find()->where(['id' => $casinoBusiness->business_id])->first();

        $this->set(compact('totalaccountant', 'business'));
    }

    public function updateStatus($id = null, $nfactura = null)
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $id = $this->request->getQuery('id');
        $nfactura = $this->request->getQuery('nfactura');

        if($id === null || $id === ''){
            echo json_encode('error');
            die;
        }
        if($nfactura === null || $nfactura === ''){
            echo json_encode('error');
            die;
        }

        $query = $this->Totalaccountants->query()->update()->set(['nfactura' => $nfactura, 'estatus' => 'Liquidado'])->where(['id' => $id])->execute();

        if($query){
            echo json_encode('ok');
            die;
        } else {
            echo json_encode('error');
            die;
        }

    }
}
