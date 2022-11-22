<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Paymentinitials Controller
 *
 * @property \App\Model\Table\PaymentinitialsTable $Paymentinitials
 * @method \App\Model\Entity\Paymentinitial[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PaymentinitialsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Agreements'],
        ];
        $paymentinitials = $this->paginate($this->Paymentinitials);

        $this->set(compact('paymentinitials'));
    }

    /**
     * View method
     *
     * @param string|null $id Paymentinitial id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentinitial = $this->Paymentinitials->get($id, [
            'contain' => ['Agreements'],
        ]);

        $this->set(compact('paymentinitial'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $idAgreement = $this->request->getQuery('agreement');
        $agreements = $this->Paymentinitials->Agreements->find()->where(['id' => $idAgreement])->first();
        $wallet = $this->fetchTable('Wallets')->find()->where(['agreement_id' => $idAgreement])->first();

        if ($idAgreement === NULL || $idAgreement === '') {
            throw new RecordNotFoundException();
        }

        $paymentinitial = $this->Paymentinitials->newEmptyEntity();
        if ($this->request->is('post')) {
            $paymentinitial = $this->Paymentinitials->patchEntity($paymentinitial, $this->request->getData());
            $totalRecaudo = $wallet->collection + $paymentinitial->valuequote;
            
            if ($paymentinitial->valuequote > $agreements->quoteini) {
                //Obtener el sobrante
                $residuo = $paymentinitial->valuequote - $agreements->quoteini;
                $trm = $paymentinitial->trm;

                //Verificar el maximo valor a insertar
                $maxQuote = $agreements->quotevalue;
                $i = 0;

                if ($residuo > $maxQuote) {
                    for ($residuo; $residuo > $maxQuote; $i++) {
                        $this->fetchTable('Payments')->query()->insert(['agreement_id', 'paymentquote', 'valuequote', 'datepayment', 'destiny_id', 'bank_id', 'cop', 'trm', 'referencepay'])->values([
                            'agreement_id' => $idAgreement,
                            'paymentquote' => $i + 1,
                            'valuequote' => $maxQuote,
                            'datepayment' => $paymentinitial->datepayment,
                            'destiny_id' => $paymentinitial->destiny_id,
                            'bank_id' => $paymentinitial->bank_id,
                            'cop' => $maxQuote * $trm,
                            'trm' => $trm,
                            'referencepay' => $paymentinitial->referencepay,
                        ])->execute();

                        $residuo = $residuo - $maxQuote;
                    }

                    if ($residuo > 0) {
                        $this->fetchTable('Payments')->query()->insert(['agreement_id', 'paymentquote', 'valuequote', 'datepayment', 'destiny_id', 'bank_id', 'cop', 'trm', 'referencepay'])->values([
                            'agreement_id' => $idAgreement,
                            'paymentquote' => $i + 1,
                            'valuequote' => $residuo,
                            'datepayment' => $paymentinitial->datepayment,
                            'destiny_id' => $paymentinitial->destiny_id,
                            'bank_id' => $paymentinitial->bank_id,
                            'cop' => $residuo * $trm,
                            'trm' => $trm,
                            'referencepay' => $paymentinitial->referencepay,
                        ])->execute();
                    }
                } else if ($residuo <= $maxQuote) {
                    $this->fetchTable('Payments')->query()->insert(['agreement_id', 'paymentquote', 'valuequote', 'destiny_id', 'bank_id', 'cop', 'trm', 'referencepay'])->values([
                        'agreement_id' => $idAgreement,
                        'paymentquote' => $i + 1,
                        'valuequote' => $residuo,
                        'destiny_id' => $paymentinitial->destiny_id,
                        'bank_id' => $paymentinitial->bank_id,
                        'cop' => $residuo * $trm,
                        'trm' => $trm,
                        'referencepay' => $paymentinitial->referencepay,
                    ])->execute();
                }

                //Asignar los valores maximos
                $paymentinitial->valuequote = $agreements->quoteini;
                $paymentinitial->cop = $paymentinitial->valuequote * $paymentinitial->trm;
            }

            if ($this->Paymentinitials->save($paymentinitial)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }

        $destinies = $this->Paymentinitials->Destinies->find('list', ['limit' => 200])->all();
        $banks = $this->Paymentinitials->Banks->find('list', ['limit' => 200])->all();
        $this->set(compact('paymentinitial', 'agreements', 'destinies', 'banks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Paymentinitial id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentinitial = $this->Paymentinitials->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentinitial = $this->Paymentinitials->patchEntity($paymentinitial, $this->request->getData());
            if ($this->Paymentinitials->save($paymentinitial)) {
                $this->Flash->success(__('The paymentinitial has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The paymentinitial could not be saved. Please, try again.'));
        }
        $agreements = $this->Paymentinitials->Agreements->find('list', ['limit' => 200])->all();
        $this->set(compact('paymentinitial', 'agreements'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Paymentinitial id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentinitial = $this->Paymentinitials->get($id);
        if ($this->Paymentinitials->delete($paymentinitial)) {
            $this->Flash->success(__('The paymentinitial has been deleted.'));
        } else {
            $this->Flash->error(__('The paymentinitial could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
