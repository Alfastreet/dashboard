<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Wallet $wallet
 * @var \Cake\Collection\CollectionInterface|string[] $agreements
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Wallets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="wallets form content">
            <?= $this->Form->create($wallet) ?>
            <fieldset>
                <legend><?= __('Add Wallet') ?></legend>
                <?php
                    echo $this->Form->control('agreement_id', ['options' => $agreements]);
                    echo $this->Form->control('payment');
                    echo $this->Form->control('collection');
                    echo $this->Form->control('lastpay');
                    echo $this->Form->control('quotemora');
                    echo $this->Form->control('mora');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
