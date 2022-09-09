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
<?php 

    $paginator = $this->Paginator->setTemplates([
        'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&lt;</a></li>',
        'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
        'first' => '<li class="page-item"><a class="page-link" href="{{url}}">&laquo;</a></li>',
        'last' => '<li class="page-item"><a class="page-link" href="{{url}}">&raquo;</a></li>',
        'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&gt
        ;</a></li>',
    ])

?>

<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
