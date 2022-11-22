<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Installment $installment
 * @var \Cake\Collection\CollectionInterface|string[] $quotes
 */
$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Actas de entrega - Ordenes de Salida', 'url' => ['controller' => 'installments', 'action' => 'index' ] ],
    ['title' => 'Acta de entrega # '.$quotes->id]
]);

?>
<input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <h2 class="card-title"><?= __('Resumen del Acta de entrega, Cotizacion #' . $quotes->id) ?></h2>
                <?= $exist === NULL ? $this->Form->button('Crear Acta de entrega', ['class' => 'btn btn-success', 'id' => 'pdf']) : $this->Html->link('Descargar PDF', ['action' => 'pdf', '?' => ['quoteid' => $quotes->id]], ['class' => 'btn btn-success']) ?>
            </div>
            <div class="table-responsive">
                <h3 class="text-center mb-4"><?= __('Productos') ?></h3>
                <input type="hidden" id="quoteid" value="<?= $quotes->id ?>">
                <table class="table table-bordered table-striped table-responsive text-center table-hover">
                    <thead>
                        <tr>
                            <th><?= __('Serial') ?></th>
                            <th><?= __('Item') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Moneda') ?></th>
                            <th><?= __('Valor') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($itemsQuote as $item) : ?>
                            <tr>
                                <td><?= $item->has('part') ? h($item->part->serial) : '' ?></td>
                                <td><?= $item->has('part') ? h($item->part->name) : '' ?></td>
                                <td><?= $this->Number->format($item->amount) ?></td>
                                <td><?= $item->has('money') ? h($item->money->name) : '' ?></td>
                                <td><?= $this->Number->currency($item->value, $item->has('money') ? h($item->money->shortcode) : 'USD') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <h3 class="text-center mb-4"><?= __('Destinatario') ?></h3>
            <div class="row">
                <div class="col col-lg">
                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Dirigido a:') ?></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($receiver->name) ?>">
                    </div>
                </div>
                <div class="col col-lg">
                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Direccion:') ?></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($receiver->address) ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg">
                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Numero de Contacto:') ?></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($receiver->phone) ?>">
                    </div>
                </div>
                <div class="col col-lg">
                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Correo electronico:') ?></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($receiver->email) ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('installments') ?>