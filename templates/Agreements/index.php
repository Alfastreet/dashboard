<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Agreement> $agreements
 */
?>
<div class="col-12">
    <div class="card mb-4 ">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-4">
                <h2 class="card-title text-center"><?= __('Acuerdos Comerciales') ?></h2>
                <?= $this->Html->link('Nuevo Acuerdo Comercial', ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="container mt-4">
                <div class="row">
                    <?php foreach ($agreements as $agreement) :  ?>
                        <div class="col-sm-6 mb-3">
                            <div class="card <?= $agreement->agreementstatus_id === 2 ? 'border-danger' : 'border-success' ?>" style="width: auto;">
                                <div class="card-body <?= $agreement->agreementstatus_id === 2 ? 'text-danger' : 'text-success' ?>">
                                    <h5 class="card-title  text-center"><?= __('Acuerdo Comercial # ' . $agreement->id) ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted text-start mt-2"><?= __('Empresa: ') ?><?= __($agreement->has('busines') ? $agreement->busines->name : '') ?> </h6>
                                    <h6 class="card-subtitle mb-2 text-muted text-start mt-2"><?= __('Representante Legal: ') ?><?= __($agreement->has('client') ? $agreement->client->name : '') ?> </h6>

                                    <div class="row">
                                        <div class="col-5">
                                            <ul class="list-group list-group-flush mt-4">
                                                <li class="list-group-item"><span style="font-weight: bold;"><?= __('Serial: ') ?></span> <?= $agreement->has('machine') ? $agreement->machine->serial : '' ?></li>
                                                <li class="list-group-item"><span style="font-weight: bold;"><?= __('Coutas: ') ?></span> <?= __($agreement->nquote . ' Cuotas') ?></li>
                                                <?php if($agreement->datesigned != null) : ?>
                                                    <li class="list-group-item"><?= __($agreement->datesigned) ?></li>
                                                <?php endif ?>
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <ul class="list-group list-group-flush mt-4">
                                                <li class="list-group-item"><span style="font-weight: bold;"><?= __('Valor del Contrato: ') ?></span> <?= $this->Number->currency($agreement->agreementvalue, 'USD') ?> </li>
                                                <li class="list-group-item"><span style="font-weight: bold;"><?= __('Descuento Aplicado: ') ?></span> <?= $this->Number->currency($agreement->discount, 'USD') ?></li>
                                                <li class="list-group-item"><span style="font-weight: bold;"><?= __('Cuota Inicial: ') ?></span> <?= $this->Number->currency($agreement->quoteini, 'USD') ?></li>
                                                <?php if ($agreement->separation > 0) : ?>
                                                    <li class="list-group-item"><span style="font-weight: bold;"><?= __('Separación: ') ?></span> <?= $this->Number->currency($agreement->separation, 'USD') ?></li>
                                                <?php endif ?>
                                            </ul>
                                        </div>
                                        <p class="card-text"><span style="font-weight: bold;"><?= __('Comentarios: ') ?></span> <?= h($agreement->comments) ?> </p>
                                    </div>
                                    <?= $this->Html->link('Ver Contrato', ['action' => 'view', $agreement->id], ['class' => 'btn btn-primary mt-4']) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>