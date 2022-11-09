<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Emprresas', 'url' => ['controller' => 'Business', 'action' => 'index']],
    ['title' => $busines->name]
])
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="d-none d-sm-block">
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
                <div class="d-block d-sm-none">
                    <a href="/business" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-caret-left"></use>
                        </svg>
                    </a>
                </div>
                <?php if ($isAdmin) : ?>
                    <div class="d-none d-sm-block">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $busines->id], ['class' => 'btn btn-info me-md-2']) ?>
                        <?= $this->Html->link(__('Borrar'), ['action' => 'delete', $busines->id], ['confirm' => __('Estas Seguro de eliminar la entrada # {0}?', $busines->id), 'class' => 'btn btn-danger me-md-2']) ?>
                    </div>
                    <div class="d-block d-sm-none">
                        <a href="/quotes/edit/<?= $busines->id ?>" class="btn btn-info">
                            <svg class="icon">
                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pen"></use>
                            </svg>
                        </a>
                        <a href="/quotes/delete/<?= $busines->id ?>" class="btn btn-danger">
                            <svg class="icon">
                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                            </svg>
                        </a>
                    </div>
                <?php endif ?>
            </div>
            <div class="column-responsive column-80">
                <div class="business view content">
                    <div class="mb-3">
                        <h2 class="text-center card-title"><?= h($busines->name) ?></h2>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('Dirección:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($busines->address) ?>">
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('Correo Electrónico:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($busines->email) ?>">
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('NIT:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($busines->nit) ?>">
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('Telefono:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($busines->phone) ?>">
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('Dueño:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $busines->has('owner') ? h($busines->owner->name) : '' ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>