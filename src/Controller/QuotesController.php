<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

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

        
        $this->paginate = [
            'contain' => ['Users', 'Business', 'Status'],
        ];
        $quotes = $this->paginate($this->Quotes);

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
        $quote = $this->Quotes->get($id, [
            'contain' => ['Users', 'Business', 'Status', 'Detailsquotes'],
        ]);

        $this->set(compact('quote'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quote = $this->Quotes->newEmptyEntity();
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
        $businesses = $this->Quotes->Business->find('list', ['limit' => 200])->all();
        $estatuses = $this->Quotes->Status->find('list', ['limit' => 200])->all();
        $this->set(compact('quote', 'users', 'businesses', 'estatuses'));
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

    /**
     * Delete method
     *
     * @param string|null $id Quote id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quote = $this->Quotes->get($id);
        if ($this->Quotes->delete($quote)) {
            
        } else {
            $this->Flash->error(__('The quote could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function pdf()
    {

        $this->autoRender = false;

        if($this->request->is('ajax')) {

            $data = $_POST;

            if(empty($data['codClient'])) {
                $clientId = 1;
            } 

            $clientId = $data['codClient'];

            $token = md5($data['token']);
            $user = 8;

            $query = $this->db->execute('SELECT * FROM tmpdetailsquote WHERE token = "'.$token.'"')->fetchAll('assoc');

            
            if($query) {
                
                $queryPros = $this->db->execute('CALL procesar_cotizacion('.$user.', '.$clientId.', "'.$token.'")')->fetchAll('assoc');
                
                echo json_encode($queryPros, JSON_UNESCAPED_UNICODE);

            } else {
                echo 'error';
            }

        }

        
    }


    public function getpdf($id = null) {



        $this->viewBuilder()->enableAutoLayout(false); 
        $quote = $this->Quotes->get($id);

        $client = $this->db->execute('SELECT q.id, q.date, q.totalUSD, q.totalEUR, q.totalCOP, q.token, u.name as userName, u.lastName as userLastName, dq.amount, dq.value as subtotal, p.serial, p.name as partName, p.value as unitPrice, cl.name as clientName, cl.phone, cl.email, bs.name as businessName, m.shortcode as moneyName FROM 
        quotes q INNER JOIN 
        users u ON q.user_id = u.id 
        INNER JOIN detailsquotes dq ON dq.quote_id = q.id 
        INNER JOIN parts p ON dq.product_id = p.id 
        INNER JOIN status s  ON q.estatus_id = s.id
        INNER JOIN client cl ON q.business_id = cl.id
        INNER JOIN business bs ON cl.business_id = bs.id
        INNER JOIN money m ON dq.money_id = m.id
        WHERE q.id = '.$quote->id.'')->fetchAll('assoc');

        // print_r($client);
        // exit;

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


    public function search () {
        $this->autoRender = false;
            
        $business_id = $this->request->getQuery("business_id");

        $user = $this->db->execute("SELECT c.id, c.name, cp.position FROM client c INNER JOIN clientposition cp ON c.position_id = cp.id WHERE c.business_id = ".$business_id)->fetchAll('assoc');

        if($user !== null || $user !== ['']) {
            echo json_encode($user);
            die;
        }
    }

    public function getCasino() {

        $this->autoRender = false;
     
        $client_id = $this->request->getQuery('client_id');

        $casino = $this->db->execute('SELECT cs.id, cs.name FROM clientscasinos clcs  INNER JOIN casinos cs ON clcs.casino_id = cs.id WHERE clcs.client_id = '.$client_id)->fetchAll('assoc');

        echo json_encode($casino);
        die;        
    }

    public function getPart() {

        $this->autoRender = false;

        $serial_id = $this->request->getQuery('serial_id');

        $serial = $this->db->execute("SELECT * FROM parts WHERE serial = '" .$serial_id."'")->fetchAll('assoc');

        echo json_encode($serial);
        die;
        
    }


}
