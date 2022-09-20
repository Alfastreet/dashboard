<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?=__('Registrar Casino')?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?> 
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="casinos form content">
                    <?= $this->Form->create($casino, ['type' => 'file', 'class' => 'row g-3 needs-validation']) ?>
                        <?php include_once __DIR__.'/layouts/form.php' ?>
                    <?= $this->Form->button(__('Registar'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
