<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Cotizaciones', 'url' => ['controller' => 'Quotes', 'action' => 'index']],
    ['title' => 'Cotizacion # ' . $quote->id]
]);
?>
<input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
<div class="col-12">
    <div class="mb-3">
        <aside class="column">
            <div class="d-flex justify-content-between">
                <div class="d-none d-lg-block">
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
                <div class="d-block d-lg-none">
                    <a href="/quotes" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-caret-left"></use>
                        </svg>
                    </a>
                </div>
                <div class="d-none d-lg-block">
                    <?php if ($isAdmin) : ?>
                        <?= $this->Html->link(__('Generar nueva Cotización'), ['action' => 'add'], ['class' => 'btn btn-primary me-md-2']); ?>
                        <?php if ($quote->estatus_id === 1 ) : ?>
                            <?= $installments === NULL ? $this->Html->link('Generar Acta de Entrega', ['controller' => 'installments', 'action' => 'add', '?' => ['quoteid' => $quote->id]], ['class' => 'btn btn-info']) : ''; ?>
                        <?php endif; ?>
                    <?php endif ?>
                    <?= $this->Html->link(__('Descargar Cotización'), ['action' => 'getpdf', $quote->id], ['class' => 'btn btn-success me-md-2']) ?>
                    <?php if ($orders !== null) : echo $this->Html->link(__('Ver Orden de trabajo'), ['controller' => 'orders', 'action' => 'view', $orders->id], ['class' => 'btn btn-info me-md-2']);
                    endif; ?>
                </div>
                <div class="d-block d-lg-none">
                    <a href="/quotes/add" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-note-add"></use>
                        </svg>
                    </a>
                    <a href="/quotes/getpdf/<?= $quote->id ?>" class="btn btn-success">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                        </svg>
                    </a>
                    <?php if ($orders !== null) : ?>
                        <a href="/orders/view/<?= $orders->id ?>" class="btn btn-info">
                            <svg class="icon">
                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-tag"></use>
                            </svg>
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </aside>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="text-center card-title"><?= __('Cotización #' . $quote->id) ?></h2>
            <input type="hidden" value="<?= $quote->id ?>" id="quoteid">
            <h6 class="card-subtitle mb-2 text-muted"><?= __('Fecha de Cotización: ' . date('d M Y', strtotime($quote->date))) ?></h6>
            <div class="row">
                <div class="col-12 col-sm">
                    <div class="column-responsive column-80">
                        <div class="quote view content">
                            <div class="mb-3">
                                <div class="mb-12">
                                    <div class="row">
                                        <div class="col-12 col-lg">
                                            <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Usuario encargado de la Cotización:') ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($quote->has('user') ? h($quote->user->name . ' ' . $quote->user->lastName) : '') ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg">
                                            <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Dirigida a:') ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($quote->has('busines') ? h($quote->busines->name) : '') ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h2 class="text-center"><?= __('Totales') ?></h2>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-lg">
                                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Total en Dolares ($)') ?></label>
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->Number->currency($quote->totalUSD, 'USD') ?>">
                                            </div>
                                            <div class="col-12 col-lg">
                                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Total en Euros ($)') ?></label>
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->Number->currency($quote->totalEUR, 'EUR') ?>">
                                            </div>
                                            <div class="col-12 col-lg">
                                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Total en Pesos ($)') ?></label>
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->Number->currency($quote->totalCOP, 'COP') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-12 col-lg">
                                <label for="staticEmail" class="col-sm-4 col-form-label fw-bold"><?= __('Estado:') ?></label>
                                <div class="col-sm-6">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($quote->has('status') ? h($quote->status->status) : '') ?>">
                                </div>
                            </div>
                            <div class="col-12 col-lg">
                                <!-- Si estado es 1 -->
                                <?php if ($quote->estatus_id === 1) : ?>
                                    <label for="staticEmail" class="col-sm-10 col-form-label fw-bold"><?= __('Numero de Factura:') ?></label>
                                    <?php foreach ($quotestatus as $qu) :
                                        if ($quote->id === $qu->quote_id) {
                                            $description = $qu->invoice;
                                        }
                                    endforeach ?>
                                    <p><?= $description ?></p>
                                <?php endif; ?>
                                <!-- Fin estado 1 -->
                                <!-- Si estado es Pendiente -->
                                <?php if ($quote->estatus_id === 2) : ?>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn btn-success" id="confirmed">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-check"></use>
                                            </svg> <?= __('Confirmar') ?>
                                        </button>
                                        <button type="button" class="btn btn-danger" id="canceled">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-x"></use>
                                            </svg><?= __('No Apta') ?>
                                        </button>
                                    </div>
                                <?php endif ?>
                                <!-- Fin estado 2 -->
                                <!-- Si estado es 3 -->
                                <?php if ($quote->estatus_id === 3) : ?>
                                    <label for="staticEmail" class="col-sm-10 col-form-label fw-bold"><?= __('Motivo:') ?></label>
                                    <?php foreach ($quotestatus as $qu) :
                                        if ($quote->id === $qu->quote_id) {
                                            $comment = $qu->comment;
                                        }
                                    endforeach ?>
                                    <p><?= $comment ?></p>
                                <?php endif ?>
                                <!-- Fin estado 3 -->
                            </div>
                        </div>
                        <h4 class="text-center card-title"><?= __('Comentarios') ?></h4>
                        <div class="col-12 col-sm">
                            <p class="text-center"><?= $quote->comments ?></p>
                        </div>
                    </div>
                </div>
                <?php if ($orders === null) :
                    if ($quote->estatus_id === 1) {
                        echo $this->Html->link(
                            __('Generar Orden de Trabajo'),
                            [
                                'controller' => 'orders',
                                'action' => 'add',
                                '?' => [
                                    'quoteId' => $quote->id,
                                    'clientId' => $quote->business_id
                                ]
                            ],
                            ['class' => 'btn btn-info me-md-2']
                        );
                    }
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Detalles de la cotización -->

<div class="col-12">
    <div class="mb-3">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="text-center card-title"><?= __('Detalles de la Cotización') ?></h2>
            </div>
            <?php if (!empty($quote->detailsquotes)) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-responsive text-center table-hover">
                        <tr>
                            <th><?= __('Producto') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Moneda') ?></th>
                            <th><?= __('Valor') ?></th>
                        </tr>
                        <?php foreach ($quote->detailsquotes as $detailsquotes) :
                            foreach ($products as $product) {
                                if ($detailsquotes->product_id == $product->id) {
                                    $nameProduct = $product->name;
                                }
                                foreach ($money as $m) {
                                    if ($detailsquotes->money_id == $m->id) {
                                        $moneyName = $m->name;
                                    }
                                }
                            }
                        ?>
                            <tr>
                                <td><?= h($nameProduct) ?></td>
                                <td><?= h($detailsquotes->amount) ?></td>
                                <td><?= h($moneyName) ?></td>
                                <td><?= $this->Number->currency($detailsquotes->value, 'USD') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->Html->script('quotestatus') ?>