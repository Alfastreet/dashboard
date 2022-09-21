<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Editar Datos de la Empresa') ?></h3>
                </div>
                <div>
                    <?= $this->Form->postLink(
                        __('Borrar'),
                        ['action' => 'delete', $busines->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $busines->id), 'class' => 'btn btn-danger me-md-2']
                    ) ?>
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="business form content">
                    <?= $this->Form->create($busines, ['class' => 'row g-3 needs-validation']) ?>
                        <?php include_once __DIR__.'/layouts/form.php' ?>
                    <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary me-md-2']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>