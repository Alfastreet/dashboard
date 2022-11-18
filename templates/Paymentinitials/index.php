<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Paymentinitial> $paymentinitials
 */
?>
<div class="paymentinitials index content">
    <?= $this->Html->link(__('New Paymentinitial'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Paymentinitials') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('agreement_id') ?></th>
                    <th><?= $this->Paginator->sort('valuequote') ?></th>
                    <th><?= $this->Paginator->sort('datepayment') ?></th>
                    <th><?= $this->Paginator->sort('trm') ?></th>
                    <th><?= $this->Paginator->sort('cop') ?></th>
                    <th><?= $this->Paginator->sort('destiny') ?></th>
                    <th><?= $this->Paginator->sort('bank') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($paymentinitials as $paymentinitial): ?>
                <tr>
                    <td><?= $this->Number->format($paymentinitial->id) ?></td>
                    <td><?= $paymentinitial->has('agreement') ? $this->Html->link($paymentinitial->agreement->id, ['controller' => 'Agreements', 'action' => 'view', $paymentinitial->agreement->id]) : '' ?></td>
                    <td><?= h($paymentinitial->valuequote) ?></td>
                    <td><?= h($paymentinitial->datepayment) ?></td>
                    <td><?= h($paymentinitial->trm) ?></td>
                    <td><?= h($paymentinitial->cop) ?></td>
                    <td><?= h($paymentinitial->destiny) ?></td>
                    <td><?= h($paymentinitial->bank) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $paymentinitial->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $paymentinitial->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $paymentinitial->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentinitial->id)]) ?>
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
