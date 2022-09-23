<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote[]|\Cake\Collection\CollectionInterface $quotes
 */
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Cotizaciones') ?></h3>
                    <p class="small text-medium-emphasis">Total de cotizaciones registrados a la fecha</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Generar una Cotización'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-responsive text-center table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id', __('#')) ?></th>
                            <th><?= __('Empresa Dirigida') ?></th>
                            <th><?= __('Fecha de Creación') ?></th>
                            <th><?= __('Total en Dolares') ?></th>
                            <th><?= __('Total en Euros') ?></th>
                            <th><?= __('Total en Pesos') ?></th>
                            <th><?= __('Estado') ?></th>
                            <th><?= __('') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($quotes as $quote) : ?>

                            <tr>
                                <td><?= $this->Number->format($quote->id) ?></td>
                                <td><?= $quote->has('busines') ? h($quote->busines->name) : '' ?></td>
                                <td><?= h($quote->date) ?></td>
                                <td><?= __('$' . number_format($quote->totalUSD)) ?></td>
                                <td><?= __('€' . number_format($quote->totalEUR)) ?></td>
                                <td><?= __('$' . number_format($quote->totalCOP)) ?></td>
                                <td><?= $quote->has('status') ? h($quote->status->status) : '' ?></td>
                                <td class="actions">
                                    <div class="btn-group btn-group-toggle mx-3">
                                        <a class="nav-link nav-group-toggle" href="/quotes/view/<?= $quote->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/quotes/getpdf/<?= $quote->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>