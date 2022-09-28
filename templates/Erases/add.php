<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Erase $erase
 * @var \Cake\Collection\CollectionInterface|string[] $machines
 * @var \Cake\Collection\CollectionInterface|string[] $months
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Añadir Borrados') ?></h3>
                    <input type="hidden" id="token" value="<?= $_GET['token'] ?>">
                    <input type="hidden" id="machineid" value="<?= $_GET['machineId'] ?>">
                    <input type="hidden" id="casinoid" value="<?= $_GET['casinoId'] ?>">
                    <input type="hidden" id="month" value="<?= date('m', strtotime(date('d-m-Y') . "- 1 month")) ?>">
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="erases form content">
                    <?= $this->Form->create($erase, ['type' => 'file', 'class' => 'row g-3 needs-validation']) ?>
                    <div class="col-md-6">
                        <?= $this->Form->control('image', ['type' => 'file', 'require' => true, 'id' => 'image', 'label' => false, 'accept' => 'image/png, image/jpeg', 'class' => 'form-control']) ?>
                        <img id="file" class="img-thumbnail rounded">
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('machine_id', ['label' => false, 'class' => 'form-control', 'required' => true, 'default' => $_GET['machineId']]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('day_init', ['disabled' => true, 'id' => 'dayInit', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Dia de inicio del Contador, INSERTAR SOLO EL NUMERO DEL DIA']) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('day_end', ['disabled' => true, 'id' => 'dayEnd', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Dia final del Contador, INSERTAR SOLO EL NUMERO DEL DIA']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('cashin', ['disabled' => true, 'id' => 'cashin', 'class' => 'form-control', 'placeholder' => 'CashIn', 'label' => false]) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('cashout', ['disabled' => true, 'id' => 'cashout', 'class' => 'form-control', 'placeholder' => 'CashOut', 'label' => false]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('bet', ['disabled' => true, 'id' => 'bet', 'class' => 'form-control', 'placeholder' => 'Bet', 'label' => false]) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('win', ['disabled' => true, 'id' => 'win', 'class' => 'form-control', 'placeholder' => 'Win', 'label' => false]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('jackpot', ['disabled' => true, 'id' => 'jackpot', 'class' => 'form-control', 'placeholder' => 'Jackpot', 'label' => false]) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('gamesplayed', ['disabled' => true, 'id' => 'gamesplayed', 'class' => 'form-control', 'placeholder' => 'Total de juegos jugados', 'label' => false]) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?= $this->Form->button(__('Enviar Borrado'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title mb-0 text-center"><?= __('Borrados de la maquina') ?></h3>
            <p>&nbsp;</p>
            <div class="table-responsive">
                <table class="table table-responsive table-striped table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><?= __('day_init') ?></th>
                            <th><?= __('day_end') ?></th>
                            <th><?= __('Cashin') ?></th>
                            <th><?= __('Cashout') ?></th>
                            <th><?= __('bet') ?></th>
                            <th><?= __('win') ?></th>
                            <th><?= __('profit') ?></th>
                            <th><?= __('jackpot') ?></th>
                            <th><?= __('gamesplayed') ?></th>
                            <th><?= __('coljuegos') ?></th>
                            <th><?= __('admin') ?></th>
                            <th><?= __('total') ?></th>
                            <th><?= __('alfastreet') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($erases as $e) : ?>
                            <tr>
                                <td><?= h($e->day_init) ?></td>
                                <td><?= h($e->day_end) ?></td>
                                <td><?= $this->Number->currency($e->cashin, 'USD') ?></td>
                                <td><?= $this->Number->currency($e->cashout, 'USD') ?></td>
                                <td><?= $this->Number->currency($e->bet, 'USD') ?></td>
                                <td><?= $this->Number->currency($e->win, 'USD') ?></td>
                                <td><?= $this->Number->currency($e->profit, 'USD') ?></td>
                                <td><?= $this->Number->currency($e->jackpot, 'USD') ?></td>
                                <td><?= h($e->gamesplayed) ?></td>
                                <td><?= $this->Number->currency($e->coljuegos, 'USD') ?></td>
                                <td><?= $this->Number->currency($e->admin, 'USD') ?></td>
                                <td><?= $this->Number->currency($e->total, 'USD') ?></td>
                                <td><?= $this->Number->currency($e->alfastreet, 'USD') ?></td>
                                <td><?= $this->Html->image('Erase/' . $e->image, ['class' => 'img-thumbnail']) ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title mb-0 text-center"><?= __('Liquidacion de la maquina') ?></h3>
            <p>&nbsp;</p>
            <div class="table-responsive">
                <table class="table table-responsive table-striped table-bordered text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th><?= __('Total Cashin') ?></th>
                            <th><?= __('Total Cashout') ?></th>
                            <th><?= __('bet') ?></th>
                            <th><?= __('win') ?></th>
                            <th><?= __('profit') ?></th>
                            <th><?= __('jackpot') ?></th>
                            <th><?= __('gamesplayed') ?></th>
                            <th><?= __('coljuegos') ?></th>
                            <th><?= __('admin') ?></th>
                            <th><?= __('total') ?></th>
                            <th><?= __('alfastreet') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $totalCashin = 0;
                            $totalCashOut = 0;
                            $totalBet = 0;
                            $totalWin = 0;
                            $totalProfit = 0;
                            $totalJackpot = 0;
                            $totalGames = 0;
                            $totalColjuegos = 0;
                            $totalAdmin = 0;
                            $totalTotal = 0;
                            $totalAlfastreet = 0;
                            foreach($erases as $er): 
                                $totalCashin += $er->cashin;
                                $totalCashOut += $er->cashout;
                                $totalBet += $er->bet;
                                $totalWin += $er->win;
                                $totalProfit += $er->profit;
                                $totalJackpot += $er->jackpot;
                                $totalGames += $er->gamesplayed;
                                $totalColjuegos += $er->coljuegos;
                                $totalAdmin += $er->admin;
                                $totalTotal += $er->total;
                                $totalAlfastreet += $er->alfastreet;
                        ?>
                        <?php endforeach ?>
                        <tr>
                            <td><input id="cashintable" type="hidden" value="<?= $totalCashin ?>"><?= $this->Number->currency($totalCashin, 'USD') ?></td>
                            <td><input type="hidden" id="cashouttable" value="<?= $totalCashOut ?>"><?= $this->Number->currency($totalCashOut, 'USD') ?></td>
                            <td><input type="hidden" id="bettable" value="<?= $totalBet ?>"><?= $this->Number->currency($totalBet, 'USD') ?></td>
                            <td><input type="hidden" id="wintable" value="<?= $totalWin ?>"><?= $this->Number->currency($totalWin, 'USD') ?></td>
                            <td><input type="hidden" id="profittable" value="<?= $totalProfit ?>"><?= $this->Number->currency($totalProfit, 'USD') ?></td>
                            <td><input type="hidden" id="jackpottable" value="<?= $totalJackpot ?>"><?= $this->Number->currency($totalJackpot, 'USD') ?></td>
                            <td><input type="hidden" id="gamestable" value="<?= $totalGames ?>"><?= h($totalGames) ?></td>
                            <td><input type="hidden" id="coljuegostable" value="<?= $totalColjuegos ?>"><?= $this->Number->currency($totalColjuegos, 'USD') ?></td>
                            <td><input type="hidden" id="admintable" value="<?= $totalAdmin ?>"><?= $this->Number->currency($totalAdmin, 'USD') ?></td>
                            <td><input type="hidden" id="totaltable" value="<?= $totalTotal ?>"><?= $this->Number->currency($totalTotal, 'USD') ?></td>
                            <td><input type="hidden" id="alfatable" value="<?= $totalAlfastreet ?>"><?= $this->Number->currency($totalAlfastreet, 'USD') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="button" class="btn btn-primary" id="sendErase">Genera Contador</button>
        </div>
    </div>
</div>

<?= $this->Html->Script('accounts') ?>
<?= $this->Html->script('erraseAccounts') ?>