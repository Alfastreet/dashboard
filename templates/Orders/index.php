<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>
<div class="col-12">
    <div class="card mb-3">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Ordenes de Trabajo') ?></h3>
                    <p class="small text-medium-emphasis">Ordenes de trabajo Generadas</p>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-responsive text-center table-hover">
                    <thead>
                        <tr>
                            <th><?= __('Cotizacion #') ?></th>
                            <th><?= __('Tecnico Encargado') ?></th>
                            <th><?= __('Cliente') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr class="class="<?= $order->orderstatus_id === 1 ? 'table-success' : ($order->orderstatus_id === 3  ? 'table-danger' : '')  ?>">
                                <td><?= $order->has('quote') ? $this->Html->link($order->quote->id, ['controller' => 'Quotes', 'action' => 'view', $order->quote->id]) : '' ?></td>
                                <td><?= $order->has('user') ? $this->Html->link($order->user->name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                                <td><?= $this->Number->format($order->client_id) ?></td>
                                <td><?= $order->has('orderstatus') ? h($order->orderstatus->status) : '' ?></td>
                                <td class="actions">
                                <div class="btn-group btn-group-toggle mx-3">
                                        <a class="nav-link nav-group-toggle" href="/orders/view/<?= $order->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/orders/getpdf/<?= $order->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>