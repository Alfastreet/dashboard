<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailsaccountant $detailsaccountant
 * @var string[]|\Cake\Collection\CollectionInterface $accountants
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $detailsaccountant->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $detailsaccountant->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Detailsaccountants'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="detailsaccountants form content">
            <?= $this->Form->create($detailsaccountant) ?>
            <fieldset>
                <legend><?= __('Edit Detailsaccountant') ?></legend>
                <?php
                    echo $this->Form->control('accountants_id', ['options' => $accountants]);
                    echo $this->Form->control('day_init');
                    echo $this->Form->control('day_end');
                    echo $this->Form->control('month');
                    echo $this->Form->control('year');
                    echo $this->Form->control('total_init');
                    echo $this->Form->control('total_end');
                    echo $this->Form->control('profit');
                    echo $this->Form->control('coljuegoa');
                    echo $this->Form->control('iva');
                    echo $this->Form->control('juegos_jug');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
