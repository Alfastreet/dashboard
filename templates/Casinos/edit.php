<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Editar Datos del Casino') ?></h3>
                    <p>&nbsp;</p>
                </div>
                <div>
                    <?= $this->Form->postLink(
                        __('Borrar'),
                        ['action' => 'delete', $casino->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $casino->id), 'class' => 'btn btn-danger me-md-2']
                    ) ?>
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="casino form content">
                    <?= $this->Form->create($casino, ['type' => 'file', 'class' => 'row g-3 needs-validation']) ?>
                    <?php include_once __DIR__ . '/layouts/form.php' ?>
                    <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Clientes relacionados -->

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Clientes pertenecientes a este Casino') ?></h3>
                    <p class="small text-medium-emphasis">Lista de los clientes relacionados con este casino</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Relacionar un cliente'), ['controller' => 'Clientscasinos', 'action' => 'add', '?' => ['casinoid' => $casino->id]], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-responsive text-center table-hover">
                    <tr>
                        <th><?= __('Nombre del Cliente') ?></th>
                    </tr>
                    <?php foreach ($casino->clientscasinos as $clientscasino) :
                            foreach($clients as $client){
                                if($clientscasino->client_id == $client->id){
                                    $nameClient = $client->name;
                                }
                            }
                        ?>
                        <tr>
                            <td><?= h($nameClient) ?></td>
                            <td>
                                <div class="btn-group btn-group-toggle mx-3">
                                    <a class="nav-link nav-group-toggle" href="/clientscasinos/edit/<?= $clientscasino->id ?>?casinoid=<?= $casino->id ?>">
                                        <svg class="nav-icon" width="20" height="20">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                        </svg>
                                    </a>
                                    <a class="nav-link nav-group-toggle" href="/clientscasinos/view/<?= $clientscasino->id ?>">
                                        <svg class="nav-icon" width="20" height="20">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Maquinas relacionadas -->

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-responsive text-center table-hover">
                    <tr>
                        <th><?= __('Serial de la Maquina') ?></th>
                        <th><?= __('Nombre de la Maquina') ?></th>
                        <th><?= __('Image') ?></th>
                        <th><?= __('Dia de Instalacion') ?></th>
                    </tr>
                    <?php foreach ($casino->machines as $machines) : ?>
                        <tr>
                            <td><?= h($machines->serial) ?></td>
                            <td><?= h($machines->name) ?></td>
                            <td><?= h($machines->image) ?></td>
                            <td><?= h($machines->dateInstalling) ?></td>
                            <td class="actions">
                                <div class="btn-group btn-group-toggle mx-3">
                                    <a class="nav-link nav-group-toggle" href="/machines/edit/<?= $machines->id ?>">
                                        <svg class="nav-icon" width="20" height="20">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                        </svg>
                                    </a>
                                    <a class="nav-link nav-group-toggle" href="/machines/view/<?= $machines->id ?>">
                                        <svg class="nav-icon" width="20" height="20">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                        </svg>
                                    </a>
                                    <a class="nav-link nav-group-toggle" href="/machines/delete/<?= $machines->id ?>">
                                        <svg class="nav-icon" width="20" height="20">
                                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>