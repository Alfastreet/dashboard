<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Part[]|\Cake\Collection\CollectionInterface $parts
 */
?>
<div class="parts index content">
    <?= $this->Html->link(__('New Part'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Parts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('serial') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('money_id') ?></th>
                    <th><?= $this->Paginator->sort('value') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parts as $part): ?>
                <tr>
                    <td><?= $this->Number->format($part->id) ?></td>
                    <td><?= h($part->serial) ?></td>
                    <td><?= h($part->name) ?></td>
                    <td><?= $this->Number->format($part->money_id) ?></td>
                    <td><?= $this->Number->format($part->value) ?></td>
                    <td><?= $this->Number->format($part->amount) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $part->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $part->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $part->id], ['confirm' => __('Are you sure you want to delete # {0}?', $part->id)]) ?>
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
