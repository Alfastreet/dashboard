<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Liquidation> $liquidations
 */
?>
<div class="liquidations index content">
    <?= $this->Html->link(__('New Liquidation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Liquidations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('casino_id') ?></th>
                    <th><?= $this->Paginator->sort('machine_id') ?></th>
                    <th><?= $this->Paginator->sort('month_id') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('cashin') ?></th>
                    <th><?= $this->Paginator->sort('cashout') ?></th>
                    <th><?= $this->Paginator->sort('bet') ?></th>
                    <th><?= $this->Paginator->sort('win') ?></th>
                    <th><?= $this->Paginator->sort('profit') ?></th>
                    <th><?= $this->Paginator->sort('jackpot') ?></th>
                    <th><?= $this->Paginator->sort('games') ?></th>
                    <th><?= $this->Paginator->sort('coljuegos') ?></th>
                    <th><?= $this->Paginator->sort('admin') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('alfastreet') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($liquidations as $liquidation): ?>
                <tr>
                    <td><?= $this->Number->format($liquidation->id) ?></td>
                    <td><?= $liquidation->has('casino') ? $this->Html->link($liquidation->casino->name, ['controller' => 'Casinos', 'action' => 'view', $liquidation->casino->id]) : '' ?></td>
                    <td><?= $liquidation->has('machine') ? $this->Html->link($liquidation->machine->name, ['controller' => 'Machines', 'action' => 'view', $liquidation->machine->id]) : '' ?></td>
                    <td><?= $liquidation->has('month') ? $this->Html->link($liquidation->month->id, ['controller' => 'Months', 'action' => 'view', $liquidation->month->id]) : '' ?></td>
                    <td><?= $this->Number->format($liquidation->year) ?></td>
                    <td><?= h($liquidation->cashin) ?></td>
                    <td><?= h($liquidation->cashout) ?></td>
                    <td><?= h($liquidation->bet) ?></td>
                    <td><?= h($liquidation->win) ?></td>
                    <td><?= h($liquidation->profit) ?></td>
                    <td><?= h($liquidation->jackpot) ?></td>
                    <td><?= h($liquidation->games) ?></td>
                    <td><?= h($liquidation->coljuegos) ?></td>
                    <td><?= h($liquidation->admin) ?></td>
                    <td><?= h($liquidation->total) ?></td>
                    <td><?= h($liquidation->alfastreet) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $liquidation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $liquidation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $liquidation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $liquidation->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
