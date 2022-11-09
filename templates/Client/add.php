<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Clientes', 'url' => ['controller' => 'Client', 'action' => 'index']],
])
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Registrar Cliente') ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-sm-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
                <div class="d-block d-sm-none">
                    <a href="/client" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-caret-left"></use>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="column-responsive column-80">
                <div class="business form content">
                    <?= $this->Form->create($client, ['class' => 'row g-3 needs-validation']) ?>
                    <?php include_once __DIR__ . '/layouts/form.php' ?>
                    <?= $this->Form->button(__('Enviar'), ['class' => 'btn btn-primary', 'id' => 'add']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('client') ?>