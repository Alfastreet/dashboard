<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\Event\EventInterface;

/**
 * Machines Controller
 *
 * @property \App\Model\Table\MachinesTable $Machines
 * @method \App\Model\Entity\Machine[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MachinesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $machines = $this->Machines->find()->select([
            'id',
            'idint',
            'serial',
            'name',
            'yearmodel',
            'warranty',
            'image',
            'height',
            'width',
            'display',
            'dateInstalling',
            'value'
        ])->select([
            'Casino.name'
        ])->select([
            'Model.name'
        ])->select([
            'Owner.name'
        ])->select([
            'Company.name'
        ])->select([
            'Contract.name'
        ])->select([
            'Maker.name'
        ])->join([
            'Casino' => [
                'table' => 'casinos',
                'type' => 'INNER',
                'conditions' => 'Casino.id = Machines.casino_id'
            ],
            'Model' => [
                'table' => 'model',
                'type' => 'INNER',
                'conditions' => 'Model.id = Machines.model_id'
            ],
            'Owner' => [
                'table' => 'owner',
                'type' => 'INNER',
                'conditions' => 'Owner.id = Machines.owner_id'
            ],
            'Company' => [
                'table' => 'company',
                'type' => 'INNER',
                'conditions' => 'Company.id = Machines.company_id'
            ],
            'Contract' => [
                'table' => 'contract',
                'type' => 'INNER',
                'conditions' => 'Contract.id = Machines.contract_id'
            ],
            'Maker' => [
                'table' => 'maker',
                'type' => 'INNER',
                'conditions' => 'Maker.id = Machines.maker_id'
            ]
        ])->all();


        $this->set(compact('machines'));
    }

    /**
     * View method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $machine = $this->Machines->get($id, [
            'contain' => ['Model', 'Maker', 'Casinos', 'Owner', 'Company', 'Contract'],
        ]);

        $this->set(compact('machine'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // $casinoId = $this->request->getQuery('casinoid');
        $this->Authorization->skipAuthorization();
        $machine = $this->Machines->newEmptyEntity();
        if ($this->request->is('post')) {
            $machine = $this->Machines->patchEntity($machine, $this->request->getData());
            // Add image
            $image = $this->request->getData('image');


            if ($image) {
                $time =  FrozenTime::now()->toUnixString();
                $nameImage = $time . "_" . $image->getClientFileName();
                $destiny = WWW_ROOT . "img/Machines/" . $nameImage;
                $image->moveTo($destiny);
                $machine->image = $nameImage;
            }

            if ($this->Machines->save($machine)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }
        $models = $this->Machines->Model->find('list', ['limit' => 200])->all();
        $makers = $this->Machines->Maker->find('list', ['limit' => 200])->all();
        $casinos = $this->Machines->Casinos->find('list', ['limit' => 200])->all();
        $owners = $this->Machines->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Machines->Company->find('list', ['limit' => 200])->all();
        $contracts = $this->Machines->Contract->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => 200
        ])->all();
        $this->set(compact('machine', 'models', 'makers', 'casinos', 'owners', 'companies', 'contracts'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $machine = $this->Machines->get(
            $id,
            [
                'contain' => ['Model', 'Maker', 'Casinos', 'Owner', 'Company', 'Contract'],
            ]
        );
        if ($this->request->is('post')) {
            $machine = $this->Machines->patchEntity($machine, $this->request->getData());
            // Add image
            $machine->cheked = 1;
            $image = $this->request->getData('image');
            $idint = $machine->idint;
            $serial = $machine->serial;
            $queryidInt = $this->Machines->find('all')->where(['idint' => $idint])->all();
            $queryserial = $this->Machines->find('all')->where(['serial' => $serial])->all();

            if (sizeof($queryserial) === 0) {

                if ($image) {

                    $time =  FrozenTime::now()->toUnixString();
                    $nameImage = $time . "_" . $image->getClientFileName();
                    $destiny = WWW_ROOT . "img/Machines/" . $nameImage;
                    $image->moveTo($destiny);
                    $machine->image = $nameImage;
                }
                if ($this->Machines->save($machine)) {
                    (__('The machine has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Hubo un error al procesar los Datos'));
            }
            $this->Flash->error(__('La maquina Ya esta registrada'));
        }
        $models = $this->Machines->Model->find('list', ['limit' => 200])->all();
        $makers = $this->Machines->Maker->find('list', ['limit' => 200])->all();
        $casinos = $this->Machines->Casinos->find('list', ['limit' => 200])->all();
        $owners = $this->Machines->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Machines->Company->find('list', ['limit' => 200])->all();
        $contracts = $this->Machines->Contract->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => 200
        ])->all();
        $this->set(compact('machine', 'models', 'makers', 'casinos', 'owners', 'companies', 'contracts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $machine = $this->Machines->get($id);
        $this->Authorization->authorize($machine);
        // Delete file

        if (file_exists(WWW_ROOT . "img/Machines/" . $machine['image'])) {

            unlink(WWW_ROOT . "img/Machines/" . $machine['image']);
        }
        if ($this->Machines->delete($machine)) {
            (__('The machine has been deleted.'));
        } else {
            $this->Flash->error(__('The machine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search($serial = null)
    {
        $this->autoRender = false;
        $serial = $this->request->getQuery('serial');

        $query = $this->Machines->find()->select(['id'])->where(['serial' => $serial])->first();

        echo json_encode($query);
        die;
    }

    public function searchIdInt($idint = null)
    {
        $this->Authorization->skipAuthorization();
        $this->autoRender = false;

        $idint = $this->request->getQuery('idint');

        $query = $this->Machines->find('all')->where(['idint' => $idint])->all();

        if (sizeof($query) > 0) {
            echo json_encode('error');
            die;
        }
    }

    public function searchSerial($serial = null)
    {
        $this->autoRender = false;

        $serial = $this->request->getQuery('serial');

        $query = $this->Machines->find('all')->where(['serial' => $serial])->all();

        if (sizeof($query) > 0) {
            echo json_encode('error');
            die;
        }
    }

    public function searchId($id = null)
    {
        $this->autoRender = false;

        $id = $this->request->getQuery('id');

        $query = $this->Machines->find()->where(['id' => $id])->first();

        if ($query) {
            echo json_encode($query);
            die;
        }
    }

    public function participations($casinoid = null) {
        $casinoid =  $this->request->getQuery('casinoid');

        if($casinoid === '' || $casinoid === null || $casinoid === 0){
            echo json_encode('error');
            die;
        }

        $machines = $this->Machines->find()->where(['casino_id' => $casinoid, 'contract_id' => 2])->all();

        echo json_encode($machines);
        die;
    }

    public function beforeFilter(EventInterface $event)
    {

        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated([
            'search'
        ]);
    }
}
