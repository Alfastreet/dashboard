<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Liquidation[]|\Cake\Collection\CollectionInterface $liquidation
 */
?>
<div class="liquidation index content">
    <?= $this->Html->link(__('New Liquidation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Liquidation') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('accountants_id') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('accountantsstatus_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($liquidation as $liquidation): ?>
                <tr>
                    <td><?= $this->Number->format($liquidation->id) ?></td>
                    <td><?= $liquidation->has('accountant') ? $this->Html->link($liquidation->accountant->id, ['controller' => 'Accountants', 'action' => 'view', $liquidation->accountant->id]) : '' ?></td>
                    <td><?= h($liquidation->total) ?></td>
                    <td><?= $this->Number->format($liquidation->accountantsstatus_id) ?></td>
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
