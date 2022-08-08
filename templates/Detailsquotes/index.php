<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailsquote[]|\Cake\Collection\CollectionInterface $detailsquotes
 */
?>
<div class="detailsquotes index content">
    <?= $this->Html->link(__('New Detailsquote'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Detailsquotes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('quote_id') ?></th>
                    <th><?= $this->Paginator->sort('typeProduct_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('money_id') ?></th>
                    <th><?= $this->Paginator->sort('value') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detailsquotes as $detailsquote): ?>
                <tr>
                    <td><?= $this->Number->format($detailsquote->id) ?></td>
                    <td><?= $detailsquote->has('quote') ? $this->Html->link($detailsquote->quote->id, ['controller' => 'Quotes', 'action' => 'view', $detailsquote->quote->id]) : '' ?></td>
                    <td><?= $this->Number->format($detailsquote->typeProduct_id) ?></td>
                    <td><?= $this->Number->format($detailsquote->product_id) ?></td>
                    <td><?= $this->Number->format($detailsquote->amount) ?></td>
                    <td><?= $this->Number->format($detailsquote->money_id) ?></td>
                    <td><?= h($detailsquote->value) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $detailsquote->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $detailsquote->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $detailsquote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $detailsquote->id)]) ?>
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
