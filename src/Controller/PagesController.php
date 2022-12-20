<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Chronos\Chronos;
use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param string ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */
    public function display(string ...$path): ?Response
    {
        $this->Authorization->skipAuthorization();
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }

        $date = Chronos::parse('-1 Month');
        $totalParticipations = 0;
        $participacionesFacturadas = 0;

        // Query Cotizaciones
        $quotesTotal = $this->fetchTable('Quotes')->find()->count();
        $quotesAproved = $this->fetchTable('Quotes')->find()->select(['*'])->where(['estatus_id' => 1])->count();
        $quotesPending = $this->fetchTable('Quotes')->find()->select(['*'])->where(['estatus_id' => 2])->count();
        $quotesRechazed = $this->fetchTable('Quotes')->find()->select(['*'])->where(['estatus_id' => 3])->count();

        // Query Contadores
        $accountantsTotal = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => Chronos::parse('-1 month')->month])->count();
        $accountantsSum = $this->fetchTable('Totalaccountants')->find()->where(['month_id' => Chronos::parse('-1 month')->month])->all(); 

        //Query Ordenes de trabajo
        $orders = $this->fetchTable('Orders')->find()->count();
        $ordersComplete =  $this->fetchTable('Orders')->find()->where(['orderstatus_id' => 1 ])->count();
        $ordersPending =  $this->fetchTable('Orders')->find()->where(['orderstatus_id' => 2 ])->count();
        $ordersCanceled =  $this->fetchTable('Orders')->find()->where(['orderstatus_id' => 3 ])->count();

        //Tickets generados 
        $tickets = $this->fetchTable('Tikets')->find()->count();
        $ticketsApp = $this->fetchTable('Tikets')->find()->where(['status' => 'Completado'])->count();
        $ticketsPending = $this->fetchTable('Tikets')->find()->where(['status' => 'Pendiente'])->count();
        
        $dataParticipations = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => $date->month])->all();

        $datatwo = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => $date->month, 'estatus' => 'Liquidado'])->all();

        foreach($dataParticipations as $alfastreet){
            $totalParticipations += $alfastreet->totalLiquidation;
        }        

        foreach($datatwo as $alfas){
            $participacionesFacturadas += $alfas->totalLiquidation;
        }
        $this->set(compact('page', 'subpage', 'quotesTotal', 'quotesAproved', 'quotesPending', 'accountantsTotal', 'accountantsSum', 'quotesRechazed', 'orders', 'ordersComplete', 'ordersPending', 'ordersCanceled', 'tickets', 'ticketsPending', 'ticketsApp'));

        $this->set('totalParticipations', $totalParticipations);
        $this->set('Liquidadas', $participacionesFacturadas);

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}
