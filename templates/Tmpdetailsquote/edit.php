<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tmpdetailsquote $tmpdetailsquote
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tmpdetailsquote->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tmpdetailsquote->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tmpdetailsquote'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tmpdetailsquote form content">
            <?= $this->Form->create($tmpdetailsquote) ?>
            <fieldset>
                <legend><?= __('Edit Tmpdetailsquote') ?></legend>
                <?php
                    echo $this->Form->control('typeProduct_id');
                    echo $this->Form->control('product_id');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('value');
                    echo $this->Form->control('token');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
