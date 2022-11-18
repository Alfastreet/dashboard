<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Registrar Empresa') ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-block d-md-none">
                    <a href="/business" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-caret-left"></use>
                        </svg>
                    </a>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <div class="column-responsive column-80">
                <div class="business form content">
                    <?= $this->Form->create($busines, ['class' => 'row g-3 needs-validation']) ?>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-5 ">
                                <?= $this->Form->control('owner_id', ['options' => $owner, 'class' => 'form-control', 'id' => 'owner', 'label' => false, 'require' => true, 'empty' => ['0' => 'Dueño de la Empresa']]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Razon Social', 'label' => false, 'id' => 'name']) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('nit', ['class' => 'form-control', 'placeholder' => 'Nit', 'label' => false, 'id' => 'nit']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Correo Electronico', 'label' => false, 'id' => 'email']) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('phone', ['class' => 'form-control', 'placeholder' => 'Telefono', 'label' => false, 'id' => 'phone']) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('address', ['class' => 'form-control', 'placeholder' => 'Direccion', 'label' => false, 'id' => 'address']) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Registrar'), ['class' => 'btn btn-primary', 'id' => 'add']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Html->script('alertsAdd') ?>