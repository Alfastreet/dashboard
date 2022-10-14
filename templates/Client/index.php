<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client[]|\Cake\Collection\CollectionInterface $client
 */
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Clientes') ?></h3>
                    <p class="small text-medium-emphasis">Total de clientes registrados a la fecha</p>
                </div>
                <div class="btn-toolbar d-none d-sm-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Agregar un Cliente'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </div>
                <div class="d-block d-sm-none">
                    <a href="/client/add" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-note-add"></use>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-responsive text-center table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th><?= __('Nombre del Cliente') ?></th>
                            <th><?= __('Telefono') ?></th>
                            <th><?= __('Correo Electronico') ?></th>
                            <th><?= __('Cargo') ?></th>
                            <th><?= __('Empresa perteneciente') ?></th>
                            <th><?= __('') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($client as $client) : ?>
                            <tr>
                                <td><?= h($client->name) ?></td>
                                <td><?= h($client->phone) ?></td>
                                <td><?= h($client->email) ?></td>
                                <td><?= $client->has('clientposition') ? h($client->clientposition->position) : '' ?></td>
                                <td><?= $client->has('busines') ? h($client->busines->name) : '' ?></td>
                                <td class="actions">
                                    <div class="btn-group btn-group-toggle mx-3">
                                        <a class="nav-link nav-group-toggle" href="/client/edit/<?= $client->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/client/view/<?= $client->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/client/delete/<?= $client->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>