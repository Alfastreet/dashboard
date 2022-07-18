<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailsquote $detailsquote
 * @var \Cake\Collection\CollectionInterface|string[] $quotes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Detailsquotes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="detailsquotes form content">
            <?= $this->Form->create($detailsquote) ?>
            <fieldset>
                <legend><?= __('Add Detailsquote') ?></legend>
                <?php
                    echo $this->Form->control('quote_id', ['options' => $quotes]);
                    echo $this->Form->control('typeProduct_id');
                    echo $this->Form->control('product_id');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
