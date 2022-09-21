<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Liquidation $liquidation
 * @var \Cake\Collection\CollectionInterface|string[] $accountants
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Liquidation'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="liquidation form content">
            <?= $this->Form->create($liquidation) ?>
            <fieldset>
                <legend><?= __('Add Liquidation') ?></legend>
                <?php
                    echo $this->Form->control('accountants_id', ['options' => $accountants]);
                    echo $this->Form->control('total');
                    echo $this->Form->control('accountantsstatus_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
