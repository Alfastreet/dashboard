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
                    <input type="hidden" id="casinoid" value="<?= $_GET['casinoId'] ?>">
                    <input type="hidden" id="month" value="<?= date('m', strtotime(date('d-m-Y') . "- 1 month")) ?>">
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['controller' => 'casinos', 'action' => 'view', $this->request->getQuery('casinoId'), '?' => ['token' => $this->request->getQuery('token')]], ['class' => 'btn btn-primary']) ?>
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
                                    <?= $this->Form->control('machine_id', ['label' => false, 'class' => 'form-control', 'required' => true, 'default' => '']) ?>
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
                        <?php $totalErrase = 0;
                        foreach ($erases as $e) : ?>
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

                        <?php $totalErrase += $e->alfastreet;
                        endforeach ?>
                    </tbody>
                </table>
                <h3 class="lead text-center">Total de liquidacion de Borrados: <span><?= $this->Number->currency($totalErrase, 'USD') ?></span></h3>
                <input type="hidden" id="totalErrase" value="<?=$totalErrase?>">
                <button type="button" class="btn btn-primary" id="sendErase">Procesar Borrados</button>
            </div>
        </div>
    </div>
</div>


<?= $this->Html->Script('accounts') ?>
<?= $this->Html->script('erraseAccounts') ?>