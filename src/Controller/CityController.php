<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * City Controller
 *
 * @property \App\Model\Table\CityTable $City
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CityController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['State'],
        ];
        $city = $this->paginate($this->City);

        $this->set(compact('city'));
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $city = $this->City->get($id, [
            'contain' => ['State', 'Casinos'],
        ]);

        $this->set(compact('city'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $city = $this->City->newEmptyEntity();
        if ($this->request->is('post')) {
            $city = $this->City->patchEntity($city, $this->request->getData());
            if ($this->City->save($city)) {
                 (__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $states = $this->City->State->find('list', ['limit' => 200])->all();
        $this->set(compact('city', 'states'));
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->City->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->City->patchEntity($city, $this->request->getData());
            if ($this->City->save($city)) {
                 (__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $states = $this->City->State->find('list', ['limit' => 200])->all();
        $this->set(compact('city', 'states'));
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->City->get($id);
        if ($this->City->delete($city)) {
             (__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
