<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \Cake\Collection\CollectionInterface|string[] $agreements
 */

?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <h2 class="card-title"><?= __('Agregar pago para el contrato # ' . $agreements->id) ?></h2>
                <?= $this->Html->link('Volver', ['controller' => 'wallets', 'action' => 'view', $wallet->id], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="column-responsive column-80">
                <div class="payments form content">
                    <?= $this->Form->create($payment) ?>
                    <input type="hidden" id="id" value="<?= $agreements->id ?>">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-4">
                                <?= $this->Form->control('paymentquote', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Numero de Cuota', 'id' => 'nquote', 'required' => true, 'type' => 'number', 'max' => $agreements->nquote, 'min' => 0]) ?>
                            </div>
                            <div class="col-8">
                                <div class="row mb-4">
                                    <div class="col-1" style="padding: 0;">
                                        <span class="input-group-text"><?= __('COP $') ?></span>
                                    </div>
                                    <div class="col-11" style="padding-left: 0;">
                                        <?= $this->Form->control('cop', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Valor a registrar', 'id' => 'valuequote', 'required' => true, 'type' => 'number', 'min' => 0, 'max' => $agreements->quotevalue + 1]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col">
                                <?= $this->Form->control('datepayment', ['class' => 'form-control', 'label' => 'Fecha de recaudo', 'empty' => false, 'id' => 'date']) ?>
                            </div>
                        </div>
                        <div class="row mb-4">
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

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title text-center"><?= __('Seguimiento de pagos del contrato # ' . $agreements->id) ?></h3>
            <div class="table-responsive mt-4">
                <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center">
                    <thead>
                        <tr>
                            <th><?= __('Fecha de Recaudo') ?></th>
                            <th><?= __('Cuota') ?></th>
                            <th><?= __('Valor recaudado USD') ?></th>
                            <th><?= __('TRM') ?></th>
                            <th><?= __('Valor en COP') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($seguimientoPagos as $pagos):?>
                            <tr>
                                <td><?= h($pagos->datepayment) ?></td>
                                <td><?= $this->Number->format($pagos->paymentquote) ?></td>
                                <td><?= $this->Number->currency($pagos->valuequote, 'USD') ?></td>
                                <td><?= $this->Number->currency($pagos->trm, 'USD') ?></td>
                                <td><?= $this->Number->currency($pagos->cop, 'USD') ?></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?= $this->Html->script('payments') ?>