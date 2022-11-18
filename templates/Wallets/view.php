<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wallet $wallet
 */
$pending = 0;
$recauded = 0;
$suminitial = 0;
$coprecauded = 0;
$pending = $wallet->payment - $wallet->collection;

$pay = $wallet->agreement->nquote * $wallet->agreement->quotevalue + $wallet->agreement->quoteini;

$recauded += $wallet->collection;
foreach ($initials as $i) {
    $recauded += $i->valuequote;
    $suminitial += $i->valuequote;
    $coprecauded += $i->cop;
}

foreach ($payments as $p) {
    $recauded += $p->valuequote;
    $coprecauded += $p->cop;
}

?>

<!-- Datos Basicos del cliente -->

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title text-center mb-4"><?= __('Estado de Cuenta # ') . $wallet->id  ?></h2>
            <div class="row">
                <div class="col-6">
                    <div class="card p-1">
                        <div class="row">
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <span style="font-weight: bold;"><?= __('Cliente:') ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span style="font-weight: bold;"><?= __('NIT/CC:') ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span style="font-weight: bold;"><?= __('Contacto:') ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span style="font-weight: bold;"><?= __('Telefono:') ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span style="font-weight: bold;"><?= __('Modelo:') ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span style="font-weight: bold;"><?= __('Serial:') ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?= $business->name ?></li>
                                    <li class="list-group-item"><?= $business->nit ?></li>
                                    <li class="list-group-item"><?= $client->name ?></li>
                                    <li class="list-group-item"><?= $client->phone ?></li>
                                    <li class="list-group-item"><?= $machine->Model['name'] ?></li>
                                    <li class="list-group-item"><?= $machine->serial ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
                <div class="col-5">
                    <div class="card p-1">
                        <div class="row">
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><span style="font-weight: bold;"><?= __('Valor del Contrato:') ?></span></li>
                                    <li class="list-group-item"><span style="font-weight: bold;"><?= __('Valor Recaudado:') ?></span></li>
                                    <li class="list-group-item"><span style="font-weight: bold;"><?= __('Saldo pendiente:') ?></span></li>
                                    <?php if ($quote !== NULL) : ?>
                                        <li class="list-group-item"><span style="font-weight: bold;"><?= __('Cuotas Pagadas:') ?></span></li>
                                        <li class="list-group-item"><span style="font-weight: bold;"><?= __('Ultimo Pago:') ?></span></li>
                                    <?php endif; ?>
                                    <li class="list-group-item"><span style="font-weight: bold;"><?= __('Fecha Ultima Cuota') ?></span></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?= $this->Number->currency($wallet->payment, 'USD') ?></li>
                                    <li class="list-group-item"><?= $this->Number->currency($recauded, 'USD') ?></li>
                                    <li class="list-group-item"><?= $this->Number->currency($pending, 'USD') ?></li>
                                    <?php if ($quote !== NULL) : ?>
                                        <li class="list-group-item"><?= $quote !== NULL ? $quote->paymentquote : 0 ?></li>
                                        <li class="list-group-item"><?= $quote->datepayment === NULL ? 'No se registra fecha' : $quote->datepayment  ?></li>
                                    <?php endif; ?>
                                    <li class="list-group-item"><?= date('Y-m-d', strtotime($wallet->lastpay . '+ ' . $wallet->agreement->nquote . ' month')) ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title"><?= __('Programación de pagos') ?></h2>
                <div class="table-responsive mt-4">
                    <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center">
                        <thead>
                            <tr>
                                <th><?= __('Cuota') ?></th>
                                <th><?= __('Fecha de Pago') ?></th>
                                <th><?= __('Valor de la Couta USD') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= h('0') ?></td>
                                <td><?= date('d-m-Y', strtotime($wallet->agreement->datesigned)) ?></td>
                                <td><?= $this->Number->currency($wallet->agreement->quoteini, 'USD') ?></td>
                            </tr>
                            <?php for ($i = 0; $i < $wallet->agreement->nquote; $i++) { ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= date('d-m-Y', strtotime($wallet->agreement->datesigned . '+ ' . $i + 1 . 'month')) ?></td>
                                    <td><?= $this->Number->currency($wallet->agreement->quotevalue, 'USD') ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td style="font-weight: bold;"><?= __('Total A recaudar:') ?></td>
                                <td style="font-weight: bold;"><?= $this->Number->currency($pay, 'USD') ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <h2 class="card-title"><?= __('Seguimiento de Pagos') ?></h2>
                    <div class="d-grid gap-2 d-md-block">
                        <?= $this->Html->link('Ingresar Pago', ['controller' => 'payments', 'action' => 'add', '?' => ['agreement' => $wallet->agreement_id ]], ['class' => 'btn btn-success']) ?>
                        <?= $suminitial < $wallet->agreement->quoteini ? $this->Html->link('Ingresar Cuota Inicial', ['controller' => 'paymentinitials', 'action' => 'add', '?' => ['agreement' => $wallet->agreement_id]], ['class' => 'btn btn-success']) : '' ?>
                    </div>
                </div>
                <div class="table-responsive mb-4">
                    <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center">
                        <thead>
                            <tr>
                                <th><?= __('Fecha de Recaudo') ?></th>
                                <th><?= __('Cuota') ?></th>
                                <th><?= __('Valor recaudado USD') ?></th>
                                <th><?= __('TRM') ?></th>
                                <th><?= __('Valor en COP') ?></th>
                                <th><?= __('Banco') ?></th>
                                <th><?= __('Empresa') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($initials as $initial) : ?>
                                <tr>
                                    <td><?= h($initial->datepayment) ?></td>
                                    <td><?= h('Inicial') ?></td>
                                    <td><?= $this->Number->currency($initial->valuequote, 'USD') ?></td>
                                    <td><?= $this->Number->currency($initial->trm, 'COP') ?></td>
                                    <td><?= $this->Number->currency($initial->cop, 'COP') ?></td>
                                    <td><?= h($initial->Bank['name']) ?></td>
                                    <td><?= h($initial->Destiny['name']) ?></td>
                                </tr>
                            <?php endforeach ?>
                            <?php foreach ($payments as $pay) : ?>
                                <tr>
                                    <td><?= h($pay->datepayment) ?></td>
                                    <td><?= h($pay->paymentquote) ?></td>
                                    <td><?= $this->Number->currency($pay->valuequote, 'USD') ?></td>
                                    <td><?= $this->Number->currency($pay->trm, 'COP') ?></td>
                                    <td><?= $this->Number->currency($pay->cop, 'COP') ?></td>
                                    <td><?= h($pay->Bank['name']) ?></td>
                                    <td><?= h($pay->Destiny['name']) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4"><?= __('Total Recaudado: ') ?></th>
                                <th colspan="3"><?= $this->Number->currency($recauded, 'USD') . ' USD ' ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>