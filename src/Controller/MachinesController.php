<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;

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
        $this->paginate = [
            'contain' => ['Model', 'Maker', 'Casinos', 'Owner', 'Company', 'Contract'],
        ];
        $machines = $this->paginate($this->Machines, ['limit' => 10000]);

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
        $machine = $this->Machines->get($id, [
            'contain' => ['Model', 'Maker', 'Casinos', 'Owner', 'Company', 'Contract', 'Machinepart'],
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
        $machine = $this->Machines->newEmptyEntity();
        if ($this->request->is('post')) {
            $machine = $this->Machines->patchEntity($machine, $this->request->getData());
            // Add image


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
        $contracts = $this->Machines->Contract->find('list', ['limit' => 200])->all();
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
        $machine = $this->Machines->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machine = $this->Machines->patchEntity($machine, $this->request->getData());

            $nameImageOld = $machine->image;

            $image = $this->request->getData('image');

            $machine->image = $nameImageOld;

            if ($image->getClientFileName()) {

                if (file_exists(WWW_ROOT . "img/Casinos/" . $nameImageOld)) {

                    unlink(WWW_ROOT . "img/Casinos/" . $nameImageOld);
                }

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
            $this->Flash->error(__('The machine could not be saved. Please, try again.'));
        }
        $models = $this->Machines->Model->find('list', ['limit' => 200])->all();
        $makers = $this->Machines->Maker->find('list', ['limit' => 200])->all();
        $casinos = $this->Machines->Casinos->find('list', ['limit' => 200])->all();
        $owners = $this->Machines->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Machines->Company->find('list', ['limit' => 200])->all();
        $contracts = $this->Machines->Contract->find('list', ['limit' => 200])->all();
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

    public function searchIdInt($idint = null)
    {
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

    // public function searchMachines($casinoId = null) 
    // {
    //     $this->autoRender = false;
    //     $casinoId = $this->request->getQuery('casinoId');

    //     $query = $this->Machines->find('all')->where((['casino_id' => $casinoId, 'contract_id' => 2 ]))->all();

    //     if(sizeof($query) > 0){
    //         echo json_encode($query);
    //         die;
    //     }
    // }
}
