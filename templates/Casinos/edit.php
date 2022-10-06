<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Editar Datos del Casino') ?></h3>
                    <p>&nbsp;</p>
                </div>
                <div>
                    <?= $this->Form->postLink(
                        __('Borrar'),
                        ['action' => 'delete', $casino->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $casino->id), 'class' => 'btn btn-danger me-md-2']
                    ) ?>
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="casino form content">
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
                                <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Nombre del Casino', 'label' => false]) ?>
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
                                <?= $this->Form->control('image', ['type' => 'file', 'class' => 'form-control', 'label' => false, 'accept' => 'image/png,image/jpeg', 'require' => false]) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>