<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Totalaccountants Controller
 *
 * @property \App\Model\Table\TotalaccountantsTable $Totalaccountants
 * @method \App\Model\Entity\Totalaccountant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TotalaccountantsController extends AppController
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
        $totalaccountants = $this->paginate($this->Totalaccountants);

        $this->set(compact('totalaccountants'));
    }

    /**
     * View method
     *
     * @param string|null $id Totalaccountant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $totalaccountant = $this->Totalaccountants->get($id, [
            'contain' => ['Casinos', 'Machines', 'Months'],
        ]);

        $this->set(compact('totalaccountant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $totalaccountant = $this->Totalaccountants->newEmptyEntity();
        if ($this->request->is('post')) {
            $totalaccountant = $this->Totalaccountants->patchEntity($totalaccountant, $this->request->getData());
            $totalaccountant->month_id = date('m', strtotime(date('d-m-Y')."- 1 month"));
            $totalaccountant->year = date('Y');
            if ($this->Totalaccountants->save($totalaccountant)) {
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }
        $casinos = $this->Totalaccountants->Casinos->find('list', ['limit' => 200])->all();
        $months = $this->Totalaccountants->Month->find('list', ['limit' => 200])->all();
        $this->set(compact('totalaccountant', 'casinos', 'months'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Totalaccountant id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $totalaccountant = $this->Totalaccountants->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $totalaccountant = $this->Totalaccountants->patchEntity($totalaccountant, $this->request->getData());
            if ($this->Totalaccountants->save($totalaccountant)) {
                $this->Flash->success(__('The totalaccountant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The totalaccountant could not be saved. Please, try again.'));
        }
        $casinos = $this->Totalaccountants->Casinos->find('list', ['limit' => 200])->all();
        $machines = $this->Totalaccountants->Machines->find('list', ['limit' => 200])->all();
        $months = $this->Totalaccountants->Months->find('list', ['limit' => 200])->all();
        $this->set(compact('totalaccountant', 'casinos', 'machines', 'months'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Totalaccountant id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $totalaccountant = $this->Totalaccountants->get($id);
        if ($this->Totalaccountants->delete($totalaccountant)) {
            $this->Flash->success(__('The totalaccountant has been deleted.'));
        } else {
            $this->Flash->error(__('The totalaccountant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
