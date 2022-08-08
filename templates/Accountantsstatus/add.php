<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountantsstatus $accountantsstatus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Accountantsstatus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountantsstatus form content">
            <?= $this->Form->create($accountantsstatus) ?>
            <fieldset>
                <legend><?= __('Add Accountantsstatus') ?></legend>
                <?php
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
