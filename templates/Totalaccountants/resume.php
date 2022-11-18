<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Totalaccountant $totalaccountant
 * @var string[]|\Cake\Collection\CollectionInterface $casinos
 * @var string[]|\Cake\Collection\CollectionInterface $machines
 * @var string[]|\Cake\Collection\CollectionInterface $months
 */
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="text-center card-title"><?= __('Resumen de las participaciones del Cliente: ' . $business->name) ?></h2>
            <div class="table-responsive mt-4">
                <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center" id="">
                    <thead>
                        <tr>
                            <th><?= __('Mes de Liquidacion') ?></th>
                            <th><?= __('Año de Liquidacion') ?></th>
                            <th><?= __('Total Liquidado') ?></th>
                            <th><?= __('') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($totalaccountant as $data) : ?>
                            <tr class="<?= date('d-m-Y') > date('d-m-Y', strtotime($data->dateliquidation. '+ 1 month ')) ? 'table-danger' : ( date('d-m-Y') > date('d-m-Y', strtotime($data->dateliquidation. '+ 5 days')) ? 'table-warning' : '' ) ?>">
                                <td><?= h($data->Month['month']) ?></td>
                                <td><?= h($data->year) ?></td>
                                <td><?= $this->Number->currency($data->totalLiquidation, 'USD') ?></td>
                                <td>
                                    <div class="btn-group btn-group-toggle mx-3">
                                        <button class="btn btn-success" id="status"><?= __('Confirmar Liquidacion') ?></button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>