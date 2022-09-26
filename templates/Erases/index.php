<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Erase> $erases
 */
?>
<div class="erases index content">
    <?= $this->Html->link(__('New Erase'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Erases') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('machine_id') ?></th>
                    <th><?= $this->Paginator->sort('details_id') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('alfastreet') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('admin') ?></th>
                    <th><?= $this->Paginator->sort('coljuegos') ?></th>
                    <th><?= $this->Paginator->sort('gamesplayed') ?></th>
                    <th><?= $this->Paginator->sort('jackpot') ?></th>
                    <th><?= $this->Paginator->sort('profit') ?></th>
                    <th><?= $this->Paginator->sort('win') ?></th>
                    <th><?= $this->Paginator->sort('bet') ?></th>
                    <th><?= $this->Paginator->sort('cashout') ?></th>
                    <th><?= $this->Paginator->sort('cashin') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('month_id') ?></th>
                    <th><?= $this->Paginator->sort('day_end') ?></th>
                    <th><?= $this->Paginator->sort('day_init') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($erases as $erase): ?>
                <tr>
                    <td><?= $this->Number->format($erase->id) ?></td>
                    <td><?= $erase->has('machine') ? $this->Html->link($erase->machine->name, ['controller' => 'Machines', 'action' => 'view', $erase->machine->id]) : '' ?></td>
                    <td><?= $this->Number->format($erase->details_id) ?></td>
                    <td><?= h($erase->image) ?></td>
                    <td><?= h($erase->alfastreet) ?></td>
                    <td><?= h($erase->total) ?></td>
                    <td><?= h($erase->admin) ?></td>
                    <td><?= h($erase->coljuegos) ?></td>
                    <td><?= h($erase->gamesplayed) ?></td>
                    <td><?= h($erase->jackpot) ?></td>
                    <td><?= h($erase->profit) ?></td>
                    <td><?= h($erase->win) ?></td>
                    <td><?= h($erase->bet) ?></td>
                    <td><?= h($erase->cashout) ?></td>
                    <td><?= h($erase->cashin) ?></td>
                    <td><?= h($erase->year) ?></td>
                    <td><?= $erase->has('month') ? $this->Html->link($erase->month->id, ['controller' => 'Months', 'action' => 'view', $erase->month->id]) : '' ?></td>
                    <td><?= h($erase->day_end) ?></td>
                    <td><?= h($erase->day_init) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $erase->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $erase->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $erase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $erase->id)]) ?>
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
