<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="quotes index content">
    <?= $this->Html->link(__('New Quote'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Quotes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Empresa Dirigida') ?></th>
                    <th><?= $this->Paginator->sort('Creada') ?></th>
                    <th><?= $this->Paginator->sort('Total en Dolares') ?></th>
                    <th><?= $this->Paginator->sort('Total en Euros') ?></th>
                    <th><?= $this->Paginator->sort('Total en Pesos') ?></th>
                    <th><?= $this->Paginator->sort('Estado') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotes as $quote): ?>

                <tr>
                    <td><?= $this->Number->format($quote->id) ?></td>
                    <td><?= h($quote->business_id) ?></td>
                    <td><?= h($quote->date) ?></td>
                    <td><?= h($quote->totalUSD) ?></td>
                    <td><?= h($quote->totalEUR) ?></td>
                    <td><?= h($quote->totalCOP) ?></td>
                    <td><?= $this->Number->format($quote->estatus_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $quote->id]) ?>
                        <!-- <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quote->id]) ?> -->
                        <?= $this->Html->link(__('Descargar'), ['action' => 'getpdf', $quote->id]) ?>
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
