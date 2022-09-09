<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\I18n\FrozenTime;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */


    

    public function index()
    {
        $this->paginate = [
            'contain' => ['Rol'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Rol', 'Quotes'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            $image = $this->request->getData('image');

            if($image) {

                $time = FrozenTime::now()->toUnixString();

                $imageName = $time."_".$image->getClientFileName();

                $destiny = WWW_ROOT."img/imgusers/".$imageName;

                $image->moveTo($destiny);

                $user->image = $imageName;
            }


            if ($this->Users->save($user)) {
                 (__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $rol = $this->Users->Rol->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'rol'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $oldImg = $user->image;

            $user = $this->Users->patchEntity($user, $this->request->getData());

            $imgRequest = $this->request->getData('image');

            $user->image = $oldImg;

            if($imgRequest->getClientFileName()) {

                $destiny =   WWW_ROOT."img/imgusers/".$oldImg;     

                if ($this->Users->delete($user)) {

                    if(file_exists($destiny)){
                    
                        unlink($destiny);
                    }

                    $time = FrozenTime::now()->toUnixString();

                    $imgName = $time.'_'.$imgRequest->getClientFileName();

                    $newDestiny = WWW_ROOT."img/imgusers/".$imgName;
                    
                    $imgRequest->moveTo($newDestiny);

                    $user->image = $imgName;
                }
            }

            if ($this->Users->save($user)) {
                 (__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $rol = $this->Users->Rol->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'rol'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $destiny =   WWW_ROOT."img/imgusers/".$user['image'];     

        if ($this->Users->delete($user)) {

            if(file_exists($destiny)){
            
                unlink($destiny);
            }

             (__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function pdf($id = null)
    {
        $this->viewBuilder()->enableAutoLayout(false); 
        $report = $this->Users->get($id);
        $this->viewBuilder()->setClassName('CakePdf.Pdf');
        $this->viewBuilder()->setOption(
            'pdfConfig',
            [
                'orientation' => 'portrait',
                'download' => true, // This can be omitted if "filename" is specified.
                'filename' => 'Report_' . $id . '.pdf' //// This can be omitted if you want file name based on URL.
            ]
        );
        $this->set('report', $report);
    }

    // public function login() 
    // {
    //     $this->request->allowMethod(['get', 'post']);

    //     $result = $this->Authentication->getResult();

    //     if($result->isValid()) {
    //         $redirect = $this->request->getQuery('redirect', [
    //             'controller' => 'Users',
    //             'action' => 'index',
    //         ]);

    //         return $this->redirect($redirect);

    //     } 

    //     if($this->request->is('post') && !$result->isValid()) {
    //         $this->Flash->error('Credenciales Invalidas, por favor revisa de nuevo');
    //     }
    // }


    // public function logout()
    // {
    //     $result = $this->Authentication->getResult();
    //     if($result->isValid()){
    //         $this->Authentication->logout();
    //         return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    //     }
    // }

    // public function beforeFilter(EventInterface $event)
    // {
    //     parent::beforeFilter($event);
    //     $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    // }

}
