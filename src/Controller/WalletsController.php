<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Wallet;

/**
 * Wallets Controller
 *
 * @property \App\Model\Table\WalletsTable $Wallets
 * @method \App\Model\Entity\Wallet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WalletsController extends AppController
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
            'contain' => ['Agreements'],
        ];
        $wallets = $this->paginate($this->Wallets);

        $this->set(compact('wallets'));
    }

    /**
     * View method
     *
     * @param string|null $id Wallet id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $wallet = $this->Wallets->get($id, [
            'contain' => ['Agreements'],
        ]);

        $client = $this->fetchTable('Client')->find()->select(['name', 'phone'])->where(['id' => $wallet->agreement->client_id])->first();
        $business = $this->fetchTable('Business')->find()->select(['name', 'nit'])->where(['id' => $wallet->agreement->business_id])->first();
        $machine = $this->fetchTable('Machines')->find()
            ->select([
                'serial'
            ])->select([
                'Model.name'
            ])->join([
                'Model' => [
                    'table' => 'model',
                    'type' => 'INNER',
                    'conditions' => 'Model.id = Machines.model_id'
                ]
            ])->first();

        $quote = $this->fetchTable('Payments')->find()->select(['paymentquote', 'datepayment'])->order(['id' => 'DESC'])->where(['agreement_id' => $wallet->agreement_id])->first();
        $payments = $this->fetchTable('Payments')->find()->select(['id', 'agreement_id', 'paymentquote', 'valuequote', 'datepayment', 'trm', 'cop', 'referencepay'])->select(['Bank.name'])->select('Destiny.name')->join([
            'Bank' => [
                'table' => 'banks',
                'type' => 'INNER',
                'conditions' => 'Bank.id = payments.bank_id'
            ],
            'Destiny' => [
                'table' => 'destinies',
                'type' => 'INNER',
                'conditions' => 'Destiny.id = payments.destiny_id'
            ]
        ])->where(['agreement_id' => $wallet->agreement_id])->all();
        $initialscounts = $this->fetchTable('paymentinitials')->find()->where(['agreement_id' => $wallet->agreement_id])->count();
        $initials = $this->fetchTable('paymentinitials')->find()->select(['id', 'agreement_id', 'valuequote', 'datepayment', 'trm', 'cop', 'referencepay'])->select(['Bank.name'])->select('Destiny.name')->join([
            'Bank' => [
                'table' => 'banks',
                'type' => 'INNER',
                'conditions' => 'Bank.id = paymentinitials.bank_id'
            ],
            'Destiny' => [
                'table' => 'destinies',
                'type' => 'INNER',
                'conditions' => 'Destiny.id = paymentinitials.destiny_id'
            ]
        ])->where(['agreement_id' => $wallet->agreement_id])->all();
        $this->set(compact('wallet', 'client', 'business', 'machine', 'quote', 'payments', 'initials', 'initialscounts'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->autoRender = false;
        $wallet = $this->Wallets->newEmptyEntity();
        $this->Authorization->skipAuthorization();
        if ($this->request->is('post')) {
            $wallet = $this->Wallets->patchEntity($wallet, $this->request->getData());
            $wallet->lastpay = date('Y-m-d');
            $wallet->quotemora = 0;
            $wallet->mora = 0;
            if ($this->Wallets->save($wallet)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }
        $agreements = $this->Wallets->Agreements->find('list', ['limit' => 200])->all();
        $this->set(compact('wallet', 'agreements'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wallet id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wallet = $this->Wallets->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wallet = $this->Wallets->patchEntity($wallet, $this->request->getData());
            if ($this->Wallets->save($wallet)) {
                $this->Flash->success(__('The wallet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wallet could not be saved. Please, try again.'));
        }
        $agreements = $this->Wallets->Agreements->find('list', ['limit' => 200])->all();
        $this->set(compact('wallet', 'agreements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wallet id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wallet = $this->Wallets->get($id);
        if ($this->Wallets->delete($wallet)) {
            $this->Flash->success(__('The wallet has been deleted.'));
        } else {
            $this->Flash->error(__('The wallet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
