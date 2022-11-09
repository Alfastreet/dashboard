<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Utility\Security;
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
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $tmp = $this->Tmpdetailsquote->newEmptyEntity();

        if ($this->request->is('post')) {

            $tmp = $this->Tmpdetailsquote->patchEntity($tmp, $this->request->getData());
            $money = $this->request->getData('money_id');
            $token = Security::hash(Security::randomBytes(25));
            $tmp->money_id = $money;
            $tmp->token = $token;

            if ($this->Tmpdetailsquote->save($tmp)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }
    }

    public function detailsQuote()
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;
        $query = $this->Tmpdetailsquote->find()->select([
            'id',
            'product_id',
            'amount',
            'value'
        ])->select([
            'Parts.serial',
            'Parts.name',
            'Parts.money_id',
            'Parts.value',
            'Monies.name'
        ])->join([
            'Parts' => [
                'table' => 'parts',
                'type' => 'INNER',
                'conditions' => 'Parts.id = Tmpdetailsquote.product_id'
            ],
            'Monies' => [
                'table' => 'monies',
                'type' => 'INNER',
                'conditions' => 'Parts.money_id = Monies.id'
            ]
        ])->all();

        echo (json_encode($query));
        die;
    }


    public function tokenget()
    {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $query = $this->db->execute('SELECT * FROM tmpdetailsquote');

            echo json_encode($query);
        }
    }

    public function delete($id = null)
    {
        $tmpdetailsquote = $this->Tmpdetailsquote->get($id);
        if ($this->Tmpdetailsquote->delete($tmpdetailsquote)) {
            echo json_encode('ok');
            die;
        }
    }
}
