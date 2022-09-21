<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tmpdetailsquote[]|\Cake\Collection\CollectionInterface $tmpdetailsquote
 */
?>
<div class="tmpdetailsquote index content">
    <?= $this->Html->link(__('New Tmpdetailsquote'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Tmpdetailsquote') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('typeProduct_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('amount') ?></th>
                    <th><?= $this->Paginator->sort('value') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tmpdetailsquote as $tmpdetailsquote): ?>
                <tr>
                    <td><?= $this->Number->format($tmpdetailsquote->id) ?></td>
                    <td><?= $this->Number->format($tmpdetailsquote->typeProduct_id) ?></td>
                    <td><?= $this->Number->format($tmpdetailsquote->product_id) ?></td>
                    <td><?= $this->Number->format($tmpdetailsquote->amount) ?></td>
                    <td><?= h($tmpdetailsquote->value) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $tmpdetailsquote->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tmpdetailsquote->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tmpdetailsquote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tmpdetailsquote->id)]) ?>
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
