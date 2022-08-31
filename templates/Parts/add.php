<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Part $part
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('← Volver a la lista de partes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="parts form content">

        <?= $this->Form->create($part, ['type' => 'file']) ?>

            <h3><?= __('Añadir Parte') ?></h3>

            <div class="row center-form">
                <div class="col">
                    <div class="form-group">
                        <?= $this->Form->control('serial', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Serial de la pieza']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Pieza']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('money_id', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Tipo de Moneda']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('value', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Valor de la pieza']); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Cantidad disponible']); ?>
                    </div>
                </div>

                <div class="col">
                    <?= $this->Form->control('image', ['type' => 'file', 'class' => 'form-control-file', 'label' => false, 'id' => 'image']); ?>
                    <img id="file" class="file-image">
                </div>
            </div>


        <?= $this->Form->button(__('Submit'), ['class' => 'button-send']) ?>
        <?= $this->Form->end() ?>

        </div>
    </div>
</div>

<?= $this->Html->Script('parts') ?>