<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Totalerases Controller
 *
 * @property \App\Model\Table\TotalerasesTable $Totalerases
 * @method \App\Model\Entity\Totalerase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TotalerasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Casinos', 'Month'],
        ];
        $totalerases = $this->paginate($this->Totalerases);

        $this->set(compact('totalerases'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->autoRender = false; 
        $totalerase = $this->Totalerases->newEmptyEntity();
        if ($this->request->is('post')) {
            $totalerase = $this->Totalerases->patchEntity($totalerase, $this->request->getData());
            $totalerase->month_id = date('m', strtotime(date('d-m-Y') . "- 1 month"));
            $totalerase->year = date('Y');
            
            if ($this->Totalerases->save($totalerase)) {    
                echo json_encode('ok');
                die;
            }
        }
    }
}
