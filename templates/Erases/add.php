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
                        <?= $this->Form->control('image', ['type' => 'file', 'require' => true, 'id' => 'image', 'label' => false, 'accept' => 'image/png, image/jpeg' ,'class' => 'form-control']) ?>
                        <img id="file" class="img-thumbnail rounded">
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('machine_id', ['options' => $machines, 'empty' => ['' => 'Selecciona la maquina'], 'label' => false, 'class' => 'form-control', 'required' => true]) ?>
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
                    </div>

                    <?= $this->Form->button(__('Enviar Borrado'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 
<?= $this->Html->Script('accounts') ?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="erases form content">
            <fieldset>
                <legend><?= __('Add Erase') ?></legend>
                <?php
                echo $this->Form->control('casino_id', ['options' => $casino]);
                echo $this->Form->control('alfastreet');
                echo $this->Form->control('total');
                echo $this->Form->control('admin');
                echo $this->Form->control('coljuegos');
                echo $this->Form->control('gamesplayed');
                echo $this->Form->control('jackpot');
                echo $this->Form->control('profit');
                echo $this->Form->control('year');
                echo $this->Form->control('month_id', ['options' => $months, 'empty' => true]);
                ?>
            </fieldset>
            
        </div>
    </div>
</div> -->