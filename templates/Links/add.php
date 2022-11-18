<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Link $link
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Enlaces Alfastreet', 'url' => ['controller' => 'Links', 'action' => 'index']]
]);
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <h2 class="card-title"><?= __('Añadir Nuevo Enlace') ?></h2>
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
            </div>
            <div class="column-responsive column-80">
                <div class="links form content">
                    <?= $this->Form->create($link) ?>
                    <div class="mb-3">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <?= $this->Form->control('link', ['class' => 'form-control', 'placeholder' => 'Pagina web ', 'label' => false, 'id' => 'link']) ?>
                            </div>
                            <div class="col-md-6">
                                <?= $this->Form->control('url', ['class' => 'form-control', 'placeholder' => 'URL o enlace ', 'label' => false, 'id' => 'url']) ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Usuario o Correo" id="user">
                            </div>
                            <div class="col-md-6">
                                <input type="password" class="form-control" placeholder="Contraseña" id="pass">
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Agregar'), ['class' => 'btn btn-primary', 'id' => 'add']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('links') ?>