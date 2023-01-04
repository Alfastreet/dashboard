<?php

declare(strict_types=1);

namespace App\Controller;

use Exception;
use Cake\ORM\Query;
use GuzzleHttp\Client;
use Cake\Mailer\Mailer;
use Cake\Chronos\Chronos;
use Cake\Event\EventInterface;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;
use Cake\Database\Expression\QueryExpression;
use SendinBlue\Client\Api\TransactionalEmailsApi;

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

        // Configuracion SendinBlue para templates de correo electronico
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

        $instance = new TransactionalEmailsApi(
            new Client(),
            $config
        );

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

            if ($this->Tikets->save($tiket)) {

                $sendSmtpEmail = new SendSmtpEmail([
                    'subject' => 'Tickets servicio Alfastreet',
                    'sender' => ['name' => 'Info Alfastreet Colombia S.A.S', 'email' => 'info@alfastreet.co'],
                    'to' => [['name' => $tiket->name_client, 'email' => $tiket->email]],
                    // 'cc' => [
                    //     ['name' => $nameTo, 'email' => $to ],
                    //     ['name' => $nameaddTo, 'email' => $addTo],
                    //     ['name' => 'Andres Lozano', 'email' => 'gerentedeproducto@alfastreet.co'],
                    // ],
                    'templateId' => 2,
                    'params' => [
                        'date' => $date->toFormattedDateString(),
                        'name' => $tiket->name_client,
                        'description' => $tiket->comments,
                        'phone' => $tiket->phone 
                    ]
                ]);

                try {
                    $result = $instance->sendTransacEmail($sendSmtpEmail);
                    echo json_encode('ok');
                    die;
                } catch (Exception $e) {
                    echo $e->getMessage(),PHP_EOL;
                    echo json_encode('error');
                    die;
                }
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
