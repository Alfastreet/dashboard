<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Agreement> $agreements
 */
?>
<div class="agreements index content">
    <?= $this->Html->link(__('New Agreement'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Agreements') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('business_id') ?></th>
                    <th><?= $this->Paginator->sort('machine_id') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('agreementvalue') ?></th>
                    <th><?= $this->Paginator->sort('nquote') ?></th>
                    <th><?= $this->Paginator->sort('quoteini') ?></th>
                    <th><?= $this->Paginator->sort('separation') ?></th>
                    <th><?= $this->Paginator->sort('agreementstatus_id') ?></th>
                    <th><?= $this->Paginator->sort('datesigned') ?></th>
                    <th><?= $this->Paginator->sort('comments') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agreements as $agreement): ?>
                <tr>
                    <td><?= $this->Number->format($agreement->id) ?></td>
                    <td><?= $this->Number->format($agreement->client_id) ?></td>
                    <td><?= $this->Number->format($agreement->business_id) ?></td>
                    <td><?= $agreement->has('machine') ? $this->Html->link($agreement->machine->name, ['controller' => 'Machines', 'action' => 'view', $agreement->machine->id]) : '' ?></td>
                    <td><?= h($agreement->discount) ?></td>
                    <td><?= h($agreement->agreementvalue) ?></td>
                    <td><?= h($agreement->nquote) ?></td>
                    <td><?= h($agreement->quoteini) ?></td>
                    <td><?= h($agreement->separation) ?></td>
                    <td><?= $agreement->has('agreementstatus') ? $this->Html->link($agreement->agreementstatus->Array, ['controller' => 'Agreementstatuses', 'action' => 'view', $agreement->agreementstatus]) : '' ?></td>
                    <td><?= h($agreement->datesigned) ?></td>
                    <td><?= h($agreement->comments) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $agreement->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $agreement->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $agreement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agreement->id)]) ?>
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
