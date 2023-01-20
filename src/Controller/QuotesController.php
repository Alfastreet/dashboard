<?php

declare(strict_types=1);

namespace App\Controller;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GuzzleHttp\Client;
use App\Controller\AppController;
use PDFGeneratorAPI\Configuration;
use PDFGeneratorAPI\Api\DocumentsApi;
use Cake\Datasource\ConnectionManager;
use Exception;

/**
 * Quotes Controller
 *
 * @property \App\Model\Table\QuotesTable $Quotes
 * @method \App\Model\Entity\Quote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuotesController extends AppController
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
        $query = $this->Quotes->find();
        $this->Authorization->authorize($query);
        $this->paginate = [
            'contain' => ['Users', 'Business', 'Status'],
        ];
        $quotes = $this->paginate($this->Quotes, [
            'limit' => 10000,
            'maxLimit' => 10000,
        ]);

        $this->set(compact('quotes'));
    }

    /**
     * View method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $quote = $this->Quotes->get($id, [
            'contain' => ['Users', 'Business', 'Status', 'Detailsquotes'],
        ]);

        $products = $this->fetchTable('Parts')->find('all')->all();
        $money = $this->fetchTable('Monies')->find('all')->all();
        $quotestatus = $this->fetchTable('Quotestatuses')->find('all')->where(['quote_id' => $id])->all();
        $orders = $this->fetchTable('Orders')->find()->where(['quote_id' => $id])->first();
        $installments = $this->fetchTable('Installments')->find()->where(['quote_id' => $id])->first();
        $this->set(compact('quote', 'products', 'money', 'quotestatus', 'orders', 'installments'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quote = $this->Quotes->newEmptyEntity();
        $this->Authorization->authorize($quote);
        if ($this->request->is('post')) {

            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());

            $date = $this->request->getData('date');
            $dateNow = date("Y-m-d H:i:s");

            $quote->date = $dateNow;

            $status = $this->request->getData('status_id');
            $statusNow = 2;

            $quote->status_id = $statusNow;

            if ($this->Quotes->save($quote)) {


                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }

        $users = $this->Quotes->Users->find('list', ['limit' => 200])->all();
        $businesses = $this->Quotes->Business->find('list', ['limit' => 200])->order(['name' => 'ASC'])->all();
        $estatuses = $this->Quotes->Status->find('list', ['limit' => 200])->all();
        $parts = $this->fetchTable('Parts')->find()->contain(['Typeproducts', 'Monies'])->all();
        $this->set(compact('quote', 'users', 'businesses', 'estatuses', 'parts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quote = $this->Quotes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $quote = $this->Quotes->patchEntity($quote, $this->request->getData());

            if ($this->Quotes->save($quote)) {


                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quote could not be saved. Please, try again.'));
        }

        $users = $this->Quotes->Users->find('list', ['limit' => 200])->all();
        $businesses = $this->Quotes->Business->find('list', ['limit' => 200])->all();
        $estatuses = $this->Quotes->Status->find('list', ['limit' => 200])->all();
        $this->set(compact('quote', 'users', 'businesses', 'estatuses'));
    }


    public function getpdf($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->viewBuilder()->enableAutoLayout(false);
        $quote = $this->Quotes->get($id);

        $client = $this->db->execute('SELECT q.id, q.date, q.totalUSD, q.totalEUR, q.totalCOP, q.comments, dq.typeProduct_id, dq.product_id, dq.amount, dq.value AS subtotal, p.name AS pname, p.serial, p.value AS valorUnidad, b.nit, b.phone, b.email, b.name AS bName, m.shortcode
            FROM quotes q 
            INNER JOIN detailsquotes dq ON dq.quote_id = q.id 
            INNER JOIN parts p ON dq.product_id = p.id 
            INNER JOIN business b ON q.business_id = b.id
            INNER JOIN monies m ON dq.money_id = m.id
            WHERE q.id = ' . $quote->id . '')->fetchAll('obj');

        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'letter',
                'download' => true, // This can be omitted if "filename" is specified.
                'filename' => '0' . $id . '.pdf', //// This can be omitted if you want file name based on URL.
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
        );
        $this->set('quote', $client);
    }


    public function search()
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $business_id = $this->request->getQuery("business_id");
        $user = $this->db->execute("SELECT c.id, c.name, cp.position FROM client c INNER JOIN clientposition cp ON c.position_id = cp.id WHERE c.business_id = " . $business_id)->fetchAll('assoc');

        if ($user !== null || $user !== ['']) {
            echo json_encode($user);
            die;
        }
    }

    public function getCasino()
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $client_id = $this->request->getQuery('client_id');
        $casino = $this->db->execute('SELECT cs.id, cs.name FROM clientscasinos clcs  INNER JOIN casinos cs ON clcs.casino_id = cs.id WHERE clcs.client_id = ' . $client_id)->fetchAll('assoc');
        echo json_encode($casino);
        die;
    }

    public function getPart()
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $serial_id = $this->request->getQuery('serial_id');
        $serial = $this->db->execute("SELECT * FROM parts WHERE serial = '" . $serial_id . "'")->fetchAll('assoc');
        echo json_encode($serial);
        die;
    }



    public function dataQuote()
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $register = $this->db->execute('SELECT * FROM tmpdetailsquote')->fetchAll('assoc');
        if ($register) {
            $data = $_POST;
            $insertQuoteP1 = $this->db->execute('INSERT INTO quotes(user_id, business_id) VALUES (' . $data['user_id'] . ', ' . $data['business_id'] . ')');
            if ($insertQuoteP1) {
                $selectLast = $this->db->execute('SELECT * FROM quotes ORDER BY ID DESC LIMIT 1')->fetchAll('assoc');
                if ($selectLast) {
                    foreach ($register as $res) {
                        $insertDetails = $this->db->execute('INSERT INTO detailsquotes(quote_id, typeProduct_id, product_id, amount, money_id, value) VALUES (' . $selectLast[0]['id'] . ', ' . $res['typeProduct_id'] . ', ' . $res['product_id'] . ', ' . $res['amount'] . ', ' . $res['money_id'] . ', ' . $res['value'] . ')');
                    }
                    if ($insertDetails) {
                        $sumDollars = $this->db->execute('SELECT SUM(value) FROM tmpdetailsquote WHERE money_id = 1')->fetchAll('assoc');
                        $resDollars = $sumDollars[0]['SUM(value)']  > 0 ? $sumDollars[0]['SUM(value)'] : '0';
                        $sumEur = $this->db->execute('SELECT SUM(value) FROM tmpdetailsquote WHERE money_id = 2')->fetchAll('assoc');
                        $resEur = $sumEur[0]['SUM(value)']  > 0 ? $sumEur[0]['SUM(value)'] : '0';
                        $sumCop = $this->db->execute('SELECT SUM(value) FROM tmpdetailsquote WHERE money_id = 3')->fetchAll('assoc');
                        $resCop = $sumCop[0]['SUM(value)']  > 0 ? $sumCop[0]['SUM(value)'] : '0';

                        $insertPrices = $this->db->execute('UPDATE quotes SET totalUSD = ' . $resDollars . ', totalEUR = ' . $resEur . ', totalCOP = ' . $resCop . ' ORDER BY ID DESC LIMIT 1');

                        if ($insertPrices) {
                            echo json_encode('ok');
                            exit;
                        }
                    }
                }
            }
        }
    }

    public function deleteTmp()
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $delete = $this->db->execute('DELETE FROM tmpdetailsquote');
        echo json_encode('delete');
        exit;
    }

    public function comments($value = null)
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $value = $this->request->getQuery('comment');
        $insertComment = $this->db->execute("UPDATE quotes SET comments = '" . $value . "' ORDER BY ID DESC LIMIT 1");
        if ($insertComment) {
            echo json_encode('ok');
            exit;
        }
    }

    public function changestatus($quote = null, $status = null)
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $quote = $this->request->getQuery('quote');
        $status = $this->request->getQuery('status');
        $this->Quotes->query()->update()->set([
            'estatus_id' => $status
        ])->where([
            'id' => $quote
        ])->execute();
        echo json_encode('ok');
        die;
    }
}
