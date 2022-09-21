<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ownercompany $ownercompany
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Ownercompany'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="ownercompany form content">
            <?= $this->Form->create($ownercompany) ?>
            <fieldset>
                <legend><?= __('Add Ownercompany') ?></legend>
                <?php
                    echo $this->Form->control('owner_id');
                    echo $this->Form->control('company_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
