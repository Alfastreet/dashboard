<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machinepart $machinepart
 * @var \Cake\Collection\CollectionInterface|string[] $machines
 * @var \Cake\Collection\CollectionInterface|string[] $parts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Machinepart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="machinepart form content">
            <?= $this->Form->create($machinepart) ?>
            <fieldset>
                <legend><?= __('Add Machinepart') ?></legend>
                <?php
                    echo $this->Form->control('machine_id', ['options' => $machines]);
                    echo $this->Form->control('part_id', ['options' => $parts]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
