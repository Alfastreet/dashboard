<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 * @var \Cake\Collection\CollectionInterface|string[] $casinos
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Maquinas', 'url' => ['controller' => 'Machines', 'action' => 'index']],
])

?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Editar Maquina # '. $machine->id) ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="machines form content">
                    <?= $this->Form->create($machine, ['class' => 'row g-3 needs-validation', 'type' => 'file']) ?>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('contract_id', ['options' => $contracts, 'empty' => ['0' => 'Tipo de Contrato'], 'class' => 'form-control', 'label' => false, 'required' => true, 'id' => 'contrato']); ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('casino_id', ['options' => $casinos, 'class' => 'form-control', 'empty' => ['' => 'Selecciona el Casino al que pertenece la maquina'], 'id' => 'casino' , 'label' => false, 'required' => false, 'default' => $this->request->getQuery('casinoid')]); ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('owner_id', ['class' => 'form-control', 'empty' => ['0' => 'Seleccione el dueño del Casino y la maquina'], 'label' => false, 'require' => false, 'id' => 'owner' ]);  ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('company_id', ['class' => 'form-control', 'empty' => ['0' => 'Seleccione la compañia del Casino'], 'label' => false, 'required' => false, 'id' => 'company']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('idint', ['class' => 'form-control', 'id' => 'intId', 'label' => false, 'require' => true, 'placeholder' => 'ID Interno de la maquina']); ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('serial', ['class' => 'form-control', 'id' => 'serial',  'label' => false, 'placeholder' => 'Serial de la maquina', 'required' => false]); ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'require' => true, 'placeholder' => 'Nombre de la maquina o modulo', 'id' => 'name']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('yearModel', ['class' => 'form-control', 'label' => false, 'id' => 'year', 'require' => true, 'placeholder' => 'Año de fabricación']); ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('model_id', ['class' => 'form-control', 'empty' => ['' => 'Modelo de la Maquina o Modulo'], 'label' => false, 'require' => true, 'id' => 'model']); ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('maker_id', ['class' => 'form-control', 'label' => false, 'empty' => ['' => 'Fabricante'], 'required' => true, 'id' => 'maker']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('warranty', ['class' => 'form-control', 'id' => 'warranty', 'placeholder' => 'Tiempo de Garantia', 'label' => false, 'require' => true]) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('height', ['class' => 'form-control', 'placeholder' => 'Altura de la Maquina', 'label' => false, 'id' => 'height', 'require' => true]) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('width', ['class' => 'form-control', 'placeholder' => 'Ancho de la Maquina', 'label' => false, 'id' => 'width', 'require' => true]) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('display', ['class' => 'form-control', 'placeholder' => 'Marca del Display', 'label' => false, 'require' => true]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('image', ['type' => 'file', 'class' => 'form-control', 'label' => false, 'accept' => 'image/png,image/jpeg', 'id' => 'image', 'required' => false]); ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('dateInstalling', ['class' => 'form-control', 'label' => 'Fecha de Instalación', 'requireD' => false, 'id' => 'date']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('value', ['type' => 'number', 'class' => 'form-control', 'placeholder' => 'Valor de la maquina', 'label' => false, 'required' => true, 'id' => 'val']) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Añadir'), ['class' => 'btn btn-primary', 'id' => 'add']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
