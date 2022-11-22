<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Wallet> $wallets
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Cartera General']
]);

?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="text-center card-title"><?= __('Cartera General') ?></h2>
            <div class="wallets index content">
                <div class="table-responsive">
                    <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                        <thead>
                            <tr>
                                <th><?= __('#') ?></th>
                                <th><?= __('Numero de Contrato') ?></th>
                                <th><?= __('Valor del Contrato') ?></th>
                                <th><?= __('Valor Recaudado') ?></th>
                                <th><?= __('Fecha de ultimo Pago') ?></th>
                                <th><?= __('Cuotas en Mora') ?></th>
                                <th><?= __('Valor en Mora') ?></th>
                                <th class="actions"><?= __('') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($wallets as $wallet) : ?>
                                <tr>
                                    <td><?= $this->Number->format($wallet->id) ?></td>
                                    <td><?= $wallet->has('agreement') ? $this->Html->link($wallet->agreement->id, ['controller' => 'Agreements', 'action' => 'view', $wallet->agreement->id]) : '' ?></td>
                                    <td><?= $this->Number->currency($wallet->payment, 'USD') ?></td>
                                    <td><?= $this->Number->currency($wallet->collection, 'USD') ?></td>
                                    <td><?= h($wallet->lastpay) ?></td>
                                    <td><?= h($wallet->quotemora) ?></td>
                                    <td><?= h($wallet->mora) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $wallet->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wallet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wallet->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>