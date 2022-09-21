<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clientscasino $clientscasino
 * @var \Cake\Collection\CollectionInterface|string[] $casinos
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Ingresar Nueva Relación Cliente Casino') ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver a los Casinos'), ['controller' => 'Casinos', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="clientscasinos form content">
                <?= $this->Form->create($clientscasino, ['class' => 'row g-3 needs-validation']) ?>
                <?php include_once __DIR__.'/layouts/form.php' ?>
                <?= $this->Form->button(__('Crear Relación'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
