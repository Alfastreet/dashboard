<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $quotes
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $detailsquotes
 * @var \Cake\Collection\CollectionInterface|string[] $parts
 */
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Orden de Trabajo # ' . $this->request->getQuery('quoteId')) ?></h3>
                    <input type="hidden" id="quote_id" value="<?= $this->request->getQuery('quoteId') ?>">
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Ver todas las Ordenes de Trabajo'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="orders form content">
                    <?= $this->Form->create($order, ['class' => 'row g-3 needs-validation']) ?>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Numero de Cotizacion:') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->request->getQuery('quoteId') ?>">
                                </div>
                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Cliente Dirigido:') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $client->name ?>">
                                    <input type="hidden" id="client_id" value="<?= $this->request->getQuery('clientId') ?>">
                                </div>
                            </div>
                            <div class="col">
                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Tecnico Encargado:') ?></label>
                                <div class="col-sm-10">
                                    <?= $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control', 'label' => false, 'id' => 'user', 'empty' => ['0' => 'Seleccione al tecnico encargado'], 'require' => true]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Crear Orden de Trabajo'), ['id' => 'generate', 'type' => 'button', 'class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Resumen de la Orden') ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
            </div>
            <div class="column-responsive column-80">
                <table class="table table-bordered table-striped table-responsive text-center table-hover">
                    <thead>
                        <th><?= __('Producto') ?></th>
                        <th><?= __('Cantidad') ?></th>
                        <th><?= __('Moneda') ?></th>
                        <th><?= __('Valor') ?></th>
                    </thead>
                    <?php foreach ($detailsquotes as $dt) : ?>
                        <?php foreach ($products as $p) {
                            if ($dt->product_id == $p->id) {
                                $nameProduct = $p->name;
                            }
                        }
                        foreach ($money as $m) {
                            if ($dt->money_id == $m->id) {
                                $moneyName = $m->name;
                            }
                        } ?>
                        <tr>
                            <td><?= h($nameProduct) ?></td>
                            <td><?= h($dt->amount) ?></td>
                            <td><?= h($moneyName) ?></td>
                            <td><?= $this->Number->currency($dt->value, 'USD')  ?></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Comentarios de la Cotizacion') ?></h3>
                    <p class="text-emphasis">&nbsp;</p>
                </div>
            </div>
            <p class="text-center"><?= $quotes->comments ?></p>
        </div>
    </div>
</div>

<?= $this->Html->script('orders.js') ?>