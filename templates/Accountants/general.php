<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant[]|\Cake\Collection\CollectionInterface $accountants
 */

$totalParticipaciones = 0;
$totalRecaudo = 0;
$dateFormated = $date->toFormattedDateString();
$mes = explode(' ', $dateFormated);

foreach ($totalMes as $l) {
    $totalParticipaciones += $l->totalLiquidation;
}

foreach ($recaudado as $r) {
    $totalRecaudo += $r->totalLiquidation;
}


$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Participaciones']
]);

?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <h2 class="card-title"><?= __('Participaciones Alfastreet') ?></h2>
                <?= $this->Html->link('Nueva Participación', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="d-flex justify-content-between mb-4">
                <div class="border rounded <?= $totalParticipaciones < 0 ? 'text-bg-danger p-3 border-danger text-white' : ($totalParticipaciones == 0 ? 'text-bg-warning p-3 border-warning text-white' : 'text-bg-success p-3 border-success text-white') ?>">
                    <?= h('Total de recaudo esperado en el mes de ' . $mes[0] . ': ' . $this->Number->currency($totalParticipaciones, 'COP')) ?>
                </div>
                <div class="border rounded <?= $totalRecaudo < 0 ? 'text-bg-danger p-3 border-danger text-white' : ($totalRecaudo == 0 ? 'text-bg-warning p-3 border-warning text-white' : 'text-bg-success p-3 border-success text-white') ?> ">
                    <?= h('Recaudo Total a la fecha : ' . $this->Number->currency($totalRecaudo, 'COP')) ?>
                </div>
            </div>
            <div class="table-responsive mb-4">
                <table class="table table-striped table-hover table-sm table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col"><?= h('Cliente') ?></th>
                            <th scope="col"><?= h('Mes de Liquidación') ?></th>
                            <th scope="col"><?= h('Año de Liquidación') ?></th>
                            <th scope="col"><?= h('Total Liquidado') ?></th>
                            <th scope="col"><?= h('Estado') ?></th>
                            <th scope="col"><?= h('Fecha de Facturación') ?></th>
                            <th scope="col"><?= h('Número de Factura') ?></th>
                            <th scope="col"><?= h('Descargar Liquidación') ?></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($liquidations as $liquidation) : ?>
                            <tr class="<?= $liquidation->estatus === 'Pendiente' ? 'table-warning' : '' ?>">
                                <td><?= $liquidation->has('casino') ? h($liquidation->casino->name) : '' ?></td>
                                <td><?= $liquidation->has('month') ? h($liquidation->month->month) : '' ?></td>
                                <td><?= h($liquidation->year) ?></td>
                                <td class="<?= $liquidation->totalLiquidation < 0 ? 'table-danger' : '' ?>"><?= $this->Number->currency($liquidation->totalLiquidation, 'COP') ?></td>
                                <td><?= h($liquidation->estatus) ?></td>
                                <td><?= h($liquidation->dateliquidation->toFormattedDateString()) ?></td>
                                <td><?= $liquidation->nfactura === null ? 'FACTURA NO PAGADA' : $liquidation->nfactura ?></td>
                                <td>
                                    <?= $this->Html->link('Descargar', ['action' => 'pdf', '?' => ['casino' => $liquidation->casino_id]], ['class' => 'btn btn-primary']) ?>
                                </td>
                                <td><?= $liquidation->estatus === 'Liquidado' ? '' : $this->Form->button('Confirmar', ['class' => 'btn btn-success confirmar', 'onclick' => 'confirmed(' . $liquidation->id . ')'])  ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('confirmedParticipations') ?>