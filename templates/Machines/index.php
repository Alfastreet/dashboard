<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine[]|\Cake\Collection\CollectionInterface $machines
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="machines index content">
    <?= $this->Html->link(__('New Machine'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Machines') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('serial') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('yearModel') ?></th>
                    <th><?= $this->Paginator->sort('model_id') ?></th>
                    <th><?= $this->Paginator->sort('maker_id') ?></th>
                    <th><?= $this->Paginator->sort('warranty') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('height') ?></th>
                    <th><?= $this->Paginator->sort('width') ?></th>
                    <th><?= $this->Paginator->sort('display') ?></th>
                    <th><?= $this->Paginator->sort('dateInstalling') ?></th>
                    <th><?= $this->Paginator->sort('casino_id') ?></th>
                    <th><?= $this->Paginator->sort('owner_id') ?></th>
                    <th><?= $this->Paginator->sort('company_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($machines as $machine): ?>
                <tr>
                    <td><?= $this->Number->format($machine->id) ?></td>
                    <td><?= h($machine->serial) ?></td>
                    <td><?= h($machine->name) ?></td>
                    <td><?= $this->Number->format($machine->yearModel) ?>
                        
                    </td>
                    <td><?= $machine->has('model') ? $this->Html->link($machine->model->name, ['controller' => 'model', 'action' => 'view', $machine->model->id]) : '' ?></td>
                    <td><?= $this->Number->format($machine->maker_id) ?></td>
                    <td><?= h($machine->warranty) ?></td>
                    <td><?= h($machine->image) ?></td>
                    <td><?= h($machine->height) ?></td>
                    <td><?= h($machine->width) ?></td>
                    <td><?= h($machine->display) ?></td>
                    <td><?= h($machine->dateInstalling) ?></td>
                    <td><?= $machine->has('casino') ? $this->Html->link($machine->casino->name, ['controller' => 'Casinos', 'action' => 'view', $machine->casino->id]) : '' ?></td>
                    <td><?= $this->Number->format($machine->owner_id) ?></td>
                    <td><?= $this->Number->format($machine->company_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $machine->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $machine->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $machine->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machine->id)]) ?>
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
