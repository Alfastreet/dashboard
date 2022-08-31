<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino[]|\Cake\Collection\CollectionInterface $casinos
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="newCasino">
    <?= $this->Html->link(__('New Casino'), ['action' => 'add'], ['class' => 'button float-right']) ?>
</div>

<div class="AllCasinos">
    <h3><?= __('Casinos') ?></h3>

    <div class="cardsCasinos">

        <?php foreach($casinos as $casino): ?>
    
        <div class="card">
            <?= $this->Html->image('Casinos/'.$casino->image) ?>
            <div class="card-header">
                <h5 class="card-title"><?= h($casino->name) ?></h5>
            </div>
            <div class="card-body">
                <p class="card-text">Direccion: <span class="text-muted"><?= h($casino->address) ?></span></p>
                <p class="card-text">Telefono: <span class="text-muted"><?= h($casino->phone) ?></span></p>
                <p class="card-text">Ciudad: <span class="text-muted"><?= $casino->has('city') ? h($casino->city->name) :'' ?></span></p>
                <p class="card-text">Departamento: <span class="text-muted"><?= $casino->has('state') ? h($casino->state->name) :'' ?></span></p>
                <p class="card-text">Empresa: <span class="text-muted"><?= $casino->has('busines') ? h($casino->busines->name) :'' ?></span></p>
                <p class="card-text">Dueño: <span class="text-muted"><?= $casino->has('owner') ? h($casino->owner->name) :'' ?></span></p>
            </div>
            <div class="card-footer actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $casino->id, '?' => ['token' => $casino->token]] , ['class' => 'btn btn-primary view']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $casino->id], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
    
        <?php endforeach ?>

        </div>
    </div>
</div>
</div>
