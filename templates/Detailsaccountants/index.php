<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailsaccountant[]|\Cake\Collection\CollectionInterface $detailsaccountants
 */
?>
<div class="detailsaccountants index content">
    <?= $this->Html->link(__('New Detailsaccountant'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detailsaccountants') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('accountants_id') ?></th>
                    <th><?= $this->Paginator->sort('day_init') ?></th>
                    <th><?= $this->Paginator->sort('day_end') ?></th>
                    <th><?= $this->Paginator->sort('month') ?></th>
                    <th><?= $this->Paginator->sort('year') ?></th>
                    <th><?= $this->Paginator->sort('total_init') ?></th>
                    <th><?= $this->Paginator->sort('total_end') ?></th>
                    <th><?= $this->Paginator->sort('profit') ?></th>
                    <th><?= $this->Paginator->sort('coljuegoa') ?></th>
                    <th><?= $this->Paginator->sort('iva') ?></th>
                    <th><?= $this->Paginator->sort('juegos_jug') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detailsaccountants as $detailsaccountant): ?>
                <tr>
                    <td><?= $this->Number->format($detailsaccountant->id) ?></td>
                    <td><?= $detailsaccountant->has('accountant') ? $this->Html->link($detailsaccountant->accountant->id, ['controller' => 'Accountants', 'action' => 'view', $detailsaccountant->accountant->id]) : '' ?></td>
                    <td><?= $this->Number->format($detailsaccountant->day_init) ?></td>
                    <td><?= $this->Number->format($detailsaccountant->day_end) ?></td>
                    <td><?= $this->Number->format($detailsaccountant->month) ?></td>
                    <td><?= $this->Number->format($detailsaccountant->year) ?></td>
                    <td><?= h($detailsaccountant->total_init) ?></td>
                    <td><?= h($detailsaccountant->total_end) ?></td>
                    <td><?= h($detailsaccountant->profit) ?></td>
                    <td><?= h($detailsaccountant->coljuegoa) ?></td>
                    <td><?= h($detailsaccountant->iva) ?></td>
                    <td><?= h($detailsaccountant->juegos_jug) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detailsaccountant->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailsaccountant->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detailsaccountant->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsaccountant->id)]) ?>
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
