<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine $machine
 * @var \Cake\Collection\CollectionInterface|string[] $casinos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Machines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="machines form content">
            <?= $this->Form->create($machine) ?>
            <fieldset>
                <legend><?= __('Add Machine') ?></legend>
                <?php
                    echo $this->Form->control('idint');
                    echo $this->Form->control('serial');
                    echo $this->Form->control('name');
                    echo $this->Form->control('yearModel');
                    echo $this->Form->control('model_id');
                    echo $this->Form->control('maker_id');
                    echo $this->Form->control('warranty');
                    echo $this->Form->control('image');
                    echo $this->Form->control('height');
                    echo $this->Form->control('width');
                    echo $this->Form->control('display');
                    echo $this->Form->control('dateInstalling');
                    echo $this->Form->control('casino_id', ['options' => $casinos]);
                    echo $this->Form->control('owner_id');
                    echo $this->Form->control('company_id');
                    echo $this->Form->control('contract_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
