<?php

declare(strict_types=1);

namespace App\Controller;

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
        $this->Authorization->skipAuthorization();
        $casinoid = $this->request->getQuery('casinoId');
        $liquidation = $this->Liquidations->newEmptyEntity();
        $iva = $this->fetchTable('Dataiportants')->find()->select(['value'])->where(['id' => 1])->first(); 
       
        
        if ($casinoid === NULL || $casinoid === '') {
            throw new UnauthorizedException();
        }
        
        if ($this->request->is('post')) {
            $liquidation = $this->Liquidations->patchEntity($liquidation, $this->request->getData());
            $lastAccountant = $this->fetchTable('Accountants')->find()->where(['casino_id' => $casinoid, 'month_id' => date('m', strtotime(date('d-m-Y') . '-2 month')), 'machine_id' => $liquidation->machine_id ])->first();
            $cashin = $liquidation->cashin;
            $liquidation->casino_id = $casinoid;
            $liquidation->month_id = date('m', strtotime(date('d-m-Y'). '-1 month'));
            $liquidation->year = date('Y');

            $liquidation->cashin = $liquidation->cashin - $lastAccountant->cashin;
            $liquidation->cashout = $liquidation->cashout - $lastAccountant->cashout;
            $liquidation->bet = $liquidation->bet - $lastAccountant->bet ;
            $liquidation->win = $liquidation->win - $lastAccountant->win;
            $liquidation->jackpot = $liquidation->jackpot - $lastAccountant->jackpot;
            $liquidation->profit = $liquidation->cashin - $liquidation->cashout - $liquidation->jackpot;
            $liquidation->coljuegos = $liquidation->profit * 0.12;
            $liquidation->admin = $liquidation->coljuegos * 0.01;
            $liquidation->total = $liquidation->profit - $liquidation->coljuegos - $liquidation->admin - $iva->value;
            $liquidation->alfastreet = $liquidation->total * 0.40;

            if ($this->Liquidations->save($liquidation)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;  
        }


        $casinos = $this->Liquidations->Casinos->find('list', ['limit' => 200])->all();
        $machines = $this->Liquidations->Machines->find('list', ['limit' => 200])->all();
        $months = $this->Liquidations->Month->find('list', ['limit' => 200])->all();
        $this->set(compact('liquidation', 'casinos', 'machines', 'months'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Liquidation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $liquidation = $this->Liquidations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $liquidation = $this->Liquidations->patchEntity($liquidation, $this->request->getData());
            if ($this->Liquidations->save($liquidation)) {
                $this->Flash->success(__('The liquidation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The liquidation could not be saved. Please, try again.'));
        }
        $casinos = $this->Liquidations->Casinos->find('list', ['limit' => 200])->all();
        $machines = $this->Liquidations->Machines->find('list', ['limit' => 200])->all();
        $months = $this->Liquidations->Months->find('list', ['limit' => 200])->all();
        $this->set(compact('liquidation', 'casinos', 'machines', 'months'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Liquidation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $liquidation = $this->Liquidations->get($id);
        if ($this->Liquidations->delete($liquidation)) {
            $this->Flash->success(__('The liquidation has been deleted.'));
        } else {
            $this->Flash->error(__('The liquidation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
