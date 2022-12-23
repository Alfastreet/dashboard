<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Chronos\Chronos;
use Cake\ORM\Query;
use Cake\Event\EventInterface;
use Cake\Database\Expression\QueryExpression;
use Cake\Mailer\Mailer;

/**
 * Tikets Controller
 *
 * @property \App\Model\Table\TiketsTable $Tikets
 * @method \App\Model\Entity\Tiket[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TiketsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $tikets = $this->paginate($this->Tikets, [
            'contain' => [
                'Supports'
            ],
            'limit' => 100000,
            'maxLimit' => 100000
        ]);

        $this->set(compact('tikets'));
    }
    public function pending()
    {
        $this->Authorization->skipAuthorization();
        $tikets = $this->paginate($this->Tikets->find()->where(['status' => 'Pendiente']), [
            'contain' => [
                'Supports',
            ],
            'limit' => 100000,
            'maxLimit' => 100000,
        ]);

        $this->set(compact('tikets'));
    }

    /**
     * View method
     *
     * @param string|null $id Tiket id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tiket = $this->Tikets->get($id, [
            'contain' => ['Machines'],
        ]);

        $this->set(compact('tiket'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $tiket = $this->Tikets->newEmptyEntity();
        $date = Chronos::now('America/Bogota');
        if ($this->request->is('post')) {
            $tiket = $this->Tikets->patchEntity($tiket, $this->request->getData());
            $tiket->datecreate = $date;
            $tiket->status = 'Pendiente';
            $tiket->resolved = 0;

            $to = '';
            $nameTo = '';
            $addTo = '';
            $nameaddTo = '';

            switch ($tiket->support_id) {
                case 1:
                    $to = 'soporte1@alfastreet.co';
                    $nameTo = 'Soporte Tecnico Alfastreet';
                    $addTo = 'soporte@alfastreet.co';
                    $nameaddTo = 'Soporte Tecnico Alfastreet Aruze';
                    break;
                case 4:
                    $to = 'isela.sanchez@alfastreet.co';
                    $nameTo = 'Isela Sanchez';
                    $addTo = 'aux.administrativo@alfastreet.co';
                    $nameaddTo = 'Denny Bobadilla';
                default:
                    $to = 'isela.sanchez@alfastreet.co';
                    $nameTo = 'Isela Sanchez';
                    $addTo = 'jairo.blanco@alfastreet.co';
                    $nameaddTo = 'Jairo Blanco';
                    break;
            }

            $email = new Mailer('default');
            $from = $tiket->email;
            $nameFrom = $tiket->name_client;
            $message = 'Buen dia '. $tiket->name_client . '\n El ticket fue enviado satisfactoriamente, en las proximas horas nuestro equipo se comunicara contigo para resolver tu inquietud \n El resumen del tiquet es el siguiente: \n'. $tiket->comments;

            if ($this->Tikets->save($tiket)) {
                $email->setFrom([$from => $nameFrom])
                    ->setTo($to, $nameTo)
                    ->addTo($addTo, $nameaddTo)
                    ->addCc('gerentedeproducto@alfastreet.co', 'Gerente de Producto Andres Lozano')
                    ->setSubject('Ticket de Servico Alfastreet')
                    ->deliver($message);
                echo json_encode('ok');
                die;
            }
            echo json_encode('error');
            die;
        }
        $machines = $this->Tikets->Machines->find('list', ['limit' => 200])->all();
        $support = $this->Tikets->Supports->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => 200,
        ])->all();
        $this->set(compact('tiket', 'machines', 'support'));
    }

    public function updatetiket($resolved =  null, $id = null, $userid = null)
    {
        $date = Chronos::now('America/Bogota');
        $this->autoRender = false;
        $id = $this->request->getQuery('id');
        $tikets = $this->getTableLocator()->get('Tikets');
        $resolved = $this->request->getQuery('resolved');
        $userid = $this->request->getQuery('userid');
        $dateresolved = $date;

        $query = $tikets->query()->update()->set(['resolved' => $resolved, 'status' => 'Completado', 'user_id' => $userid, 'dateresolved' => $dateresolved])->where(['id' => $id])->execute();

        if ($query) {
            echo json_encode('ok');
            die;
        }

        echo json_encode('error');
        die;
    }

    public function beforeFilter(EventInterface $event)
    {

        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated([
            'add'
        ]);
    }
}



                // $emailTo = $this->request->getData('email');

                // $email = new Mailer('default');
                // $email->setEmailFormat('both');
                // $email->setFrom('servicioalcliente@alfastreet.co', 'Servicio al Cliente y Mesa de ayuda Alfastreet Colombia');
                // $email->setSubject('Creacion de Ticket');
                // $email->setTo($emailTo);
                // $email->deliver('Se ha generado el Ticket de Servicio #'.$tiket->id.' En maximo 24 Horas su solicitud sera atendida');