<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Totalerase $totalerase
 * @var \Cake\Collection\CollectionInterface|string[] $casinos
 * @var \Cake\Collection\CollectionInterface|string[] $months
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Totalerases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="totalerases form content">
            <?= $this->Form->create($totalerase) ?>
            <fieldset>
                <legend><?= __('Add Totalerase') ?></legend>
                <?php
                    echo $this->Form->control('casino_id', ['options' => $casinos]);
                    echo $this->Form->control('month_id', ['options' => $months]);
                    echo $this->Form->control('year');
                    echo $this->Form->control('total');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
