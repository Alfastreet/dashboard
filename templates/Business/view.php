<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <?php include_once __DIR__ . '/layouts/aside.php' ?>
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