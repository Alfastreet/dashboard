<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenTime;

/**
 * Parts Controller
 *
 * @property \App\Model\Table\PartsTable $Parts
 * @method \App\Model\Entity\Part[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PartsController extends AppController
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
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Monies'],
        ];
        $parts = $this->paginate($this->Parts, ['limit' => 10000]);

        $this->set(compact('parts'));
    }

    /**
     * View method
     *
     * @param string|null $id Part id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $part = $this->Parts->get($id, [
            'contain' => ['Monies', 'Machinepart'],
        ]);

        $this->set(compact('part'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $part = $this->Parts->newEmptyEntity();
        if ($this->request->is('post')) {

            $part = $this->Parts->patchEntity($part, $this->request->getData());

            $image =  $this->request->getData('image');

            if ($image) {

                $time =  FrozenTime::now()->toUnixString();
                $nameImage = $time . "_" . $image->getClientFileName();
                $destiny = WWW_ROOT . "img/Parts/" . $nameImage;
                $image->moveTo($destiny);
                $part->image = $nameImage;
            }


            if ($this->Parts->save($part)) {
                // (__('The part has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The part could not be saved. Please, try again.'));
        }
        $monies = $this->Parts->Monies->find('list', ['limit' => 200])->all();
        $typeparts = $this->Parts->Typeproducts->find('list', ['limit' => 200])->all();
        $this->set(compact('part', 'monies', 'typeparts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Part id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $part = $this->Parts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $nameImageOld = $part->image;

            $part = $this->Parts->patchEntity($part, $this->request->getData());

            $image = $this->request->getData('image');

            $part->image = $nameImageOld;

            if ($image->getClientFileName()) {

                if (file_exists(WWW_ROOT . "img/Parts/" . $nameImageOld)) {

                    unlink(WWW_ROOT . "img/Parts/" . $nameImageOld);
                }

                $time =  FrozenTime::now()->toUnixString();
                $nameImage = $time . "_" . $image->getClientFileName();
                $destiny = WWW_ROOT . "img/Parts/" . $nameImage;
                $image->moveTo($destiny);
                $part->image = $nameImage;
            }

            if ($this->Parts->save($part)) {
                //  (__('The part has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The part could not be saved. Please, try again.'));
        }
        $monies = $this->Parts->Monies->find('list', ['limit' => 200])->all();
        $typeparts = $this->Parts->Typeproducts->find('list', ['limit' => 200])->all();
        $this->set(compact('part', 'monies', 'typeparts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Part id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $part = $this->Parts->get($id);

        if (file_exists(WWW_ROOT . "img/Parts/" . $part['image'])) {

            unlink(WWW_ROOT . "img/Parts/" . $part['image']);
        }

        if ($this->Parts->delete($part)) {
            //  (__('The part has been deleted.'));
        } else {
            $this->Flash->error(__('The part could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getPart()
    {

        if ($this->request->is('ajax')) {

            $serial_id = $this->request->getQuery('serial_id');

            $serial = $this->db->execute("SELECT * FROM parts WHERE serial = '" . $serial_id . "'")->fetchAll('assoc');

            echo json_encode($serial);
            die;
        }
    }

    public function searchpart($serial = null)
    {
        $this->autoRender = false;
        $serial = $this->request->getQuery('serial');

        $query = $this->Parts->find()->where(['serial' => $serial])->count();

        if ($query === 0) {
            echo json_encode('ok');
            die;
        }

        echo json_encode('error');
        die;
    }

    public function downproducts($idQuote = null)
    {
        $this->Authorization->skipAuthorization();
        $idQuote = $this->request->getQuery('quoteid');
        $products = $this->fetchTable('Detailsquotes')->find()->where(['quote_id' => $idQuote])->all();
        $nproducts = $this->fetchTable('Detailsquotes')->find()->where(['quote_id' => $idQuote])->count();
        $parts = $this->Parts->find()->all();
        $newCantidad = 0;

        foreach ($parts as $part) {
            foreach ($products as $product) {
                $newCantidad = $part->amount - $product->amount;
                $query = $this->Parts->query()->update()->set(['amount' => $newCantidad])->where(['id' => $product->product_id])->execute();
                if ($query) {
                    echo json_encode('ok');
                    die;
                }
                echo json_encode('error');
                die;
            }
        }
    }
}
