<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Part $part
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Añadir Parte o Servicio') ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="row">
                <div class="column-responsive column-80">
                    <div class="parts form content">
                        <?= $this->Form->create($part, ['type' => 'file', 'class' => 'row g-3 needs-validation']) ?>
                        <div class="col-3 mb-3">
                            <?= $this->Form->control('typeproduct_id', [ 'options' => $typeparts, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Tipo de Inventario', 'empty' => ['' => 'Seleccionar']]) ?>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('image', ['type' => 'file', 'accept' => 'image/png,image/jpeg', 'class' => 'form-control', 'label' => false, 'id' => 'image']); ?>
                                <img id="file" class="img-thumbnail rounded">
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <?= $this->Form->control('serial', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Serial', 'id' => 'serial']); ?>
                                        </div>
                                        <div class="col">
                                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombre de la pieza', 'id' => 'name']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <?= $this->Form->control('money_id', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Tipo de Moneda', 'id' => 'money']); ?>
                                        </div>
                                        <div class="col">
                                            <?= $this->Form->control('value', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Valor de la pieza', 'id' => 'value']); ?>
                                        </div>
                                        <div class="col">
                                            <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Cantidad disponible', 'id' => 'amount']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->button(__('Añadir'), ['class' => 'btn btn-primary', 'id' => 'anadir']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->Html->Script('parts') ?>