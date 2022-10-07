<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Totalaccountant $totalaccountant
 * @var \Cake\Collection\CollectionInterface|string[] $casinos
 * @var \Cake\Collection\CollectionInterface|string[] $machines
 * @var \Cake\Collection\CollectionInterface|string[] $months
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Totalaccountants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="totalaccountants form content">
            <?= $this->Form->create($totalaccountant) ?>
            <fieldset>
                <legend><?= __('Add Totalaccountant') ?></legend>
                <?php
                    echo $this->Form->control('casino_id', ['options' => $casinos]);
                    echo $this->Form->control('machine_id', ['options' => $machines]);
                    echo $this->Form->control('month_id', ['options' => $months]);
                    echo $this->Form->control('year');
                    echo $this->Form->control('totalLiquidation');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
