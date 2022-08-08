<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant $accountant
 * @var string[]|\Cake\Collection\CollectionInterface $machines
 * @var string[]|\Cake\Collection\CollectionInterface $casinos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accountant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accountant->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Accountants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountants form content">
            <?= $this->Form->create($accountant) ?>
            <fieldset>
                <legend><?= __('Edit Accountant') ?></legend>
                <?php
                    echo $this->Form->control('machine_id', ['options' => $machines]);
                    echo $this->Form->control('casino_id', ['options' => $casinos]);
                    echo $this->Form->control('month');
                    echo $this->Form->control('year');
                    echo $this->Form->control('total_prof');
                    echo $this->Form->control('token');
                    echo $this->Form->control('accountantsstatus_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
