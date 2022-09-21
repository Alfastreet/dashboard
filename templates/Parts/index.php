<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Part[]|\Cake\Collection\CollectionInterface $parts
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="parts index content">
    <?= $this->Html->link(__('Nueva Parte'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Partes y Servicios') ?></h3>
    <div class="table-responsive">
        <table class="table-responsive text-center">
            <thead>
                <tr>
                    <th><?= __('') ?></th>
                    <th><?= $this->Paginator->sort('Serial') ?></th>
                    <th><?= $this->Paginator->sort('Nombre') ?></th>
                    <th><?= $this->Paginator->sort('Moneda') ?></th>
                    <th><?= $this->Paginator->sort('Precio') ?></th>
                    <th><?= $this->Paginator->sort('Cantidad') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parts as $part): ?>
                <tr>
                    <td class="image"><?= $this->Html->image('Parts/'.$part->image, ['class' => 'image-index']) ?></td>
                    <td><?= h($part->serial) ?></td>
                    <td><?= h($part->name) ?></td>
                    <td><?= $part->has('money') ? h($part->money->name) : '' ?></td>
                    <td><?= $this->Number->format($part->value) ?></td>
                    <td><?= $this->Number->format($part->amount) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $part->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $part->id]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $part->id], ['confirm' => __('Are you sure you want to delete # {0}?', $part->id)]) ?>
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
