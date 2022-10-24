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

//Porcentaje Cotizaciones

$percentAproved = 0;
$percentPending = 0;
$percentRechazed = 0;
$ordersApp = 0;
$ordersP = 0;
$ordersCan = 0;

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

?>



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
                            <?= __($accountantsTotal) ?><?php
                                                        $total = 0;
                                                        foreach ($accountantsSum as $totalSum) {
                                                            $total += $totalSum->alfastreet;
                                                        }
                                                        ?>
                            <span class="fs-6 fw-normal"> <?= __('(' . $this->Number->currency($total, 'USD') . ')') ?> </span>
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
    </div>

<?php endif ?>

<div>
    <canvas id="myChart"></canvas>
</div>

<!-- <?php
        $vCuota = 3500;
        $compFinanciero = 0.39;
        $porcentaje = (($vCuota * $compFinanciero) / 100);
        $numCoutas = 24;

        for ($i = 0; $i < $numCoutas; $i++) {
            $nose = $numCoutas - $i;
            $sumatoria = $porcentaje * ($nose);
            $array[$i] = $sumatoria;
        }
        print_r($array);

        $total = array_sum($array);
        $impuesto = $total / $numCoutas;
        echo $impuesto + $vCuota;

        ?> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    /*
Encierro todo en una función asíncrona para poder usar async y await cómodamente
https://parzibyte.me/blog
*/
    (async () => {
        // Llamar a nuestra API. Puedes usar cualquier librería para la llamada, yo uso fetch, que viene nativamente en JS
        const respuestaRaw = await fetch(`${window.location.protocol}//${window.location.hostname}/users/data`);
        // Decodificar como JSON
        const respuesta = await respuestaRaw.json();
        // Ahora ya tenemos las etiquetas y datos dentro de "respuesta"
        // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica");
        const etiquetas = respuesta.etiquetas; // <- Aquí estamos pasando el valor traído usando AJAX
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datosVentas2020 = {
            label: "Ventas por mes",
            // Pasar los datos igualmente desde PHP
            data: respuesta.datos, // <- Aquí estamos pasando el valor traído usando AJAX
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1, // Ancho del borde
        };
        new Chart($grafica, {
            type: 'line', // Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datosVentas2020,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    })();
</script>