<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountantsstatus[]|\Cake\Collection\CollectionInterface $accountantsstatus
 */
?>
<div class="accountantsstatus index content">
    <?= $this->Html->link(__('New Accountantsstatus'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Accountantsstatus') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accountantsstatus as $accountantsstatus): ?>
                <tr>
                    <td><?= $this->Number->format($accountantsstatus->id) ?></td>
                    <td><?= h($accountantsstatus->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $accountantsstatus->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accountantsstatus->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accountantsstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountantsstatus->id)]) ?>
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
