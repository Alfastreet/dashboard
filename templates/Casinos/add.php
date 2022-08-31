<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Casinos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="casinos form content">
            <?= $this->Form->create($casino, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Casino') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('address');
                    echo $this->Form->control('city_id');
                    echo $this->Form->control('state_id');
                    echo $this->Form->control('owner_id');
                    echo $this->Form->control('business_id', ['options' => $business]);
                    echo $this->Form->control('image', ['type' => 'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
