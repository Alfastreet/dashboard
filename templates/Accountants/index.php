<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant[]|\Cake\Collection\CollectionInterface $accountants
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="accountants index content">
    <!-- <?= $this->Html->link(__('New Accountant'), ['action' => 'add'], ['class' => 'button float-right']) ?> -->
    <h3><?= __('Accountants') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('machine_id') ?></th>
                    <th><?= $this->Paginator->sort('casino_id') ?></th>
                    <th><?= $this->Paginator->sort('month') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('total_prof') ?></th>
                    <th><?= $this->Paginator->sort('accountantsstatus_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accountants as $accountant): ?>
                <tr>
                    <td><?= $this->Number->format($accountant->id) ?></td>
                    <td><?= $accountant->has('machine') ? $this->Html->link($accountant->machine->name, ['controller' => 'Machines', 'action' => 'view', $accountant->machine->id]) : '' ?></td>
                    <td><?= $accountant->has('casino') ? $this->Html->link($accountant->casino->name, ['controller' => 'Casinos', 'action' => 'view', $accountant->casino->id]) : '' ?></td>
                    <td><?= $this->Number->format($accountant->month) ?></td>
                    <td><?= $this->Number->format($accountant->year) ?></td>
                    <td><?= h($accountant->total_prof) ?></td>
                    <td><?= $this->Number->format($accountant->accountantsstatus_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $accountant->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $accountant->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $accountant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountant->id)]) ?>
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
