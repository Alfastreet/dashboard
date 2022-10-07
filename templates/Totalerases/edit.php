<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Totalerase $totalerase
 * @var string[]|\Cake\Collection\CollectionInterface $casinos
 * @var string[]|\Cake\Collection\CollectionInterface $months
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $totalerase->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $totalerase->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Totalerases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="totalerases form content">
            <?= $this->Form->create($totalerase) ?>
            <fieldset>
                <legend><?= __('Edit Totalerase') ?></legend>
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
