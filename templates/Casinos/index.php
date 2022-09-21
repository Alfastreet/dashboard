<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino[]|\Cake\Collection\CollectionInterface $casinos
 */
?>
<?= $this->element('paginator')?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Casinos') ?></h3>
                    <p class="small text-medium-emphasis">Casinos de los clientes</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Agregar un nuevo Casino'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="md-3">
                <div class="row">
                    <?php foreach ($casinos as $casino) : ?>
                        <div class="col-sm-6">
                            <div class="card">
                                <?= $this->Html->image('Casinos/' . $casino->image) ?>
                                <div class="card-header text-white bg-dark">
                                    <h4 class="card-title "><?= h($casino->name) ?></h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">Direccion: <span class="text-muted"><?= h($casino->address) ?></span></p>
                                    <p class="card-text">Telefono: <span class="text-muted"><?= h($casino->phone) ?></span></p>
                                    <p class="card-text">Ciudad: <span class="text-muted"><?= $casino->has('city') ? h($casino->city->name) : '' ?></span></p>
                                    <p class="card-text">Departamento: <span class="text-muted"><?= $casino->has('state') ? h($casino->state->name) : '' ?></span></p>
                                    <p class="card-text">Empresa: <span class="text-muted"><?= $casino->has('busines') ? h($casino->busines->name) : '' ?></span></p>
                                    <p class="card-text">Dueño: <span class="text-muted"><?= $casino->has('owner') ? h($casino->owner->name) : '' ?></span></p>
                                </div>
                                <div class="card-footer text-white bg-dark actions d-grid gap-2 d-md-flex justify-content-md-center">
                                    <?= $this->Html->link(__('Ver Casino'), ['action' => 'view', $casino->id, '?' => ['token' => $casino->token]], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Editar Información'), ['action' => 'edit', $casino->id], ['class' => 'btn btn-primary']) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->element('paginator')?>