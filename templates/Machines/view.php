<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Maquinas', 'url' => ['controller' => 'Machines', 'action' => 'index']],
    ['title' => $machine->name.', '.$machine->serial],
])
?>
<div class="col-12">
    <div class="mb-3">
        <aside class="column">
            <div class="d-flex justify-content-between">
                <div class="">
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
                <div class="">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $machine->id], ['class' => 'btn btn-primary me-md-2']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $machine->id], ['confirm' => __('Estas Seguro de eliminar la entrada # {0}?', $machine->id), 'class' => 'btn btn-danger me-md-2']) ?>
                </div>
            </div>
        </aside>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="text-center card-title"><?= __('Maquina: ' . $machine->name) ?></h2>
            <div class="mb-3 row">
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Serial:') ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($machine->serial) ?>">
                    </div>
                    <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Casino perteneciente:') ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($machine->has('casino') ? h($machine->casino->name) : '') ?>">
                    </div>
                </div>
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Número Interno:') ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $machine->idint === null ? 'Nulo' : h($machine->idint) ?>">
                    </div>
                    <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Modelo de la maquina:') ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($machine->has('model') ? h($machine->model->name) : '') ?>">
                    </div>
                </div>
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Tipo de Contrato:') ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($machine->has('contract') ? h($machine->contract->name) : '')  ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Datos Tecnicos de la maquina -->

<div class="col-12">
    <div class="mb-3">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title text-center"><?= __('Datos tecnicos de la Maquina') ?></h2>
                <div class="mb-3 mt-3 row">
                    <div class="col">
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Garantia de la Maquina:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= __($machine->warranty) ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Año del Modelo de la Maquina:') ?></label>
                        <div class="col-sm-4">
                            <input type="number" readonly class="form-control-plaintext" id="staticEmail" value="<?= __($machine->yearModel) ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Modelo del Display:') ?></label>
                        <div class="col-sm-4">
                            <input type="number" readonly class="form-control-plaintext" id="staticEmail" value="<?= __($machine->display) ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Fabricante:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $machine->has('maker') ? h($machine->maker->name) : '' ?>">
                        </div>
                    </div>
                    <div class="col">
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Altura:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= __($machine->height . ' Metros') ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Ancho:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= __($machine->width . ' Metros') ?>">
                        </div>
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Fecha de Instalacion:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= __($machine->dateInstalling) ?>">
                        </div>
                    </div>
                    <div class="col">
                        <?= $this->Html->image('Machines/' . $machine->image, ['class' => 'img-thumbnail']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
