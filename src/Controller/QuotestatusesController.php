<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Quotestatuses Controller
 *
 * @property \App\Model\Table\QuotestatusesTable $Quotestatuses
 * @method \App\Model\Entity\Quotestatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuotestatusesController extends AppController
{
    
    private $db;

    public function initialize(): void
    {
        parent::initialize();
        $this->db = ConnectionManager::get("default");
    }
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->autoRender = false;
        $quotestatus = $this->Quotestatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $quotestatus = $this->Quotestatuses->patchEntity($quotestatus, $this->request->getData());
            $quotestatus->comment = '';
            if ($this->Quotestatuses->save($quotestatus)) {
                echo json_encode('exito');
                die;
            }
            echo json_encode('error');
            die;
        }

    }

    public function comment($quote = null, $invoice = null)
    {
        $quote = $_GET['quote'];
        $invoice = $_GET['invoice'];

        $comments = $this->db->execute('UPDATE quotestatuses SET invoice = "'.$invoice.'" WHERE quote_id = '.$quote.' LIMIT 1');

        if($comments){
            echo json_encode('ok');
            die;
        }
        echo json_encode('error');
        die;
    }

    /**
     * Edit method
     *
     * @param string|null $id Quotestatus id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quotestatus = $this->Quotestatuses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quotestatus = $this->Quotestatuses->patchEntity($quotestatus, $this->request->getData());
            if ($this->Quotestatuses->save($quotestatus)) {
                $this->Flash->success(__('The quotestatus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quotestatus could not be saved. Please, try again.'));
        }
        $quotes = $this->Quotestatuses->Quotes->find('list', ['limit' => 200])->all();
        $this->set(compact('quotestatus', 'quotes'));
    }

    
}
