<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Editar Datos del Cliente') ?></h3>
                </div>
                <div>
                    <?= $this->Form->postLink(
                        __('Borrar'),
                        ['action' => 'delete', $client->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class' => 'btn btn-danger me-md-2']
                    ) ?>
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <?= $this->Form->create($client, ['class' => 'row g-3 needs-validation']) ?>
                <?php include_once __DIR__ . '/layouts/form.php' ?>
                <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary me-md-2']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>