<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Clientscasino $clientscasino
 * @var string[]|\Cake\Collection\CollectionInterface $casinos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $clientscasino->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clientscasino->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Clientscasinos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientscasinos form content">
            <?= $this->Form->create($clientscasino) ?>
            <fieldset>
                <legend><?= __('Edit Clientscasino') ?></legend>
                <?php
                    echo $this->Form->control('client_id');
                    echo $this->Form->control('casino_id', ['options' => $casinos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
