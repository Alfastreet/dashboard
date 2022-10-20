<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 * @var string[]|\Cake\Collection\CollectionInterface $casinos
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Editar Datos de la Maquina') ?></h3>
                </div>
                <div>
                    <?= $this->Form->postLink(
                        __('Borrar'),
                        ['action' => 'delete', $machine->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id), 'class' => 'btn btn-danger me-md-2']
                    ) ?>
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <?= $this->Form->create($machine, ['type' => 'file', 'class' => 'row g-3 needs-validation']) ?>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('casino_id', ['options' => $casinos, 'class' => 'form-control', 'empty' => ['' => 'Selecciona el Casino al que pertenece la maquina'], 'label' => false, 'require' => true]); ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('owner_id', ['class' => 'form-control', 'empty' => ['' => 'Seleccione el dueño del Casino y la maquina'], 'label' => false, 'require' => true]);  ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('company_id', ['class' => 'form-control', 'empty' => ['Seleccione la compañia del Casino'], 'label' => false, 'require' => true]); ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('contract_id', ['options' => $contracts, 'empty' => ['' => 'Tipo de Contrato'], 'class' => 'form-control', 'label' => false, 'require' => true]); ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('idint', ['class' => 'form-control', 'label' => false, 'require' => true, 'placeholder' => 'ID Interno de la maquina']); ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('serial', ['class' => 'form-control', 'label' => false, 'require' => true, 'placeholder' => 'Serial de la maquina']); ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'require' => true, 'placeholder' => 'Nombre de la maquina o modulo']); ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('yearModel', ['class' => 'form-control', 'label' => false, 'require' => true, 'placeholder' => 'Año de fabricación']); ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('model_id', ['class' => 'form-control', 'empty' => ['' => 'Modelo de la Maquina o Modulo'], 'label' => false, 'require' => true, 'placeholder' => 'ID Interno de la maquina']); ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('maker_id', ['class' => 'form-control', 'label' => false, 'empty' => ['' => 'Fabricante', 'require' => true]]) ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('warranty', ['class' => 'form-control', 'placeholder' => 'Tiempo de Garantia', 'label' => false, 'require' => true]) ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('height', ['class' => 'form-control', 'placeholder' => 'Altura de la Maquina', 'label' => false, 'require' => true]) ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('width', ['class' => 'form-control', 'placeholder' => 'Ancho de la Maquina', 'label' => false, 'require' => true]) ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('display', ['class' => 'form-control', 'placeholder' => 'Marca del Display', 'label' => false, 'require' => true]) ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('image', ['type' => 'file', 'class' => 'form-control', 'label' => false, 'required' => false]); ?>
                        </div>
                        <div class="col">
                            <?= $this->Form->control('dateInstalling', ['class' => 'form-control', 'label' => 'Fecha de Instalación', 'require' => true]) ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <?= $this->Form->control('value', ['type' => 'number', 'class' => 'form-control', 'placeholder' => 'Valor de la maquina', 'label' => false, 'require' => true]) ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary me-md-2']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>