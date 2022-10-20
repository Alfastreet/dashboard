<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agreement $agreement
 * @var string[]|\Cake\Collection\CollectionInterface $machines
 * @var string[]|\Cake\Collection\CollectionInterface $agreementstatuses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $agreement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $agreement->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Agreements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="agreements form content">
            <?= $this->Form->create($agreement) ?>
            <fieldset>
                <legend><?= __('Edit Agreement') ?></legend>
                <?php
                    echo $this->Form->control('client_id');
                    echo $this->Form->control('business_id');
                    echo $this->Form->control('machine_id', ['options' => $machines]);
                    echo $this->Form->control('discount');
                    echo $this->Form->control('agreementvalue');
                    echo $this->Form->control('nquote');
                    echo $this->Form->control('quoteini');
                    echo $this->Form->control('separation');
                    echo $this->Form->control('agreementstatus_id', ['options' => $agreementstatuses]);
                    echo $this->Form->control('datesigned');
                    echo $this->Form->control('comments');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
