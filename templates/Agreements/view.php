<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agreement $agreement
 */
?>
<div class="col-12">
    <div class="mb-4 card">
        <div class="card-body">
            <div class="mb-6">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                        <input type="hidden" id="id" value="<?= $agreement->id ?>">
                    </div>
                    <?php if ($isAdmin) : ?>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <?php if ($agreement->datesigned === NULL) : ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $agreement->id], ['class' => 'btn btn-primary me-md-2']) ?>
                                <?php if ($agreement->agreementstatus_id === 2) : ?>
                                    <button type="button" class="btn btn-success" id="confirmed">
                                        <svg class="nav-icon" width="20" height="20">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-check"></use>
                                        </svg> <?= __('Firmar') ?>
                                    </button>
                                <?php endif ?>
                            <?php endif; ?>
                            <?= $agreement->datesigned !== NULL ? $this->Html->link(__('Ver Cartera'), ['action' => 'edit', $agreement->id], ['class' => 'btn btn-info me-md-2']) : '' ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <h2 class="card-title text-center mb-4"><?= __('Acuerdo Comercial N° ' . date('y-') . $agreement->id) ?></h2>
            <h3 class="card-subtitle text-center mb-4"><?= $agreement->has('Client') ? $agreement->client->name : '' ?></h3>
            <div class="mb-3">
                <div class="row">
                    <div class="col">
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Serial de la Maquina:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $agreement->has('machine') ? ($agreement->machine->name) : '' ?>">
                        </div>
                        <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Diferido a :') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= __($agreement->nquote . ' Cuotas') ?>">
                            <input type="hidden" id="quotes" value="<?= $agreement->nquote ?>">
                        </div>
                        <?php if ($agreement->datesigned !== null) : ?>
                            <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Fecha de firmado del Contrato :') ?></label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= __($agreement->datesigned) ?>">
                            </div>
                        <?php endif ?>
                        <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Comentarios :') ?></label>
                        <blockquote>
                            <?= $this->Text->autoParagraph(h($agreement->comments)); ?>
                        </blockquote>
                    </div>
                    <div class="col">
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Valor de la maquina:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="machine" value="<?= $agreement->has('machine') ? $this->Number->currency($agreement->machine->value, 'USD') : '' ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Valor del Contrato:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="agreementvalue" value="<?= $this->Number->currency($agreement->agreementvalue, 'USD')  ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Valor de las coutas:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="quotevalue" value="<?= $this->Number->currency($agreement->quotevalue, 'USD')  ?>">
                            <input type="hidden" id="quotevalue" value="<?= $agreement->quotevalue ?>">
                        </div>
                    </div>
                    <div class="col">
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Cuota inicial:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->Number->currency($agreement->quoteini, 'USD')  ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Descuento:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->Number->currency($agreement->discount, 'USD')  ?>">
                        </div>
                        <?php if ($agreement->separation > 0) : ?>
                            <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Pago por separacion:') ?></label>
                            <div class="col-sm-4">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->Number->currency($agreement->separation, 'USD')  ?>">
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-6">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title text-center"><?= __('Datos del Cliente') ?></h2>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item ">
                                    <p class="fw-bolder"><?= __('Cliente: ') ?></p>
                                </li>
                                <li class="list-group-item ">
                                    <p class="fw-bolder"><?= __('Numero de Contacto: ') ?></p>
                                </li>
                                <li class="list-group-item ">
                                    <p class="fw-bolder"><?= __('Correo electronico: ') ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p><?= h($client->name) ?></p>
                                </li>
                                <li class="list-group-item">
                                    <p><?= h($client->phone) ?></p>
                                </li>
                                <li class="list-group-item">
                                    <p><?= h($client->email) ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title text-center"><?= __('Ficha Tecninca de la maquina') ?></h2>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item ">
                                    <p class="fw-bolder"><?= __('Serial de la maquina: ') ?></p>
                                </li>
                                <li class="list-group-item ">
                                    <p class="fw-bolder"><?= __('Fabricante: ') ?></p>
                                </li>
                                <li class="list-group-item ">
                                    <p class="fw-bolder"><?= __('Modelo: ') ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p><?= h($machines->serial) ?></p>
                                </li>
                                <li class="list-group-item">
                                    <p><?= h($machines->has('maker') ? $machines->maker->name : '') ?></p>
                                </li>
                                <li class="list-group-item">
                                    <p><?= h($machines->has('model') ? $machines->model->name : '') ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('firmar') ?>