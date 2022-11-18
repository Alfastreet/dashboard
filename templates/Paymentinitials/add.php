<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paymentinitial $paymentinitial
 * @var \Cake\Collection\CollectionInterface|string[] $agreements
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <h2 class="card-title"><?= __('Agregar Pago cuota inicial para el contrato # ' . $agreements->id) ?></h2>
                <?= $this->Html->link('Volver', ['controller' => 'agreements', 'action' => 'view', $agreements->id], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="column-responsive column-80">
                <div class="payments form content">
                    <?= $this->Form->create($paymentinitial) ?>
                    <input type="hidden" id="id" value="<?= $agreements->id ?>">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-8">
                                <div class="row mb-4">
                                    <div class="col-1" style="padding-right: 0;">
                                        <span class="input-group-text"><?= __('COP $') ?></span>
                                    </div>
                                    <div class="col-11" style="padding-left: 0;">
                                        <?= $this->Form->control('cop', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Valor a registrar', 'id' => 'valuequote', 'required' => true, 'type' => 'number', 'min' => 0,]) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <?= $this->Form->control('datepayment', ['class' => 'form-control', 'label' => 'Fecha de recaudo', 'empty' => false, 'id' => 'date']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col">
                                <?= $this->Form->control('destiny_id', ['class' => 'form-control', 'label' => false,  'id' => 'destiny', 'required' => true, 'empty' => ['0' => 'Empresa Destino del Giro']]) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('bank_id', ['class' => 'form-control', 'label' => false,  'id' => 'bank', 'required' => true, 'empty' => ['0' => 'Banco']]) ?>
                            </div>
                            <div class="col">
                                <?= $this->Form->control('referencepay', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Recibo de Caja', 'id' => 'reference', 'required' => true, 'type' => 'number', 'min' => 0]) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Enviar Pago'), ['class' => 'btn btn-primary', 'id' => 'pay']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('paymentinitial') ?>