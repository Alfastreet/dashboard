<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Typeproduct $typeproduct
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $typeproduct->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $typeproduct->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Typeproduct'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="typeproduct form content">
            <?= $this->Form->create($typeproduct) ?>
            <fieldset>
                <legend><?= __('Edit Typeproduct') ?></legend>
                <?php
                    echo $this->Form->control('type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
