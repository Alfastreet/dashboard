<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-none d-sm-block">
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
                <div class="d-block d-sm-none">
                    <a href="/orders" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-caret-left"></use>
                        </svg>
                    </a>
                </div>
                <div class="">

                </div>
                <div class="d-none d-sm-block">
                    <?= $this->Html->link(__('Descargar Orden de Trabajo'), ['action' => 'getpdf', $order->id], ['class' => 'btn btn-success me-md-2']) ?>
                </div>
                <div class="d-block d-sm-none">
                    <a href="/orders/getpdf/<?= $order->id ?>" class="btn btn-success">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="orders view content">
                    <h2 class="text-center card-title"><?= __('Orden de Trabajo # ' . $order->order_id) ?></h2>
                    <input type="hidden" id="orderId" value="<?= $order->id ?>">
                    <div class="row">
                        <div class="col-12 col-sm">
                            <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Tecnico Encargado:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($order->has('user') ? h($order->user->name) : '') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm">
                            <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Dirigido a:') ?></label>
                            <div class="col-sm-10">
                                <?php foreach ($clientFetch as $client) {
                                    if ($order->client_id === $client->id) {
                                        $nameClient = $client->name;
                                    }
                                } ?>
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($nameClient)  ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm">
                            <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Estado de la Orden:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($order->has('orderstatus') ? h($order->orderstatus->status) : '') ?>">
                            </div>
                        </div>
                        <div class="col-12 col-sm">
                            <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Serial de la Maquina:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $order->has('machine') ? h($order->machine->serial) : '' ?>">
                            </div>
                        </div>
                    </div>

                    <?php if ($order->orderstatus_id === 2) :  ?>
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" class="btn btn-success" id="confirmed">
                                        <svg class="nav-icon" width="20" height="20">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-check"></use>
                                        </svg>
                                        <?= __('Confirmar', ['class' => 'd-block d-sm-none']) ?>
                                        <?= __('', ['class' => 'd-none d-sm-block']) ?>
                                    </button>
                                    <button type="button" class="btn btn-danger" id="canceled">
                                        <svg class="nav-icon" width="20" height="20">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-x"></use>
                                        </svg>
                                        <?= __('Cancelar', ['class' => 'd-block d-sm-none']) ?>
                                        <?= __('', ['class' => 'd-none d-sm-block']) ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($order->comments !== '') : ?>
                        <div class="row">
                            <div class="col-12 col-sm">
                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Comentarios:') ?></label>
                                <div class="col-sm-10">
                                    <p class="text-center"><?= h($order->comments) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
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
                <table class="table table-responsive table-striped table-hover table-bordered text-center" id="myTable" style="width:100%">
                    <thead>
                        <tr>
                            <th><?= __('Producto') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Moneda') ?></th>
                            <th><?= __('Valor') ?></th>
                        </tr>
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
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0 text-center"><?= __('Comentarios de la Cotizacion') ?></h3>
                    <p class="text-emphasis">&nbsp;</p>
                </div>
            </div>
            <p class="text-center"><?= $quotes->comments ?></p>
        </div>
    </div>
</div>

<?= $this->Html->script('confirmedOrders') ?>