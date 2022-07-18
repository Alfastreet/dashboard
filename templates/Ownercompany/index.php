<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ownercompany[]|\Cake\Collection\CollectionInterface $ownercompany
 */
?>
<div class="ownercompany index content">
    <?= $this->Html->link(__('New Ownercompany'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Ownercompany') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('owner_id') ?></th>
                    <th><?= $this->Paginator->sort('company_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ownercompany as $ownercompany): ?>
                <tr>
                    <td><?= $this->Number->format($ownercompany->id) ?></td>
                    <td><?= $this->Number->format($ownercompany->owner_id) ?></td>
                    <td><?= $this->Number->format($ownercompany->company_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ownercompany->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ownercompany->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ownercompany->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ownercompany->id)]) ?>
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
