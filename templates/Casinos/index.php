<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino[]|\Cake\Collection\CollectionInterface $casinos
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Casinos'],
])

?>
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
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-responsive text-center table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th><?= __('Imagen') ?></th>
                                <th><?= __('Casino') ?></th>
                                <th><?= __('Direccion') ?></th>
                                <th><?= __('Telefono') ?></th>
                                <th><?= __('Ciudad') ?></th>
                                <th><?= __('Departamento') ?></th>
                                <th><?= __('Empresa') ?></th>
                                <th><?= __('Propietario') ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($casinos as $casino) : ?>
                                <tr>
                                    <td><?= $this->Html->image('Casinos/' . $casino->image, ['class' => 'img-fluid']) ?></td>
                                    <td><?= h($casino->name) ?></td>
                                    <td><?= h($casino->address) ?></td>
                                    <td><?= h($casino->phone) ?></td>
                                    <td><?= $casino->has('city') ? h($casino->city->name) : '' ?></td>
                                    <td><?= $casino->has('state') ? h($casino->state->name) : '' ?></td>
                                    <td><?= $casino->has('busines') ? h($casino->busines->name) : '' ?></td>
                                    <td><?= $casino->has('owner') ? h($casino->owner->name) : '' ?></td>
                                    <td class="actions">
                                        <a class="nav-link nav-group-toggle" href="/casinos/view/<?= $casino->id ?>?token=<?= $casino->token ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>
                                        <?php if ($isAdmin) : ?>
                                            <a class="nav-link nav-group-toggle" href="/casinos/edit/<?= $casino->id ?>">
                                                <svg class="nav-icon" width="20" height="20">
                                                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                                </svg>
                                            </a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>