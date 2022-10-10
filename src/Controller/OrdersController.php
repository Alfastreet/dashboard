<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Exception\NotFoundException;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Quotes', 'Users', 'Orderstatuses'],
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Quotes', 'Users', 'Orderstatuses'],
        ]);

        $clientFetch = $this->fetchTable('Business')->find()->all();
        $detailsquotes = $this->fetchTable('Detailsquotes')->find('all')->where(['quote_id' => $order->quote_id])->all();
        $money = $this->fetchTable('Monies')->find()->all();
        $products = $this->fetchTable('Parts')->find()->all();
        $quotes = $this->fetchTable('Quotes')->find()->where(['id' => $order->quote_id])->first();
        $this->set(compact('order', 'clientFetch', 'detailsquotes', 'money', 'products', 'quotes'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($quoteId = null, $clientId = null)
    {
        $quoteId = $this->request->getQuery('quoteId');
        $clientId = $this->request->getQuery('clientId');

        if ($clientId === '' || $quoteId === '') {
            throw new NotFoundException();
        }
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            // echo json_encode($order);
            // die;
            if ($this->Orders->save($order)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }
        $quotes = $this->Orders->Quotes->find()->where(['id' => $quoteId])->first();
        $users = $this->Orders->Users->find('list', ['limit' => 200])->where(['rol_id' => 3])->all();
        $detailsquotes = $this->fetchTable('Detailsquotes')->find('all')->where(['quote_id' => $quoteId])->all();
        $client = $this->fetchTable('Business')->find()->where(['id' => $clientId])->first();
        $products = $this->fetchTable('Parts')->find()->all();
        $money = $this->fetchTable('Monies')->find()->all();
        $this->set(compact('order', 'quotes', 'users', 'detailsquotes', 'client', 'products', 'money'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $order = $this->Orders->get($id);
    //     if ($this->Orders->delete($order)) {
    //         $this->Flash->success(__('The order has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The order could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }

    public function viewOrder($quoteid = null)
    {
        $this->autoRender = false;
        $quoteId = $this->request->getQuery('quoteId');

        $query = $this->Orders->find()->select(['id'])->where(['quote_id' => $quoteId])->first();

        if ($query) {
            echo json_encode($query);
            die;
        }
    }

    public function completedOrder($id = null)
    {
        $this->autoRender = false;

        $id = $this->request->getQuery('id');

        $query = $this->Orders->query()
            ->update()
            ->set(
                ['orderstatus_id' => 1]
            )
            ->where(
                ['id' => $id]
            )
            ->execute();
        
        if($query){
            echo json_encode('ok');
            die;
        }
    }

    public function canceledOrder($id = null)
    {
        $this->autoRender = false;

        $id = $this->request->getQuery('id');

        $query = $this->Orders->query()
            ->update()
            ->set(
                ['orderstatus_id' => 3]
            )
            ->where(
                ['id' => $id]
            )
            ->execute();
        
        if($query){
            echo json_encode('ok');
            die;
        }
    }

    public function getpdf($id = null) 
    {
        $this->viewBuilder()->enableAutoLayout(false);
        $order = $this->Orders->get($id);

        $data = $this->Orders->find()->select([
            'order_id', 
            'user_id' => 'Users.name',
            'client_id' => 'Business.name',
        ])->innerJoinWith('Business')->innerJoinWith('Users')
        ->where(['id' => $order->id]);

        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig', [
                'orientation' => 'letter',
                'download' => true,
                'filename' => 'Orden # '.$order->order_id. '.pdf',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
            );
            $this->set('order', $data);
    }
}
