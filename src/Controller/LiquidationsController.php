<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Chronos\Chronos;
use Cake\Http\Exception\UnauthorizedException;
use Cake\Routing\Exception\MissingRouteException;

/**
 * Liquidations Controller
 *
 * @property \App\Model\Table\LiquidationsTable $Liquidations
 * @method \App\Model\Entity\Liquidation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LiquidationsController extends AppController
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
            'contain' => ['Casinos', 'Machines', 'Month'],
        ];
        $liquidations = $this->paginate($this->Liquidations);

        $this->set(compact('liquidations'));
    }

    /**
     * View method
     *
     * @param string|null $id Liquidation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $liquidation = $this->Liquidations->get($id, [
            'contain' => ['Casinos', 'Machines', 'Month'],
        ]);

        $this->set(compact('liquidation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($casinoid = null)
    {
        $this->autoRender = false;
        $this->Authorization->skipAuthorization();
        $casinoid = $this->request->getQuery('casinoid');
        $liquidation = $this->Liquidations->newEmptyEntity();
        $date = Chronos::parse('-1 Month');
        $iva = $this->fetchTable('Dataiportants')->find()->select(['value'])->where(['id' => 1])->first();


        if ($casinoid === null || $casinoid === '') {
            echo json_encode('error');
            die;
        }

        if ($this->request->is('post')) {
            $liquidation = $this->Liquidations->patchEntity($liquidation, $this->request->getData());
            $percent = floatval($this->request->getData('percent'));
            $liquidation->casino_id = intval($casinoid);
            $liquidation->month_id = $date->month;
            $liquidation->year = $date->year;
            $profit = intval($liquidation->profit);
            $liquidation->coljuegos = $profit * 0.12;
            $liquidation->admin = $liquidation->coljuegos * 0.01;
            $liquidation->total = $profit - $liquidation->coljuegos - $liquidation->admin - $iva->value;
            $liquidation->alfastreet = $liquidation->total * $percent;

            // debug($this->Liquidations->save($liquidation));
            // die;

            if ($this->Liquidations->save($liquidation)) {
                echo json_encode('ok');
                die;
            } else {
                echo json_encode('error');
                die;
            }
        }
    }

    public function liquidation($casinoid = null)
    {
        $this->autoRender = false;
        $this->Authorization->skipAuthorization();
        $casinoid = $this->request->getQuery('casino');
        $date = Chronos::parse('-1 Month');

        if ($casinoid === null || $casinoid === '') {
            echo json_encode('error');
            die;
        }

        $query = $this->Liquidations->find()->select(['id', 'cashin', 'cashout', 'bet', 'win', 'profit', 'jackpot', 'games', 'coljuegos', 'admin', 'total', 'alfastreet'])->select(['Machines.serial'])->join([
            'Machines' => [
                'table' => 'machines',
                'type' => 'INNER',
                'conditions' => 'Machines.id = Liquidations.machine_id'
            ],
            'Casinos' => [
                'table' => 'casinos',
                'type' => 'INNER',
                'conditions' => [
                    'Casinos.id' => $casinoid,
                    'Casinos.id = Liquidations.casino_id'
                ],
            ],
        ])->where(['month_id' => $date->month, 'year' => $date->year, 'Casinos.id' => $casinoid])->all();

        if (sizeof($query) > 0) {
            echo json_encode($query);
            die;
        } else {
            echo json_encode('vacio');
            die;
        }
    }

    public function totalLiquidation($casinoid = null)
    {
        $this->autoRender = false;
        $this->Authorization->skipAuthorization();
        $casinoid = $this->request->getQuery('casino');
        $date = Chronos::parse('-1 Month');
        $total = 0;

        if ($casinoid === null || $casinoid === '') {
            echo json_encode('error');
            die;
        }

        $query = $this->Liquidations->find()->select(['alfastreet'])->where(['casino_id' => $casinoid, 'month_id' => $date->month])->all();

        foreach ($query as $i) {
            $total += $i->alfastreet;
        }

        echo json_encode($total);
        die;
    }
}
