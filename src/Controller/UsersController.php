<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenTime;
use Cake\Utility\Security;
use Cake\Event\EventInterface;
use Cake\Mailer\TransportFactory;
use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function forgotpass()
    {
        $this->Authorization->skipAuthorization();
        if($this->request->is('post')){
            $email = $this->request->getData('email');
            $thisToken = Security::hash(Security::randomBytes(25));

            $user = $this->Users->find('all')->where(['email' => $email])->first();
            $user->password = '';
            $user->token = $thisToken;
            
            if($this->Users->save($user)){
                $this->Flash->success('El link de reinicio de contraseña ha sido enviado al correo ('.$email.'),  Verifica tu bandeja de entrada o tu spam');

                $emailSet = new Mailer('default');
                $emailSet->setEmailFormat('html');
                $emailSet->setFrom('Ingenieria@alfastreet.co', 'Departamento de Sistemas');
                $emailSet->setSubject('Confirmar el reseteo de tu contraseña');
                $emailSet->setTo($email);
                $emailSet->deliver('Hola '.$email.'<br/> Por favor has click aqui para reiniciar tu contraseña: <br/><br/><br/><a href="localhost/users/resetpass/'.$thisToken.'">Reiniciar Contraseña</a>');
            }
        }
    }

    public function resetpass($token)
    {
        $this->Authorization->skipAuthorization();
        if($this->request->is('post')) {
            $pass = $this->request->getData('password');
            $hasher = new DefaultPasswordHasher();
            $passNew = $hasher->hash($pass);
            $user = $this->Users->find()->where(['token' => $token])->first();
            $user->password = $passNew;
            
            if($this->Users->save($user)) {
                $user->token = '';

                return $this->redirect(['action' => 'login']);
            }
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */



    public function index()
    {
        $query = $this->Users->find();
        $this->Authorization->authorize($query);
        $this->paginate = [
            'contain' => ['Rol'],
        ];
        $users = $this->paginate($this->Users);
        $rol = $this->fetchTable('Rol')->find('all')->all();
        $this->set(compact('users', 'rol'));
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
        $this->Authorization->authorize($user);
        $rol = $this->fetchTable('Rol')->find('all')->all();
        $this->set(compact('user', 'rol'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            $image = $this->request->getData('image');

            if ($image) {

                $time = FrozenTime::now()->toUnixString();

                $imageName = $time . "_" . $image->getClientFileName();

                $destiny = WWW_ROOT . "img/imgusers/" . $imageName;

                $image->moveTo($destiny);

                $user->image = $imageName;
            }

            $user->token = rand();
            $user->rol_id = 6;
            $user->checked = 1;


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
        $this->Authorization->authorize($user);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $oldImg = $user->image;

            $user = $this->Users->patchEntity($user, $this->request->getData());

            $imgRequest = $this->request->getData('image');

            $user->image = $oldImg;

            if ($imgRequest->getClientFileName()) {

                $destiny =   WWW_ROOT . "img/imgusers/" . $oldImg;

                if ($this->Users->delete($user)) {

                    if (file_exists($destiny)) {

                        unlink($destiny);
                    }

                    $time = FrozenTime::now()->toUnixString();

                    $imgName = $time . '_' . $imgRequest->getClientFileName();

                    $newDestiny = WWW_ROOT . "img/imgusers/" . $imgName;

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
        $user = $this->Users->get($id);
        $this->Authorization->authorize($user);
        $destiny =   WWW_ROOT . "img/imgusers/" . $user['image'];

        if ($this->Users->delete($user)) {

            if (file_exists($destiny)) {

                unlink($destiny);
            }

            (__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $redirect = $this->Authentication->getLoginRedirect() ?? '/home';
            return $this->redirect($redirect);
        }

        if ($this->request->is('post')) {
            $this->Flash->error('Credenciales Invalidas');
        }
    }

    public function logout()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'Login']);
        }
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated([
            'login', 'add', 'forgotpass', 'resetpass'
        ]);
    }

    public function data()
    {
        $this->Authorization->skipAuthorization();
        // Valores con PHP. Estos podrían venir de una base de datos o de cualquier lugar del servidor
        $etiquetas = ["Enero", "Febrero", "Marzo", "Abril"];
        $datosVentas = [5000, 1500, 8000, 5102];
        // Ahora las imprimimos como JSON para pasarlas a AJAX, pero las agrupamos
        $respuesta = [
            "etiquetas" => $etiquetas,
            "datos" => $datosVentas,
        ];
        echo json_encode($respuesta);
    }
}
