<?php

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
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

use Cake\Cache\Cache;
use Cake\Chronos\Chronos;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

//$this->disableAutoLayout();


if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$date = Chronos::parse('-1 Month');

$arrayDate = explode(' ', $date->toFormattedDateString());

$percentAproved = 0;
$percentPending = 0;
$percentRechazed = 0;
$ordersApp = 0;
$ordersP = 0;
$ordersCan = 0;
$percentTickets = 0;
$percentTicketsApp = 0;
$totalAccountants = 0;
$percentParticipationsLiquidated = 0;
$percentParticipationsPending = 0;
$totalPending = 0;

foreach ($accountantsSum as $total) {
    $totalAccountants += $total->totalLiquidation;
}

if ($totalParticipations !== 0) {
    $percentParticipationsLiquidated = round(($Liquidadas * 100) / $totalParticipations);
    $percentParticipationsPending = round(100 - $percentParticipationsLiquidated);
    $totalPending = $totalParticipations - $Liquidadas;
}

if ($quotesTotal !== 0) {

    $percentAproved = round($quotesAproved / $quotesTotal  * 100);
    $percentPending = round($quotesPending / $quotesTotal  * 100);
    $percentRechazed = round($quotesRechazed / $quotesTotal  * 100);
}

if ($orders !== 0) {
    $ordersApp = round($ordersComplete / $orders * 100);
    $ordersP = round($ordersPending / $orders * 100);
    $ordersCan = round($ordersCanceled / $orders * 100);
}

if ($tickets !== 0) {
    $percentTickets = round($ticketsPending / $tickets * 100);
    $percentTicketsApp = round($ticketsApp / $tickets * 100);
}

$this->Breadcrumbs->add(
    'Inicio'
);

?>


<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js') ?>

<h1 class="text-center mb-4"><?= __('Bienvenido ') . $user_init->name . " " . $user_init->lastName ?></h1>

<div class="row">
    <?php if ($isAdmin) : ?>
        <!-- Col cotizaciones -->
        <div class="col-sm-6 col-lg-6">
            <div class="card mb-4 text-white bg-primary">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fw-bold"><?= __('Cotizaciones Totales') ?></div>
                        <div class="fs-4 fw-semibold">
                            <?= __($quotesTotal) ?>
                            <span class="fs-6 fw-normal"> <?= __('(100%)') ?></span>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="/quotes">Ver todas las Cotizaciones</a>
                            <a class="dropdown-item" href="/quotes/add">Nueva Cotizacion</a>
                        </div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:100%;">
                    <!-- <canvas class="chart" id="card-chart1" height="70" width="225" style="display: block; box-sizing: border-box; height: 70px; width: 225px;"></canvas> -->
                    <div class="row">
                        <div class="col">
                            <div class="fw-bold"><?= __('Aprobadas') ?></div>
                            <div class="fs-4 fw-semibold">
                                <?= __($quotesAproved) ?>
                                <span class="fs-6 fw-normal"> <?= __('(' . $percentAproved . '%)') ?></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="fw-bold"><?= __('Pendientes') ?></div>
                            <div class="fs-4 fw-semibold">
                                <?= __($quotesPending) ?>
                                <span class="fs-6 fw-normal"> <?= __('(' . $percentPending . '%)') ?></span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="fw-bold"><?= __('Rechazadas') ?></div>
                            <div class="fs-4 fw-semibold">
                                <?= __($quotesRechazed) ?>
                                <span class="fs-6 fw-normal"> <?= __('(' . $percentRechazed . '%)') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin col cotizaciones -->

        <!-- Col Participaciones -->
        <div class="col-sm-6 col-lg-6">
            <div class="card mb-4 text-white bg-info">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fw-bold"><?= __('Participaciones Totales') ?></div>
                        <div class="fs-4 fw-semibold">
                            <?= __($accountantsTotal) ?>
                            <span class="fs-6 fw-normal"> <?= h('(' . $this->Number->currency($totalAccountants, 'COP') . ')') ?> </span>
                            <!-- Aqui ira el total de las participaciones Ingresadas en el año  -->
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="/accountants/general">Ver todas las participaciones</a>
                        </div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:100%;">
                    <canvas class="chart" id="card-chart2" height="70" width="225" style="display: block; box-sizing: border-box; height: 70px; width: 225px;"></canvas>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>

<?php if ($isAdmin || $isTecBoss) :  ?>

    <div class="row">
        <!-- Col Ordenes de trabajo -->

        <div class="col-sm-6 col-lg-6">
            <div class="card mb-4 text-white bg-info">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fw-bold"><?= __('Ordenes de trabajo') ?></div>
                        <div class="fs-4 fw-semibold">
                            <?= h($orders) ?>
                            <span class="fs-6 fw-normal"> <?= __('(100%)') ?> </span>
                            <!-- Aqui ira el total de las participaciones Ingresadas en el año  -->
                        </div>

                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="/orders"><?= __('Ver todas las Ordenes') ?></a>
                        </div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:100%;">
                    <!-- <canvas class="chart" id="card-chart1" height="70" width="225" style="display: block; box-sizing: border-box; height: 70px; width: 225px;"></canvas> -->
                    <div class="row">
                        <div class="col">
                            <div class="fw-bold"><?= __('Aprobadas') ?></div>
                            <div class="fs-4 fw-semibold">
                                <?= __($ordersComplete) ?>
                                <span class="fs-6 fw-normal"> <?= __('(' . $ordersApp . '%)') ?></span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="fw-bold"><?= __('Pendientes') ?></div>
                            <div class="fs-4 fw-semibold">
                                <?= __($ordersPending) ?>
                                <span class="fs-6 fw-normal"> <?= __('(' . $ordersP . '%)') ?></span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="fw-bold"><?= __('Rechazadas') ?></div>
                            <div class="fs-4 fw-semibold">
                                <?= __($ordersCanceled) ?>
                                <span class="fs-6 fw-normal"> <?= __('(' . $ordersCan . '%)') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mesa de ayuda -->

        <div class="col-sm-6 col-lg-6">
            <div class="card mb-4 text-white bg-success">
                <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                    <div>
                        <div class="fw-bold"><?= __('Tickets de Mesa de ayuda') ?></div>
                        <div class="fs-4 fw-semibold">
                            <?= h($tickets) ?>
                        </div>

                    </div>
                    <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                            </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="/tikets"><?= __('Ver Tickets') ?></a>
                        </div>
                    </div>
                </div>
                <div class="c-chart-wrapper mt-3 mx-3" style="height:100%;">
                    <div class="row">
                        <div class="col">
                            <div class="fw-bold"><?= __('Completados') ?></div>
                            <div class="fs-4 fw-semibold">
                                <?= __($ticketsApp) ?>
                                <span class="fs-6 fw-normal"> <?= __('(' . $percentTicketsApp . '%)') ?></span>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="fw-bold"><?= __('Pendientes') ?></div>
                            <div class="fs-4 fw-semibold">
                                <?= __($ticketsPending) ?>
                                <span class="fs-6 fw-normal"> <?= __('(' . $percentTickets . '%)') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php endif ?>

<?php if($isAdmin): ?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="mb-4">
                    <h4 class="card-title mb-0"><?= __('Participaciones') ?></h4>
                    <div class="small text-medium-emphasis"><?= __('Datos Actualizados a ') . $arrayDate[0] . ' - ' . $arrayDate[2] ?></div>
                </div>
            </div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><?= __('Resumen de Participaciones del mes') ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><?= __('Resumen de participaciones Mes a Mes') ?></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false"><?= __('Promedio de participaciones Mes a Mes') ?></button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="p-3">
                        <div class="grafica">
                            <canvas id="participations"></canvas>
                        </div>
                        <div class="card-footer">
                            <div class="row row-cols-1 row-cols-md-3 text-center">
                                <div class="col mb-sm-2 mb-0">
                                    <div class="text-medium-emphasis"><?= __('Total de participaciones') ?></div>
                                    <div class="fw-semibold"><?= $this->Number->currency($totalParticipations, 'COP') ?><?= __(' (100%)') ?></div>
                                    <div class="progress progress-thin mt-2">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col mb-sm-2 mb-0">
                                    <div class="text-medium-emphasis"><?= __('Total de participaciones Liquidadas') ?></div>
                                    <div class="fw-semibold"><?= $this->Number->currency($Liquidadas, 'COP') ?><?= __(' (' . $percentParticipationsLiquidated . '%)') ?></div>
                                    <div class="progress progress-thin mt-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percentParticipationsLiquidated ?>%;" aria-valuenow="<?= $percentParticipationsLiquidated ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col mb-sm-2 mb-0">
                                    <div class="text-medium-emphasis"><?= __('Pendientes por Pagar') ?></div>
                                    <div class="fw-semibold"><?= $this->Number->currency($totalPending, 'COP') ?><?= __(' (' . $percentParticipationsPending . '%)') ?></div>
                                    <div class="progress progress-thin mt-2">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percentParticipationsPending ?>%;" aria-valuenow="<?= $percentParticipationsPending ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="p-3">
                        <div class="grafica2">
                            <canvas id="mesmes"></canvas>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show" id="messages" role="tabpanel" aria-labelledby="messages-tab" tabindex="0">...</div>
            </div>
        </div>
    </div>
</div>
<?php endif ?>

<script>
    var ctx = document.getElementById('participations').getContext('2d');
    var participacion = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total Esperado', 'Total Liquidado', 'Pendiente'],
            datasets: [{
                label: 'Total de participaciones',
                data: [<?= json_encode($totalParticipations) ?>, <?= json_encode($Liquidadas) ?>, <?= json_encode($totalPending) ?>],
                backgroundColor: [
                    'rgba(182, 146, 83, 1)',
                    'rgba(46, 184, 92, 1)',
                    'rgba(229, 83, 83, 1)',
                ],
                borderColor: [
                    'rgba(182, 146, 83, 1)',
                    'rgba(46, 184, 92, 1)',
                    'rgba(229, 83, 83, 1)',
                ],
                borderWidth: 1
            }]
        },
    });

    var ctx2 = document.getElementById('mesmes').getContext('2d');
    var meses = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Enero', 'febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                    label: 'Mes',
                    data: [<?= json_encode($Enero) ?>, <?= json_encode($Febrero) ?>, <?= json_encode($Marzo) ?>, <?= json_encode($Abril) ?>, <?= json_encode($Mayo) ?>, <?= json_encode($Junio) ?>, <?= json_encode($Julio) ?>, <?= json_encode($Agosto) ?>, <?= json_encode($Septiembre) ?>, <?= json_encode($Octubre) ?>, <?= json_encode($Noviembre) ?>, <?= json_encode($Diciembre) ?>],
                    backgroundColor: [
                        'rgba(182, 146, 83, 1)',
                        'rgba(182, 146, 83, 1)',
                    ],
                    borderColor: [
                        'rgba(182, 146, 83, 1)',
                        'rgba(182, 146, 83, 1)',
                    ],
                    borderWidth: 1
                },
                {
                    label: 'Mes Liquidado',
                    data: [<?= json_encode($EneroLiquidado) ?>, <?= json_encode($FebreroLiquidado) ?>, <?= json_encode($MarzoLiquidado) ?>, <?= json_encode($AbrilLiquidado) ?>, <?= json_encode($MayoLiquidado) ?>, <?= json_encode($JunioLiquidado) ?>, <?= json_encode($JulioLiquidado) ?>, <?= json_encode($AgostoLiquidado) ?>, <?= json_encode($SeptiembreLiquidado) ?>, <?= json_encode($OctubreLiquidado) ?>, <?= json_encode($NoviembreLiquidado) ?>, <?= json_encode($DiciembreLiquidado) ?>],
                    backgroundColor: [
                        'rgba(46, 184, 92, 1)',
                        'rgba(46, 184, 92, 1)',
                    ],
                    borderColor: [
                        'rgba(46, 184, 92, 1)',
                        'rgba(46, 184, 92, 1)',
                    ],
                    borderWidth: 1
                },
            ]
        },
    })
</script>