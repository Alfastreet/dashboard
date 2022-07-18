<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino[]|\Cake\Collection\CollectionInterface $casinos
 */
?>
<div class="casinos index content">
    <?= $this->Html->link(__('New Casino'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Casinos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('city_id') ?></th>
                    <th><?= $this->Paginator->sort('state_id') ?></th>
                    <th><?= $this->Paginator->sort('owner_id') ?></th>
                    <th><?= $this->Paginator->sort('company_id') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($casinos as $casino): ?>
                <tr>
                    <td><?= $this->Number->format($casino->id) ?></td>
                    <td><?= h($casino->name) ?></td>
                    <td><?= $this->Number->format($casino->phone) ?></td>
                    <td><?= h($casino->address) ?></td>
                    <td><?= $this->Number->format($casino->city_id) ?></td>
                    <td><?= $this->Number->format($casino->state_id) ?></td>
                    <td><?= $this->Number->format($casino->owner_id) ?></td>
                    <td><?= $this->Number->format($casino->company_id) ?></td>
                    <td><?= h($casino->image) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $casino->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $casino->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $casino->id], ['confirm' => __('Are you sure you want to delete # {0}?', $casino->id)]) ?>
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
