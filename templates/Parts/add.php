<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Part $part
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Parts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="parts form content">
            <?= $this->Form->create($part) ?>
            <fieldset>
                <legend><?= __('Añadir Parte') ?></legend>
                <?php
                    echo $this->Form->control('serial');
                    echo $this->Form->control('name' , [
                        'label' => 'Nombre del producto'
                    ]);
                    echo $this->Form->control('money_id', [
                        'label' => 'Tipo de Moneda'
                    ]);
                    echo $this->Form->control('value' , [
                        'label' => 'Valor de la pieza'
                    ]);
                    echo $this->Form->control('amount' , [
                        'label' => 'Cantidad disponible'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
