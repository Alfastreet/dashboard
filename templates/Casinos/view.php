<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */
?>
<div class="col-12">
    <div class="mb-3">
        <?php include_once __DIR__ . '/layouts/aside.php' ?>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="mb-6">
                <h2 class="text-center card-title"><?= h($casino->name) ?></h2>
                <div class="mb-3 row">
                    <div class="col">
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Dirección del Casino:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($casino->address) ?>">
                        </div>
                        <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Teléfono del Casino:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($casino->phone) ?>">
                        </div>
                    </div>
                    <div class="col">
                        <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Departamento:') ?></label>
                        <div class="col-md-6">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $casino->has('state') ? h($casino->state->name) : '' ?>">
                        </div>
                        <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Ciudad:') ?></label>
                        <div class="col-md-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $casino->has('city') ? h($casino->city->name) : '' ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="column-responsive column-80">
                    <div class="accountants form content">
                        <?= $this->Form->create($accountants, ['class' => 'row g-3 needs-validation', 'type' => 'file', 'url' => ['controller' => 'accountants', 'action' => 'add', '?' => ['casinoid' => $casino->id, 'token' => $_GET['token']]]]) ?>
                        <div class="col-md-6">
                            <?= $this->Form->control('image', ['type' => 'file', 'required' => 'true', 'id' => 'image', 'label' => false, 'accept' => 'image/png,image/jpeg', 'class' => 'form-control']); ?>
                            <img id="file" class="img-thumbnail rounded">
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $this->Form->control('machine_id', ['required' => false, 'disabled' => false, 'class' => 'form-control', 'label' => false, 'empty' => ['' => 'Seleccione la maquina']]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <?= $this->Form->control('day_init', ['disabled' => true, 'id' => 'dayInit', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Dia de inicio del Contador, INSERTAR SOLO EL NUMERO DEL DIA']); ?>
                                    </div>
                                    <div class="col">
                                        <?= $this->Form->control('day_end', ['disabled' => true, 'id' => 'dayEnd', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Dia final del Contador, INSERTAR SOLO EL NUMERO DEL DIA']); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <?= $this->Form->control('cashin', ['disabled' => true, 'id' => 'cashin', 'class' => 'form-control', 'placeholder' => 'CashIn', 'label' => false]); ?>
                                    </div>
                                    <div class="col">
                                        <?= $this->Form->control('cashout', ['disabled' => true, 'id' => 'cashout', 'class' => 'form-control', 'placeholder' => 'CashOut', 'label' => false]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <?= $this->Form->control('bet', ['disabled' => true, 'id' => 'bet', 'class' => 'form-control', 'placeholder' => 'Bet', 'label' => false]); ?>
                                    </div>
                                    <div class="col">
                                        <?= $this->Form->control('win', ['disabled' => true, 'id' => 'win', 'class' => 'form-control', 'placeholder' => 'Win', 'label' => false]); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <?= $this->Form->control('jackpot', ['disabled' => true, 'id' => 'jackpot', 'class' => 'form-control', 'placeholder' => 'Jackpot', 'label' => false]);  ?>
                                    </div>
                                    <div class="col">
                                        <?= $this->Form->control('gamesplayed', ['disabled' => true, 'id' => 'gamesplayed', 'class' => 'form-control', 'placeholder' => 'Total de juegos jugados', 'label' => false]);  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->button(__('Enviar Contador'), ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title mb-0 text-center"><?= __('Contadores del mes Anterior') ?></h3>
            <p>&nbsp;</p>
            <div class="table-responsive">
                <table class="table table-responsive table-striped table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><?= __('Serial de la máquina') ?></th>
                            <th scope="col"><?= __('Nombre de la máquina') ?></th>
                            <th scope="col"><?= __('Dia de Inicio') ?></th>
                            <th scope="col"><?= __('Dia de Finalización') ?></th>
                            <th scope="col"><?= __('Mes') ?></th>
                            <th scope="col"><?= __('CashIn') ?></th>
                            <th scope="col"><?= __('CashOut') ?></th>
                            <th scope="col"><?= __('Ber') ?></th>
                            <th scope="col"><?= __('Win') ?></th>
                            <th scope="col"><?= __('Profit') ?></th>
                            <th scope="col"><?= __('Jackpot') ?></th>
                            <th scope="col"><?= __('Juegos Jugados') ?></th>
                            <th scope="col"><?= __('ColJuegos 12%') ?></th>
                            <th scope="col"><?= __('Administracion 1%') ?></th>
                            <th scope="col"><?= __('Total a pagar') ?></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach ($lastaccountants as $lastaccountant) :
                            foreach ($machines as $machine) :
                                if ($lastaccountant->machine_id == $machine->id) {
                                    $serialMachine = $machine->serial;
                                    $serialName = $machine->name;
                                }
                            endforeach;
                        ?>


                            <tr>
                                <td><?= h($serialMachine) ?></td>
                                <td><?= h($serialName) ?></td>
                                <td><?= h($lastaccountant->day_init) ?></td>
                                <td><?= h($lastaccountant->day_end) ?></td>
                                <td><?= h($lastaccountant->month_id) ?></td>
                                <td><?= $this->Number->currency($lastaccountant->cashin, 'USD') ?></td>
                                <td><?= $this->Number->currency($lastaccountant->cashout, 'USD') ?></td>
                                <td><?= $this->Number->currency($lastaccountant->bet, 'USD') ?></td>
                                <td><?= $this->Number->currency($lastaccountant->win, 'USD') ?></td>
                                <td><?= $this->Number->currency($lastaccountant->profit, 'USD') ?></td>
                                <td><?= $this->Number->currency($lastaccountant->jackpot, 'USD') ?></td>
                                <td><?= h($lastaccountant->gamesplayed) ?></td>
                                <td><?= $this->Number->currency($lastaccountant->coljuegos, 'USD') ?></td>
                                <td><?= $this->Number->currency($lastaccountant->admin, 'USD') ?></td>
                                <td><?= $this->Number->currency($lastaccountant->total, 'USD') ?></td>
                                <td><?= $this->Html->image('Accountants/' . $lastaccountant->image, ['class' => 'img-thumbnail']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title mb-0 text-center"><?= __('Contadores del mes Actual') ?></h3>
            <p>&nbsp;</p>
            <div class="table-responsive">
                <table class="table table-responsive table-striped table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><?= __('Serial de la máquina') ?></th>
                            <th scope="col"><?= __('Nombre de la máquina') ?></th>
                            <th scope="col"><?= __('Dia de Inicio') ?></th>
                            <th scope="col"><?= __('Dia de Finalización') ?></th>
                            <th scope="col"><?= __('Mes') ?></th>
                            <th scope="col"><?= __('CashIn') ?></th>
                            <th scope="col"><?= __('CashOut') ?></th>
                            <th scope="col"><?= __('Ber') ?></th>
                            <th scope="col"><?= __('Win') ?></th>
                            <th scope="col"><?= __('Profit') ?></th>
                            <th scope="col"><?= __('Jackpot') ?></th>
                            <th scope="col"><?= __('Juegos Jugados') ?></th>
                            <th scope="col"><?= __('ColJuegos 12%') ?></th>
                            <th scope="col"><?= __('Administracion 1%') ?></th>
                            <th scope="col"><?= __('Total a pagar') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($accountants as $accountant) :
                            foreach ($machines as $machine) :
                                if ($accountant->machine_id == $machine->id) {
                                    $serialMachine = $machine->serial;
                                    $serialName = $machine->name;
                                }
                            endforeach;
                        ?>
                            <tr>
                                <td><?= h($serialMachine) ?></td>
                                <td><?= h($serialName) ?></td>
                                <td><?= h($accountant->day_init) ?></td>
                                <td><?= h($accountant->day_end) ?></td>
                                <td><?= h($accountant->month_id) ?></td>
                                <td><?= $this->Number->currency($accountant->cashin, 'USD') ?></td>
                                <td><?= $this->Number->currency($accountant->cashout, 'USD') ?></td>
                                <td><?= $this->Number->currency($accountant->bet, 'USD') ?></td>
                                <td><?= $this->Number->currency($accountant->win, 'USD') ?></td>
                                <td><?= $this->Number->currency($accountant->profit, 'USD') ?></td>
                                <td><?= $this->Number->currency($accountant->jackpot, 'USD') ?></td>
                                <td><?= h($accountant->gamesplayed) ?></td>
                                <td><?= $this->Number->currency($accountant->coljuegos, 'USD') ?></td>
                                <td><?= $this->Number->currency($accountant->admin, 'USD') ?></td>
                                <td><?= $this->Number->currency($accountant->total, 'USD') ?></td>
                                <td><?= $this->Html->image('Accountants/' . $accountant->image, ['class' => 'img-thumbnail']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title mb-0 text-center"><?= __('Liquidación Actual') ?></h3>
            <p>&nbsp;</p>

            <div class="table-responsive">
                <table class="table table-responsive table-striped table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><?= __('Serial de la máquina') ?></th>
                            <th scope="col"><?= __('Nombre de la máquina') ?></th>
                            <th scope="col"><?= __('Dia de Inicio') ?></th>
                            <th scope="col"><?= __('Dia de Finalización') ?></th>
                            <th scope="col"><?= __('Mes') ?></th>
                            <th scope="col"><?= __('CashIn') ?></th>
                            <th scope="col"><?= __('CashOut') ?></th>
                            <th scope="col"><?= __('Bet') ?></th>
                            <th scope="col"><?= __('Win') ?></th>
                            <th scope="col"><?= __('Profit') ?></th>
                            <th scope="col"><?= __('Jackpot') ?></th>
                            <th scope="col"><?= __('Juegos Jugados') ?></th>
                            <th scope="col"><?= __('Coljuegos 12%') ?></th>
                            <th scope="col"><?= __('Administracion 1%') ?></th>
                            <th scope="col"><?= __('IVA') ?></th>
                            <th scope="col"><?= __('Total') ?></th>
                            <th scope="col"><?= __('Alfastreet 40%') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        $totalizate = 0;

                        foreach ($accountants as $accountant) :
                            foreach ($machines as $machine) :
                                if ($accountant->machine_id == $machine->id) {
                                    $serialMachine = $machine->serial;
                                    $serialName = $machine->name;
                                }
                            endforeach;
                            foreach ($lastaccountants as $lastaccountant) :
                                $totalCashin = 0;
                                $totalCashout = 0;
                                $totalBet = 0;
                                $totalWin = 0;
                                $totalProfit = 0;
                                $totalJackpot = 0;
                                $totalizate = 0;
                                $alfasteet = 0;
                                $coljuegos = 0;
                                $admin = 0;
                                $iva = 144415;

                                if ($lastaccountant->machine_id === $accountant->machine_id) {
                                    $totalCashin = $accountant->cashin - $lastaccountant->cashin;
                                    $totalCashout =  $accountant->cashout - $lastaccountant->cashout;
                                    $totalBet = $accountant->bet - $lastaccountant->bet;
                                    $totalWin = $accountant->win - $lastaccountant->win;
                                    $totalProfit = $accountant->profit - $lastaccountant->profit;
                                    $totalJackpot = $accountant->jackpot - $lastaccountant->jackpot;
                                    $totalizate = $accountant->profit - $lastaccountant->profit;
                                    $coljuegos = $totalizate * 0.12;
                                    $admin = $coljuegos * 0.01;
                                    $totalall = $totalizate - $coljuegos - $admin - $iva;
                                    $alfasteet = $totalall * 0.40;

                        ?>

                                    <tr>
                                        <td><?= h($serialMachine) ?></td>
                                        <td><?= h($serialName) ?></td>
                                        <td><?= h($accountant->day_init) ?></td>
                                        <td><?= h($accountant->day_end) ?></td>
                                        <td><?= h($accountant->month_id) ?></td>
                                        <td><?= $this->Number->currency($totalCashin, 'USD') ?></td>
                                        <td><?= $this->Number->currency($totalCashout, 'USD') ?></td>
                                        <td><?= $this->Number->currency($totalBet, 'USD') ?></td>
                                        <td><?= $this->Number->currency($totalWin, 'USD') ?></td>
                                        <td><?= $this->Number->currency($totalProfit, 'USD') ?></td>
                                        <td><?= $this->Number->currency($totalJackpot, 'USD') ?></td>
                                        <td><?= h($accountant->gamesplayed) ?></td>
                                        <td><?= $this->Number->currency($coljuegos, 'USD') ?></td>
                                        <td><?= $this->Number->currency($admin, 'USD') ?></td>
                                        <td><?= $this->Number->currency($iva, 'USD') ?></td>
                                        <td><?= $this->Number->currency($totalall, 'USD') ?></td>
                                        <td><?= $this->Number->currency($alfasteet, 'USD') ?></td>
                                    </tr>

                        <?php }
                                $total += $alfasteet;
                            endforeach;
                        endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
        <h3 class="lead text-center">Total a pagar en el mes: <span><?= $this->Number->currency($total, 'USD') ?></span></h3>
        <?= $this->Html->link('Descargar Liquidación', ['action' => 'getpdf', '?' => ['id' => $casino->id]], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?= $this->Html->Script('accounts') ?>