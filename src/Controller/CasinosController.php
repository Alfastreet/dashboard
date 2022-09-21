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
            'contain' => ['City', 'State', 'Owner', 'Business'],
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
    public function view($id = null, $token = null)
    {

        $token = $_GET['token'];
        
        $casino = $this->Casinos->get($id, [
            'contain' => ['City', 'State', 'Owner', 'Business', 'Clientscasinos', 'Machines'],
        ]);
        

        if($token !== $casino->token){
            return $this->redirect(['action' => 'error']);
        }


        $machines = $this->fetchTable('Machines')->find('all')->where(['contract_id' => 2, 'casino_id' => $id])->all();
        $accountants = $this->fetchTable('Accountants')->find('all')->where(['casino_id' => $id, 'month_id' => date('m', strtotime(date('d-m-Y')."- 1 month"))])->all();   
        $lastaccountants = $this->fetchTable('Accountants')->find('all')->where(['casino_id' => $id, 'month_id' => date('m', strtotime(date('d-m-Y')."- 2 month"))])->all();
        
        
        $this->set(compact('casino', 'accountants', 'machines', 'lastaccountants'));
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

            $casino->token = uniqid();


            if ($this->Casinos->save($casino)) {
                 (__('The casino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The casino could not be saved. Please, try again.'));
        }
        $cities = $this->Casinos->City->find('list', ['limit' => 200])->all();
        $states = $this->Casinos->State->find('list', ['limit' => 200])->all();
        $owners = $this->Casinos->Owner->find('list', ['limit' => 200])->all();
        $business = $this->Casinos->Business->find('list', ['limit' => 200])->all();

        
        

        $this->set(compact('casino', 'cities', 'states', 'owners', 'business'));
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

            $casino->token = uniqid();

            if ($this->Casinos->save($casino)) {
                 (__('The casino has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The casino could not be saved. Please, try again.'));
        }
        $cities = $this->Casinos->City->find('list', ['limit' => 200])->all();
        $states = $this->Casinos->State->find('list', ['limit' => 200])->all();
        $owners = $this->Casinos->Owner->find('list', ['limit' => 200])->all();
        $business = $this->Casinos->Business->find('list', ['limit' => 200])->all();
        $clients = $this->fetchTable('client')->find('all')->all();

        $casino = $this->Casinos->get($id, [
            'contain' => ['City', 'State', 'Owner', 'Business', 'Clientscasinos', 'Machines',],
        ]);
        $this->set(compact('casino', 'cities', 'states', 'owners', 'business', 'clients'));


        
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
             (__('The casino has been deleted.'));
        } else {
            $this->Flash->error(__('The casino could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function error() {
        
    }

    public function thanks() {
        
    }

    public function getpdf($id = null) {

        $id = $_GET['id'];

        $this->viewBuilder()->enableAutoLayout(false); 
        $casino = $this->Casinos->get($id);
        $machines = $this->fetchTable('Machines')->find('all')->where(['contract_id' => 2, 'casino_id' => $id])->all();
        $accountants = $this->fetchTable('Accountants')->find('all')->where(['casino_id' => $id, 'month_id' => date('m', strtotime(date('d-m-Y')."- 1 month"))])->all();   
        $lastaccountants = $this->fetchTable('Accountants')->find('all')->where(['casino_id' => $id, 'month_id' => date('m', strtotime(date('d-m-Y')."- 2 month"))])->all();

        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'portrait',
                'pageSize' => 'A3',
                'download' => true, // This can be omitted if "filename" is specified.
                'filename' => '0' . $id . '.pdf', //// This can be omitted if you want file name based on URL.
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true
            ]
        );

        $this->set(compact('accountants', 'lastaccountants', 'machines', 'casino'));
    }

    
}
