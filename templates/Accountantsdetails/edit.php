<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountantsdetail $accountantsdetail
 * @var string[]|\Cake\Collection\CollectionInterface $accountants
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $accountantsdetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $accountantsdetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Accountantsdetails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountantsdetails form content">
            <?= $this->Form->create($accountantsdetail) ?>
            <fieldset>
                <legend><?= __('Edit Accountantsdetail') ?></legend>
                <?php
                    echo $this->Form->control('accountants_id', ['options' => $accountants]);
                    echo $this->Form->control('details_id');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
