<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
?>
<div class="quotes index content">
    <?= $this->Html->link(__('New Quote'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Quotes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('business_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('estatus_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotes as $quote): ?>
                <tr>
                    <td><?= $this->Number->format($quote->id) ?></td>
                    <td><?= $quote->has('user') ? $this->Html->link($quote->user->name, ['controller' => 'Users', 'action' => 'view', $quote->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($quote->business_id) ?></td>
                    <td><?= h($quote->date) ?></td>
                    <td><?= h($quote->total) ?></td>
                    <td><?= $this->Number->format($quote->estatus_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quote->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quote->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quote->id)]) ?>
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
