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
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <div class="column-responsive column-80">
                <div class="business form content">
                    <?= $this->Form->create($busines, ['novalidate' => true, 'class' => 'row g-3 needs-validation']) ?>
                        
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <?= $this->Form->control('owner_id', ['options' => $owner, 'class' =>'form-control', 'placeholder' => 'Razon Social', 'label' => false, 'require' => true]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('name', ['class' =>'form-control', 'placeholder' => 'Razon Social', 'label' => false]) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('nit', ['class' => 'form-control', 'placeholder' => 'Nit', 'label' => false]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('email', ['class' =>'form-control', 'placeholder' => 'Correo Electronico', 'label' => false]) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('phone', ['class' =>'form-control', 'placeholder' => 'Telefono', 'label' => false]) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('address', ['class' =>'form-control', 'placeholder' => 'Direccion', 'label' => false]) ?>
                                </div>
                            </div>
                        </div>
                    <?= $this->Form->button(__('Enviar') , ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>