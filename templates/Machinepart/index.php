<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machinepart[]|\Cake\Collection\CollectionInterface $machinepart
 */
?>
<div class="machinepart index content">
    <?= $this->Html->link(__('New Machinepart'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Machinepart') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('machine_id') ?></th>
                    <th><?= $this->Paginator->sort('part_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($machinepart as $machinepart): ?>
                <tr>
                    <td><?= $this->Number->format($machinepart->id) ?></td>
                    <td><?= $machinepart->has('machine') ? $this->Html->link($machinepart->machine->name, ['controller' => 'Machines', 'action' => 'view', $machinepart->machine->id]) : '' ?></td>
                    <td><?= $machinepart->has('part') ? $this->Html->link($machinepart->part->name, ['controller' => 'Parts', 'action' => 'view', $machinepart->part->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $machinepart->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $machinepart->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $machinepart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machinepart->id)]) ?>
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
