<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\FrozenTime;

/**
 * Casinos Controller
 *
 * @property \App\Model\Table\CasinosTable $Casinos
 * @method \App\Model\Entity\Casino[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CasinosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['City', 'State', 'Owner', 'Company'],
        ];
        $casinos = $this->paginate($this->Casinos);

        $this->set(compact('casinos'));
    }

    /**
     * View method
     *
     * @param string|null $id Casino id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $casino = $this->Casinos->get($id, [
            'contain' => ['City', 'State', 'Owner', 'Company', 'Clientscasinos', 'Machines'],
        ]);

        $this->set(compact('casino'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $casino = $this->Casinos->newEmptyEntity();

        if ($this->request->is('post')) {

            $casino = $this->Casinos->patchEntity($casino, $this->request->getData());

            // Add image

            $image = $this->request->getData('image');

            if($image) {

                $time =  FrozenTime::now()->toUnixString();
                $nameImage = $time. "_" . $image->getClientFileName();
                $destiny = WWW_ROOT."img/Casinos/".$nameImage;
                $image->moveTo($destiny);
                $casino->image = $nameImage;

            }


            if ($this->Casinos->save($casino)) {
                $this->Flash->success(__('The casino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The casino could not be saved. Please, try again.'));
        }
        $cities = $this->Casinos->City->find('list', ['limit' => 200])->all();
        $states = $this->Casinos->State->find('list', ['limit' => 200])->all();
        $owners = $this->Casinos->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Casinos->Company->find('list', ['limit' => 200])->all();
        $this->set(compact('casino', 'cities', 'states', 'owners', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Casino id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $casino = $this->Casinos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $nameImageOld = $casino->image;
            
            $casino = $this->Casinos->patchEntity($casino, $this->request->getData());

            $image = $this->request->getData('image');

            $casino->image = $nameImageOld;

            if($image->getClientFileName()) {

                if(file_exists(WWW_ROOT."img/Casinos/".$nameImageOld)){

                    unlink(WWW_ROOT."img/Casinos/".$nameImageOld);
        
                }

                $time =  FrozenTime::now()->toUnixString();
                $nameImage = $time. "_" . $image->getClientFileName();
                $destiny = WWW_ROOT."img/Casinos/".$nameImage;
                $image->moveTo($destiny);
                $casino->image = $nameImage;                

            }

            if ($this->Casinos->save($casino)) {
                $this->Flash->success(__('The casino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The casino could not be saved. Please, try again.'));
        }
        $cities = $this->Casinos->City->find('list', ['limit' => 200])->all();
        $states = $this->Casinos->State->find('list', ['limit' => 200])->all();
        $owners = $this->Casinos->Owner->find('list', ['limit' => 200])->all();
        $companies = $this->Casinos->Company->find('list', ['limit' => 200])->all();
        $this->set(compact('casino', 'cities', 'states', 'owners', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Casino id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $casino = $this->Casinos->get($id);

        // Delete file

        if(file_exists(WWW_ROOT."img/Casinos/".$casino['image'])){

            unlink(WWW_ROOT."img/Casinos/".$casino['image']);

        }

        if ($this->Casinos->delete($casino)) {
            $this->Flash->success(__('The casino has been deleted.'));
        } else {
            $this->Flash->error(__('The casino could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
