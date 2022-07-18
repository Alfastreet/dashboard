<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machinepart $machinepart
 * @var string[]|\Cake\Collection\CollectionInterface $machines
 * @var string[]|\Cake\Collection\CollectionInterface $parts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $machinepart->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $machinepart->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Machinepart'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="machinepart form content">
            <?= $this->Form->create($machinepart) ?>
            <fieldset>
                <legend><?= __('Edit Machinepart') ?></legend>
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
