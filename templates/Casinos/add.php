<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Casinos', 'url' => ['controller' => 'Casinos', 'action' => 'index']],
])
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Registrar Casino') ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="casinos form content">
                    <?= $this->Form->create($casino, ['type' => 'file', 'class' => 'row g-3 needs-validation']) ?>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <?= $this->Form->control('business_id', ['options' => $business, 'class' => 'form-control', 'label' => false, 'require' => true, 'label' => false, 'empty' => ['' => 'Empresa Perteneciente']]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= $this->Form->control('owner_id', ['options' => $owners, 'class' => 'form-control', 'label' => false, 'require' => true, 'label' => false, 'empty' => ['' => 'Dueño']]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('name', ['id' => 'casinoName', 'class' => 'form-control', 'placeholder' => 'Nombre del Casino', 'label' => false, ]) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('phone', ['class' => 'form-control', 'placeholder' => 'Teléfono del Casino', 'label' => false]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('address', ['class' => 'form-control', 'placeholder' => 'Dirección', 'label' => false]) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('state_id', ['empty' => ['' => 'Departamento'], 'class' => 'form-control', 'label' => false]) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('city_id', ['empty' => ['' => 'Ciudad'], 'class' => 'form-control', 'label' => false]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('image', ['type' => 'file', 'class' => 'form-control', 'label' => false, 'accept' => 'image/png,image/jpeg']) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Registar'), ['class' => 'btn btn-primary', 'id' => 'add']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('casinoAdd') ?>