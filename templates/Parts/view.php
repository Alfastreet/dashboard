<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Part $part
 */
$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Piezas y Servicios', 'url' => ['controller' => 'Parts', 'action' => 'index']],
    ['title' => $part->name],
])
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3 class="card-title"><?= h($part->name) ?></h3>
                <div class="">
                    <?= $this->Html->link('Volver al Listado', ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link('Editar', ['action' => 'edit', $part->id], ['class' => 'btn btn-info']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Serial:') ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($part->serial) ?>">
                    </div>
                    <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Nombre de la Pieza:') ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($part->name) ?>">
                    </div>
                </div>
                <div class="col">
                    <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= $part->typeproduct_id === 1 ? 'Precio (+40%): ' : ''. 'Precio:'  ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->Number->currency($part->value, $part->has('money') ? h($part->money->shortcode) : 'USD') ?>">
                    </div>
                    <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Cantidad:') ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($part->amount) ?>">
                    </div>
                    <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Ubicacion de la pieza:') ?></label>
                    <div class="col-sm-4">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $part->has('cellar') ? 'Bodega '. h($part->cellar->name) : '' ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>