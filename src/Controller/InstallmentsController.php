<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\UnavailableForLegalReasonsException;
use Cake\I18n\FrozenDate;

/**
 * Installments Controller
 *
 * @property \App\Model\Table\InstallmentsTable $Installments
 * @method \App\Model\Entity\Installment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InstallmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Installments->find();
        $this->Authorization->authorize($query);
        $this->paginate = [
            'contain' => ['Quotes'],
        ];
        $installments = $this->paginate($this->Installments);

        $this->set(compact('installments'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $installment = $this->Installments->newEmptyEntity();
        $this->Authorization->authorize($installment);
        $idQuote = $this->request->getQuery('quoteid');

        if($idQuote === NULL || $idQuote === ''){
            throw new UnavailableForLegalReasonsException();
        }

        if ($this->request->is('post')) {
            $installment = $this->Installments->patchEntity($installment, $this->request->getData());
            $installment->dateinstallment =  FrozenDate::now();

            if ($this->Installments->save($installment)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }
        $quotes = $this->Installments->Quotes->find()->where(['id' => $idQuote])->first();
        $receiver = $this->fetchTable('Business')->find()->where(['id' => $quotes->business_id])->first();
        $itemsQuote = $this->fetchTable('Detailsquotes')->find()->where(['quote_id' => $idQuote])->contain(['Parts', 'Monies'])->all();
        $exist = $this->Installments->find()->where(['quote_id' => $idQuote])->first();
        $this->set(compact('installment', 'quotes', 'itemsQuote', 'receiver', 'exist'));
    }

    public function pdf($quoteid = null)
    {
        $this->Authorization->skipAuthorization();
        $idQuote = $this->request->getQuery('quoteid');

        $this->viewBuilder()->enableAutoLayout(false);
        $quotes = $this->Installments->Quotes->find()->where(['id' => $idQuote])->first();
        $receiver = $this->fetchTable('Business')->find()->where(['id' => $quotes->business_id])->first();
        $itemsQuote = $this->fetchTable('Detailsquotes')->find()->where(['quote_id' => $idQuote])->contain(['Parts', 'Monies'])->all();

        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'portrait',
                'pageSize' => 'letter',
                'download' => true,
                'filename' => 'Orden de salida de la cotizacion '. $idQuote . '.pdf',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
            );

        $this->set(compact('receiver', 'itemsQuote', 'quotes'));
    }
}
