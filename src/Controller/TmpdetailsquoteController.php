<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Tmpdetailsquote Controller
 *
 * @property \App\Model\Table\TmpdetailsquoteTable $Tmpdetailsquote
 * @method \App\Model\Entity\Tmpdetailsquote[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TmpdetailsquoteController extends AppController
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
            'contain' => ['TypeProduct', 'Parts'],
        ];
        $tmpdetailsquote = $this->paginate($this->Tmpdetailsquote);

        $this->set(compact('tmpdetailsquote'));
    }

    /**
     * View method
     *
     * @param string|null $id Tmpdetailsquote id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tmpdetailsquote = $this->Tmpdetailsquote->get($id, [
            'contain' => ['TypeProduct', 'Parts'],
        ]);

        $this->set(compact('tmpdetailsquote'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->autoRender = false;

        if($this->request->is('ajax')) {

            $data = $_POST;

            $typeProducts = $data['typeProduct'];
            $idProduct = $data['product_id'];
            $amount = $data['amount'];
            $value = $data['value'];
            $token = md5($data['token']);
            $money_id = $data['money_id'];

            $query = $this->db->execute('INSERT INTO tmpdetailsquote (typeProduct_id, product_id, amount, token, value, money_id) VALUES ('.$typeProducts.', '.$idProduct.' , '.$amount.', "'.$token.'", "'.$value.'", '.$money_id.')')->fetchAll('assoc');
            echo json_encode('ok');

        }
        
    }


    public function tokenget() {
        $this->autoRender = false;

        if($this->request->is('ajax')) {
            $query = $this->db->execute('SELECT * FROM tmpdetailsquote');

            echo json_encode($query);
        }
    }
    
}
