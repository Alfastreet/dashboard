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
                <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('quote_id') ?></th>
                            <th><?= $this->Paginator->sort('user_id') ?></th>
                            <th><?= $this->Paginator->sort('detailsquotes_id') ?></th>
                            <th><?= $this->Paginator->sort('parts_id') ?></th>
                            <th><?= $this->Paginator->sort('client_id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td><?= $this->Number->format($order->id) ?></td>
                                <td><?= $order->has('quote') ? $this->Html->link($order->quote->id, ['controller' => 'Quotes', 'action' => 'view', $order->quote->id]) : '' ?></td>
                                <td><?= $order->has('user') ? $this->Html->link($order->user->name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                                <td><?= $order->has('detailsquote') ? $this->Html->link($order->detailsquote->id, ['controller' => 'Detailsquotes', 'action' => 'view', $order->detailsquote->id]) : '' ?></td>
                                <td><?= $order->has('part') ? $this->Html->link($order->part->name, ['controller' => 'Parts', 'action' => 'view', $order->part->id]) : '' ?></td>
                                <td><?= $this->Number->format($order->client_id) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>