<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clientposition $clientposition
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Clientposition'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientposition form content">
            <?= $this->Form->create($clientposition) ?>
            <fieldset>
                <legend><?= __('Add Clientposition') ?></legend>
                <?php
                    echo $this->Form->control('position');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
