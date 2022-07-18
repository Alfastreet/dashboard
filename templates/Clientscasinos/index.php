<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clientscasino[]|\Cake\Collection\CollectionInterface $clientscasinos
 */
?>
<div class="clientscasinos index content">
    <?= $this->Html->link(__('New Clientscasino'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Clientscasinos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('casino_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientscasinos as $clientscasino): ?>
                <tr>
                    <td><?= $this->Number->format($clientscasino->id) ?></td>
                    <td><?= $this->Number->format($clientscasino->client_id) ?></td>
                    <td><?= $clientscasino->has('casino') ? $this->Html->link($clientscasino->casino->name, ['controller' => 'Casinos', 'action' => 'view', $clientscasino->casino->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $clientscasino->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientscasino->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientscasino->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientscasino->id)]) ?>
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
