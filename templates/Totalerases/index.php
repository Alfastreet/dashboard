<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Totalerase> $totalerases
 */
?>
<div class="totalerases index content">
    <?= $this->Html->link(__('New Totalerase'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Totalerases') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('casino_id') ?></th>
                    <th><?= $this->Paginator->sort('month_id') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($totalerases as $totalerase): ?>
                <tr>
                    <td><?= $this->Number->format($totalerase->id) ?></td>
                    <td><?= $totalerase->has('casino') ? $this->Html->link($totalerase->casino->name, ['controller' => 'Casinos', 'action' => 'view', $totalerase->casino->id]) : '' ?></td>
                    <td><?= $totalerase->has('month') ? $this->Html->link($totalerase->month->id, ['controller' => 'Months', 'action' => 'view', $totalerase->month->id]) : '' ?></td>
                    <td><?= h($totalerase->year) ?></td>
                    <td><?= h($totalerase->total) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $totalerase->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $totalerase->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $totalerase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $totalerase->id)]) ?>
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
