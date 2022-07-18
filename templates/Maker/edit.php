<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Maker $maker
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $maker->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $maker->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Maker'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="maker form content">
            <?= $this->Form->create($maker) ?>
            <fieldset>
                <legend><?= __('Edit Maker') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
