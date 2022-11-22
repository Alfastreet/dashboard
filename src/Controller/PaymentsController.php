<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 * @method \App\Model\Entity\Payment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Agreements', 'Destinies'],
        ];
        $payments = $this->paginate($this->Payments);

        $this->set(compact('payments'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => ['Agreements', 'Destinies'],
        ]);

        $this->set(compact('payment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($idAgreement = NULL)
    {
        $this->Authorization->skipAuthorization();
        $idAgreement = $this->request->getQuery('agreement');
        $agreements = $this->Payments->Agreements->find()->where(['id' => $idAgreement])->first();
        $puchito = $this->Payments->find()->select()->where(['agreement_id' => $idAgreement])->order(['id' => 'DESC'])->first();
        $seguimientoPagos = $this->Payments->find()->where(['agreement_id' => $idAgreement])->all();
        $wallet = $this->fetchTable('Wallets')->find()->where(['agreement_id' => $idAgreement])->first();

        if ($idAgreement === NULL || $idAgreement === '') {
            throw new RecordNotFoundException();
        }

        $payment = $this->Payments->newEmptyEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());

            $totalAbonado =  $payment->valuequote;
            $totalRecaudo = $wallet->collection + $totalAbonado;
            $maxQuote = $agreements->quotevalue;
            $trm = $payment->trm;
            $mesAbono = $payment->paymentquote;
            $this->fetchTable('Wallets')->query()->update()->set(['collection' => $totalRecaudo])->where(['agreement_id' => $idAgreement])->execute();


            // Si abona mas de la cuota minima
            if ($totalAbonado > $maxQuote) {

                if ($totalAbonado > $maxQuote) {
                    for ($totalAbonado; $totalAbonado > $maxQuote; $mesAbono++) {

                        $this->Payments->query()->insert(['agreement_id', 'paymentquote', 'valuequote', 'datepayment', 'destiny_id', 'bank_id', 'cop', 'trm', 'referencepay'])->values([
                            'agreement_id' => $idAgreement,
                            'paymentquote' => $mesAbono,
                            'valuequote' => $maxQuote,
                            'datepayment' => $payment->datepayment,
                            'destiny_id' => $payment->destiny_id,
                            'bank_id' => $payment->bank_id,
                            'cop' => $maxQuote * $trm,
                            'trm' => $trm,
                            'referencepay' => $payment->referencepay
                        ])->execute();

                        $totalAbonado = $totalAbonado - $maxQuote;
                    }
                }

                $this->Payments->query()->insert(['agreement_id', 'paymentquote', 'valuequote', 'datepayment', 'destiny_id', 'bank_id', 'cop', 'trm', 'referencepay'])->values([
                    'agreement_id' => $idAgreement,
                    'paymentquote' => $mesAbono,
                    'valuequote' => $totalAbonado,
                    'datepayment' => $payment->datepayment,
                    'destiny_id' => $payment->destiny_id,
                    'bank_id' => $payment->bank_id,
                    'cop' => $totalAbonado * $trm,
                    'trm' => $trm,
                    'referencepay' => $payment->referencepay
                ])->execute();

                echo json_encode('ok');
                die;
            }
            // Si el valor abonado es menor a la cuota
            else if ($totalAbonado < $maxQuote) {
                $this->Payments->query()->insert(['agreement_id', 'paymentquote', 'valuequote', 'datepayment', 'destiny_id', 'bank_id', 'cop', 'trm', 'referencepay'])->values([
                    'agreement_id' => $idAgreement,
                    'paymentquote' => $mesAbono,
                    'valuequote' => $totalAbonado,
                    'datepayment' => $payment->datepayment,
                    'destiny_id' => $payment->destiny_id,
                    'bank_id' => $payment->bank_id,
                    'cop' => $totalAbonado * $trm,
                    'trm' => $trm,
                    'referencepay' => $payment->referencepay
                ])->execute();

                echo json_encode('ok');
                die;
            }

            //Si el valor abonado es igual a la cuota
            else if ($totalAbonado = $maxQuote) {
                $this->Payments->query()->insert(['agreement_id', 'paymentquote', 'valuequote', 'datepayment', 'destiny_id', 'bank_id', 'cop', 'trm', 'referencepay'])->values([
                    'agreement_id' => $idAgreement,
                    'paymentquote' => $mesAbono,
                    'valuequote' => $totalAbonado,
                    'datepayment' => $payment->datepayment,
                    'destiny_id' => $payment->destiny_id,
                    'bank_id' => $payment->bank_id,
                    'cop' => $totalAbonado * $trm,
                    'trm' => $trm,
                    'referencepay' => $payment->referencepay
                ])->execute();

                echo json_encode('ok');
                die;
            }

            


            echo json_encode('error');
            die;
        }

        $destinies = $this->Payments->Destinies->find('list', ['limit' => 200])->all();
        $banks = $this->Payments->Banks->find('list', ['limit' => 200])->all();
        $this->set(compact('payment', 'agreements', 'destinies', 'wallet', 'banks', 'seguimientoPagos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $agreements = $this->Payments->Agreements->find('list', ['limit' => 200])->all();
        $destinies = $this->Payments->Destinies->find('list', ['limit' => 200])->all();
        $this->set(compact('payment', 'agreements', 'destinies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
