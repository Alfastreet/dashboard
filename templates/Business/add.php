<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Business'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="business form content">
            <?= $this->Form->create($busines) ?>
            <fieldset>
                <legend><?= __('Add Busines') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('nit');
                    echo $this->Form->control('phone');
                    echo $this->Form->control('address');
                    echo $this->Form->control('email');
                    echo $this->Form->control('owner_id', ['options' => $owner]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
