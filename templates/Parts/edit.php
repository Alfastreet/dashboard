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
            <?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $part->id],
                ['confirm' => __('¿Estas seguro que desea borrar el Item # {0}?', $part->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Lista de Partes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="parts form content">
            <?= $this->Form->create($part) ?>
            <fieldset>
                <legend><?= __('Editar parte') ?></legend>
                <?php
                    echo $this->Form->control('serial');
                    echo $this->Form->control('name' , [
                        'label' => 'Nombre de la pieza'
                    ]);
                    echo $this->Form->control('money_id', [
                        'label' => 'Tipo de moneda'
                    ]);
                    echo $this->Form->control('value' ,  [
                        'label' => 'Precio'
                    ]);
                    echo $this->Form->control('amount' , [
                        'label' => 'Cantidad disponible'
                    ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
