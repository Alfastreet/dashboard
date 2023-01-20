<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Totalaccountant> $totalaccountants
 */
?>
<div class="totalaccountants index content">
    <?= $this->Html->link(__('New Totalaccountant'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Totalaccountants') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('casino_id') ?></th>
                    <th><?= $this->Paginator->sort('machine_id') ?></th>
                    <th><?= $this->Paginator->sort('month_id') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('totalLiquidation') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($totalaccountants as $totalaccountant): ?>
                <tr>
                    <td><?= $this->Number->format($totalaccountant->id) ?></td>
                    <td><?= $totalaccountant->has('casino') ? $this->Html->link($totalaccountant->casino->name, ['controller' => 'Casinos', 'action' => 'view', $totalaccountant->casino->id]) : '' ?></td>
                    <td><?= $totalaccountant->has('machine') ? $this->Html->link($totalaccountant->machine->name, ['controller' => 'Machines', 'action' => 'view', $totalaccountant->machine->id]) : '' ?></td>
                    <td><?= $totalaccountant->has('month') ? $this->Html->link($totalaccountant->month->id, ['controller' => 'Months', 'action' => 'view', $totalaccountant->month->id]) : '' ?></td>
                    <td><?= h($totalaccountant->year) ?></td>
                    <td><?= h($totalaccountant->totalLiquidation) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $totalaccountant->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $totalaccountant->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $totalaccountant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $totalaccountant->id)]) ?>
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

