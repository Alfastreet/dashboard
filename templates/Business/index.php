<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines[]|\Cake\Collection\CollectionInterface $business
 */
?>
<div class="business index content">
    <?= $this->Html->link(__('New Busines'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Business') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('nit') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('owner_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($business as $busines): ?>
                <tr>
                    <td><?= $this->Number->format($busines->id) ?></td>
                    <td><?= h($busines->name) ?></td>
                    <td><?= $this->Number->format($busines->nit) ?></td>
                    <td><?= $this->Number->format($busines->phone) ?></td>
                    <td><?= h($busines->address) ?></td>
                    <td><?= h($busines->email) ?></td>
                    <td><?= $this->Number->format($busines->owner_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $busines->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $busines->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $busines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $busines->id)]) ?>
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
