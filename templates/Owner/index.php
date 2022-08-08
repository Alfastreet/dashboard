<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Owner[]|\Cake\Collection\CollectionInterface $owner
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="owner index content">
    <?= $this->Html->link(__('New Owner'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Owner') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($owner as $owner): ?>
                <tr>
                    <td><?= $this->Number->format($owner->id) ?></td>
                    <td><?= h($owner->name) ?></td>
                    <td><?= $this->Number->format($owner->phone) ?></td>
                    <td><?= h($owner->address) ?></td>
                    <td><?= h($owner->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $owner->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $owner->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $owner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $owner->id)]) ?>
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
