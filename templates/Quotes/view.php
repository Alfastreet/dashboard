<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 */
?>
<div class="col-12">
    <div class="mb-3">
        <?php include_once __DIR__ . '/layouts/aside.php' ?>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="column-responsive column-80">
                <div class="quote view content">
                    <div class="mb-3">
                        <h2 class="text-center card-title"><?= __('Cotización #' . $quote->id) ?></h2>
                        <h6 class="card-subtitle mb-2 text-muted"><?= __('Fecha de Cotización: ' . date('d M Y', strtotime($quote->date))) ?></h6>
                        <div class="mb-12">
                            <div class="row">
                                <div class="col">
                                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Usuario encargado de la Cotización:') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($quote->has('user') ? h($quote->user->name . ' ' . $quote->user->lastName) : '') ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Dirigida a:') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($quote->has('busines') ? h($quote->busines->name) : '') ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Estado:') ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($quote->has('status') ? h($quote->status->status) : '') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h2 class="text-center"><?= __('Totales') ?></h2>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Total en Dolares ($)') ?></label>
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->Number->currency($quote->totalUSD, 'USD') ?>">
                                    </div>
                                    <div class="col">
                                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Total en Euros ($)') ?></label>
                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->Number->currency($quote->totalEUR, 'EUR') ?>">
                                    </div>
                                    <div class="col">
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
                            <th><?= __('Id') ?></th>
                            <th><?= __('Quote Id') ?></th>
                            <th><?= __('Product Id') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Value') ?></th>
                        </tr>
                        <?php foreach ($quote->detailsquotes as $detailsquotes) : ?>
                            <tr>
                                <td><?= h($detailsquotes->id) ?></td>
                                <td><?= h($detailsquotes->quote_id) ?></td>
                                <td><?= h($detailsquotes->product_id) ?></td>
                                <td><?= h($detailsquotes->amount) ?></td>
                                <td><?= h($detailsquotes->value) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="row">

    <div class="column-responsive column-80">
        <div class="quotes view content">
            <div class="related">
                <h4></h4>

            </div>
        </div>
    </div>
</div>