<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agreement $agreement
 * @var \Cake\Collection\CollectionInterface|string[] $machines
 * @var \Cake\Collection\CollectionInterface|string[] $agreementstatuses
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3 class="card-title mb-6"><?= __('Generar Nuevo Acuerdo Comercial') ?></h3>
                    <p class="small text-medium-emphasis">Creacion de un nuevo contrato o Acuerdo comercial con el cliente</p>
                </div>
                <div class="btn-toolbar d-none d-sm-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Ver todos los Contratos'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
                <div class="d-block d-sm-none">
                    <a href="/agreements" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-caret-left"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="row d-block d-sm-flex">
                <div class="col">
                    <div class="column-responsive column-80">
                        <div class="agreements form content">
                            <?= $this->Form->create($agreement, ['class' => 'row g-3 needs-validation']) ?>
                            <div class="mb-3">
                                <h4 class="text-center mb-3"><?= __('Datos Basicos del Contrato') ?></h4>
                                <div class="row d-block d-sm-flex">
                                    <div class="col mb-3">
                                        <?= $this->Form->control('business_id', ['class' => 'form-select', 'id' => 'business', 'label' => false, 'empty' => ['' => 'Empresa Dirigida']]) ?>
                                    </div>
                                    <div class="col mb-3">
                                        <?= $this->Form->control('client_id', ['class' => 'form-select', 'id' => 'client', 'label' => false, 'empty' => ['' => 'Representante Legal']]) ?>
                                    </div>
                                    <div class="col mb-3">
                                        <?= $this->Form->control('machine_id', ['class' => 'form-select', 'id' => 'machine', 'label' => false, 'empty' => ['0' => 'Maquina']]) ?>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none;" id="dataAdd">
                                <div class="mb-3"">
                                <h4 class=" text-center mb-3"><?= __('Datos Adicionales a la Venta') ?></h4>
                                    <div class="row d-block d-sm-flex ">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><?= __('$') ?></span>
                                                <?= $this->Form->control('discount', ['type' => 'number', 'class' => 'form-control', 'id' => 'discount', 'label' => false, 'placeholder' => 'Descuento en Dolares']) ?>
                                                <input type="hidden" id="percentValue">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><?= __('$') ?></span>
                                                <?= $this->Form->control('agreementvalue', ['type' => 'number', 'class' => 'form-control', 'id' => 'agreementvalue', 'label' => false, 'placeholder' => 'Valor del Contrato', 'disabled' => 'true']) ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row d-block d-sm-flex">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><?= __('$') ?></span>
                                                <?= $this->Form->control('separation', ['type' => 'number', 'id' => 'separation', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Separación', 'required' => false]) ?>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <?= $this->Form->control('percentinicial', ['type' => 'number', 'id' => 'quoteper', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Cuota inicial (%)', 'max' => '50', 'min' => '0']) ?>
                                                <span class="input-group-text"><?= __('%') ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row d-block d-sm-flex">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><?= __('$') ?></span>
                                                <?= $this->Form->control('quoteini', ['type' => 'number', 'id' => 'iniquote', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Cuota Inicial', 'disabled' => true]) ?>
                                            </div>
                                            <input type="hidden" id="sald">
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <?= $this->Form->control('nquote', ['type' => 'number', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Numero de Cuotas a diferir', 'id' => 'nquote']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-floating">
                                                <?= $this->Form->control('comments', ['class' => 'form-control', 'id' => 'floatingTextarea', 'label' => false, 'placeholder' => 'Comentarios']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= $this->Form->button(__('Generar Contrato'), ['id' => 'anadir', 'type' => 'button', 'class' => 'btn btn-primary']) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h4 class="text-center"><?= __('Resumen del Contrato') ?></h4>
                    <table class="table text-center">
                        <tbody id="resumen">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('agreements') ?>