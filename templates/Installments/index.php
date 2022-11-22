<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Installment> $installments
 */
$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Actas de entrega - Ordenes de Salida']
]);
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title mb-4"><?= __('Actas de Entrega - Ordenes de Salida') ?></h2>
            <div class="table-responsive">
                <table class="display table table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th><?= __('Cotizacion') ?></th>
                            <th><?= __('Dia de Aprobacion de Salida') ?></th>
                            <th><?= __('Numero de Guia') ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($installments as $installment) : ?>
                            <tr>
                                <td><?= $installment->has('quote') ? $this->Html->link($installment->quote->id, ['controller' => 'Quotes', 'action' => 'view', $installment->quote->id]) : '' ?></td>
                                <td><?= h($installment->dateinstallment) ?></td>
                                <td><?= h($installment->guide) ?></td>
                                <td class="actions">
                                    <?= $installment->guide === '' ? $this->Form->button('Ingresar Guia', ['class' => 'btn btn-success', 'type' => 'button']) : '' ?>
                                    <?= $this->Html->link('Ver Orden', ['action' => 'add', '?' => ['quoteid' => $installment->quote->id]], ['class' => 'btn btn-primary']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>