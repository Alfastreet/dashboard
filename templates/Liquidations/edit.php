<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Liquidation $liquidation
 * @var string[]|\Cake\Collection\CollectionInterface $casinos
 * @var string[]|\Cake\Collection\CollectionInterface $machines
 * @var string[]|\Cake\Collection\CollectionInterface $months
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $liquidation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $liquidation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Liquidations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="liquidations form content">
            <?= $this->Form->create($liquidation) ?>
            <fieldset>
                <legend><?= __('Edit Liquidation') ?></legend>
                <?php
                    echo $this->Form->control('casino_id', ['options' => $casinos]);
                    echo $this->Form->control('machine_id', ['options' => $machines]);
                    echo $this->Form->control('month_id', ['options' => $months]);
                    echo $this->Form->control('year');
                    echo $this->Form->control('cashin');
                    echo $this->Form->control('cashout');
                    echo $this->Form->control('bet');
                    echo $this->Form->control('win');
                    echo $this->Form->control('profit');
                    echo $this->Form->control('jackpot');
                    echo $this->Form->control('games');
                    echo $this->Form->control('coljuegos');
                    echo $this->Form->control('admin');
                    echo $this->Form->control('total');
                    echo $this->Form->control('alfastreet');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
