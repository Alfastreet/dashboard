<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 */
?>
<div class="payments index content">
    <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Payments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('agreement_id') ?></th>
                    <th><?= $this->Paginator->sort('paymentquote') ?></th>
                    <th><?= $this->Paginator->sort('valuequote') ?></th>
                    <th><?= $this->Paginator->sort('datepayment') ?></th>
                    <th><?= $this->Paginator->sort('destiny') ?></th>
                    <th><?= $this->Paginator->sort('bank') ?></th>
                    <th><?= $this->Paginator->sort('cop') ?></th>
                    <th><?= $this->Paginator->sort('trm') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= $this->Number->format($payment->id) ?></td>
                    <td><?= $payment->has('agreement') ? $this->Html->link($payment->agreement->id, ['controller' => 'Agreements', 'action' => 'view', $payment->agreement->id]) : '' ?></td>
                    <td><?= h($payment->paymentquote) ?></td>
                    <td><?= h($payment->valuequote) ?></td>
                    <td><?= h($payment->datepayment) ?></td>
                    <td><?= h($payment->destiny) ?></td>
                    <td><?= h($payment->bank) ?></td>
                    <td><?= h($payment->cop) ?></td>
                    <td><?= h($payment->trm) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
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
