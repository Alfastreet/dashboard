<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clientposition[]|\Cake\Collection\CollectionInterface $clientposition
 */
?>
<div class="clientposition index content">
    <?= $this->Html->link(__('New Clientposition'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Clientposition') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('position') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientposition as $clientposition): ?>
                <tr>
                    <td><?= $this->Number->format($clientposition->id) ?></td>
                    <td><?= h($clientposition->position) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $clientposition->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientposition->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientposition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientposition->id)]) ?>
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
