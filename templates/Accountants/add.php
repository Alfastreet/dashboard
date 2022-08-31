<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant $accountant
 * @var \Cake\Collection\CollectionInterface|string[] $machines
 * @var \Cake\Collection\CollectionInterface|string[] $casinos
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Accountants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accountants form content">
            <?= $this->Form->create($accountant, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Add Accountant') ?></legend>
                <div class="row">
                    <div class="col">
                    <?php
                        echo $this->Form->control('machine_id' ,[ 'required' => false, 'disabled' => true, 'class' => 'form-control']);
                        echo $this->Form->control('casino_id', ['required' => false, 'disabled' => true, 'class' => 'form-control'] );
                        echo $this->Form->control('day_init', ['disabled' => true, 'id' => 'dayInit', 'class' => 'form-control']);
                        echo $this->Form->control('day_end', ['disabled' => true, 'id' => 'dayEnd', 'class' => 'form-control']);
                        echo $this->Form->control('cashin', ['disabled' => true, 'id' => 'cashin', 'class' => 'form-control']);
                        echo $this->Form->control('cashout', ['disabled' => true, 'id' => 'cashout', 'class' => 'form-control']);
                        echo $this->Form->control('bet', ['disabled' => true, 'id' => 'bet', 'class' => 'form-control']);
                        echo $this->Form->control('win', ['disabled' => true, 'id' => 'win', 'class' => 'form-control']);
                        echo $this->Form->control('jackpot', ['disabled' => true, 'id' => 'jackpot', 'class' => 'form-control']);
                        echo $this->Form->control('gamesplayed', ['disabled' => true, 'id' => 'gamesplayed', 'class' => 'form-control']); ?>
                    </div>
                    <div class="col">
                        <?php echo $this->Form->control('image', ['type' => 'file', 'required' => 'true', 'id' => 'image']);?>
                        <img id="file">
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Submit'
            )) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?= $this->Html->Script('accounts') ?>