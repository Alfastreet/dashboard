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
        $eneroTotal = 0; 
        $eneroTotalLiquidado = 0; 
        $febreroTotal = 0;
        $febreroTotalLiquidado = 0; 
        $marzoTotal = 0;
        $marzoTotalLiquidado = 0; 
        $abrilTotal = 0;
        $abrilTotalLiquidado = 0; 
        $mayoTotal = 0;
        $mayoTotalLiquidado = 0; 
        $junioTotal = 0;
        $junioTotalLiquidado = 0; 
        $julioTotal = 0;
        $julioTotalLiquidado = 0; 
        $agostoTotal = 0;
        $agostoTotalLiquidado = 0; 
        $septiembreTotal = 0;
        $septiembreTotalLiquidado = 0; 
        $octubreTotal = 0;
        $octubreTotalLiquidado = 0; 
        $noviembreTotal = 0;
        $noviembreTotalLiquidado = 0; 
        $diciembreTotal = 0;
        $diciembreTotalLiquidado = 0; 

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
        $ordersComplete =  $this->fetchTable('Orders')->find()->where(['orderstatus_id' => 1])->count();
        $ordersPending =  $this->fetchTable('Orders')->find()->where(['orderstatus_id' => 2])->count();
        $ordersCanceled =  $this->fetchTable('Orders')->find()->where(['orderstatus_id' => 3])->count();

        //Tickets generados 
        $tickets = $this->fetchTable('Tikets')->find()->count();
        $ticketsApp = $this->fetchTable('Tikets')->find()->where(['status' => 'Completado'])->count();
        $ticketsPending = $this->fetchTable('Tikets')->find()->where(['status' => 'Pendiente'])->count();



        // Liquidaciones mes a mes vs Ingresado mes a mes
        $enero = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(1)->month, 'year' => Chronos::now()->year])->all();

        foreach($enero as $e) {
            $eneroTotal += $e->totalLiquidation;
        }

        $febrero = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(2)->month, 'year' => Chronos::now()->year])->all();

        foreach($febrero as $f) {
            $febreroTotal += $f->totalLiquidation;
        }

        $marzo = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(3)->month, 'year' => Chronos::now()->year])->all();

        foreach($marzo as $m) {
            $marzoTotal += $m->totalLiquidation;
        }

        $abril = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(4)->month, 'year' => Chronos::now()->year])->all();

        foreach($abril as $a) {
            $abrilTotal += $a->totalLiquidation;
        }

        $mayo = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(5)->month, 'year' => Chronos::now()->year])->all();

        foreach($mayo as $ma) {
            $mayoTotal += $ma->totalLiquidation;
        }

        $junio = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(6)->month, 'year' => Chronos::now()->year])->all();

        foreach($junio as $ju) {
            $junioTotal += $ju->totalLiquidation;
        }

        $julio = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(7)->month, 'year' => Chronos::now()->year])->all();

        foreach($julio as $jl) {
            $julioTotal += $jl->totalLiquidation;
        }

        $agosto = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(8)->month, 'year' => Chronos::now()->year])->all();

        foreach($agosto as $ag) {
            $agostoTotal += $ag->totalLiquidation;
        }

        $septiembre = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(9)->month, 'year' => Chronos::now()->year])->all();

        foreach($septiembre as $se) {
            $septiembreTotal += $se->totalLiquidation;
        }

        $octubre = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(10)->month, 'year' => Chronos::now()->year])->all();

        foreach($octubre as $oc) {
            $octubreTotal += $oc->totalLiquidation;
        }

        $noviembre = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(11)->month, 'year' => Chronos::now()->year])->all();

        foreach($noviembre as $no) {
            $noviembreTotal += $no->totalLiquidation;
        }

        $diciembre = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(12)->month, 'year' => Chronos::now()->year])->all();

        foreach($diciembre as $no) {
            $diciembreTotal += $no->totalLiquidation;
        }

        //Datos Liquidados

        $eneroLiquidado = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(1)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($eneroLiquidado as $en) {
            $eneroTotalLiquidado += $en->totalLiquidation;
        }

        $febreroLiquidado = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(2)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($febreroLiquidado as $fe) {
            $febreroTotalLiquidado += $fe->totalLiquidation;
        }

        $marzoLiquidado = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(3)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($marzoLiquidado as $mar) {
            $marzoTotalLiquidado += $mar->totalLiquidation;
        }

        $abrilLiquidado = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(4)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($abrilLiquidado as $abr) {
            $abrilTotalLiquidado += $abr->totalLiquidation;
        }

        $mayoLiquidado = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(5)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($mayoLiquidado as $may) {
            $mayoTotalLiquidado += $may->totalLiquidation;
        }

        $junioLiquidado = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(6)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($junioLiquidado as $jun) {
            $junioTotalLiquidado += $jun->totalLiquidation;
        }

        $julioLiquidado = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(7)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($julioLiquidado as $jul) {
            $julioTotalLiquidado += $jul->totalLiquidation;
        }

        $agostoLiquidacion = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(8)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($agostoLiquidacion as $ago) {
            $agostoTotalLiquidado += $ago->totalLiquidation;
        }

        $septiembreLiquidacion = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(9)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($septiembreLiquidacion as $sep) {
            $septiembreTotalLiquidado += $sep->totalLiquidation;
        }

        $octubreLiquidacion = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(10)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($octubreLiquidacion as $oct) {
            $octubreTotalLiquidado += $oct->totalLiquidation;
        }

        $noviembreLiquidacion = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(11)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($noviembreLiquidacion as $nov) {
            $noviembreTotalLiquidado += $nov->totalLiquidation;
        }

        $diciembreLiquidacion = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => Chronos::create()->month(12)->month, 'estatus' => 'Liquidado', 'year' => Chronos::now()->year])->all();

        foreach($diciembreLiquidacion as $dic) {
            $diciembreTotalLiquidado += $dic->totalLiquidation;
        }

        // Datos de Participaciones

        $dataParticipations = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => $date->month])->all();

        foreach ($dataParticipations as $alfastreet) {
            $totalParticipations += $alfastreet->totalLiquidation;
        }

        $datatwo = $this->fetchTable('Totalaccountants')->find()->select(['totalLiquidation'])->where(['month_id' => $date->month, 'estatus' => 'Liquidado'])->all();

        foreach ($datatwo as $alfas) {
            $participacionesFacturadas += $alfas->totalLiquidation;
        }
        $this->set(compact('page', 'subpage', 'quotesTotal', 'quotesAproved', 'quotesPending', 'accountantsTotal', 'accountantsSum', 'quotesRechazed', 'orders', 'ordersComplete', 'ordersPending', 'ordersCanceled', 'tickets', 'ticketsPending', 'ticketsApp'));

        $this->set('totalParticipations', $totalParticipations);
        $this->set('Liquidadas', $participacionesFacturadas);

        $this->set('Enero', $eneroTotal);
        $this->set('EneroLiquidado', $eneroTotalLiquidado);
        $this->set('Febrero', $febreroTotal);
        $this->set('FebreroLiquidado', $febreroTotalLiquidado);
        $this->set('Marzo', $marzoTotal);
        $this->set('MarzoLiquidado', $marzoTotalLiquidado);
        $this->set('Abril', $abrilTotal);
        $this->set('AbrilLiquidado', $abrilTotalLiquidado);
        $this->set('Mayo', $mayoTotal);
        $this->set('MayoLiquidado', $mayoTotalLiquidado);
        $this->set('Junio', $junioTotal);
        $this->set('JunioLiquidado', $junioTotalLiquidado);
        $this->set('Julio', $julioTotal);
        $this->set('JulioLiquidado', $julioTotalLiquidado);
        $this->set('Agosto', $agostoTotal);
        $this->set('AgostoLiquidado', $agostoTotalLiquidado);
        $this->set('Septiembre', $septiembreTotal);
        $this->set('SeptiembreLiquidado', $septiembreTotalLiquidado);
        $this->set('Octubre', $octubreTotal);
        $this->set('OctubreLiquidado', $octubreTotalLiquidado);
        $this->set('Noviembre', $noviembreTotal);
        $this->set('NoviembreLiquidado', $noviembreTotalLiquidado);
        $this->set('Diciembre', $diciembreTotal);
        $this->set('DiciembreLiquidado', $diciembreTotalLiquidado);

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
