<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Clientes', 'url' => ['controller' => 'Client', 'action' => 'index']],
    ['title' => $client->name],
])
?>
<div class="col-12">
    <div class="mb-3">
        <div class="d-flex justify-content-between">
            <div class="d-none d-sm-block">
                <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
            </div>
            <?php if ($user_init->rol_id === 1) : ?>
                <div class="d-block d-sm-none">
                    <a href="/client/add" class="btn btn-primary">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-note-add"></use>
                        </svg>
                    </a>
                </div>
                <div class="">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $client->id], ['class' => 'btn btn-primary me-md-2']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $client->id], ['confirm' => __('Estas Seguro de eliminar la entrada # {0}?', $client->id), 'class' => 'btn btn-danger me-md-2']) ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="column-responsive column-80">
                <div class="client view content">
                    <div class="mb-3">
                        <h2 class="text-center card-title"><?= h($client->name) ?></h2>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('Correo Electronico:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($client->email) ?>">
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('Telefono:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($client->phone) ?>">
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('Cargo:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $client->has('position_id') ? h($client->clientposition->position) : '' ?>">
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label fw-bold"><?= __('Empresa Perteneciente:') ?></label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $client->has('busines') ? h($client->busines->name) : '' ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="related">
                <h4><?= __('Relacion de los Clientes con los Casinos') ?></h4>
                <?php if (!empty($client->clientscasinos)) : ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-responsive text-center table-hover">
                            <tr>
                                <th><?= __('Cliente') ?></th>
                                <th><?= __('Casino') ?></th>
                            </tr>
                            <?php
                            foreach ($client->clientscasinos as $clientscasinos) :
                                if ($clientscasinos->client_id === $client->id) {
                                    $clientName = $client->name;
                                }
                                foreach ($casinos as $casino) {
                                    if ($clientscasinos->casino_id === $casino->id) {
                                        $casinoName = $casino->name;
                                        $casinoId = $casino->id;
                                    }
                                }

                            ?>
                                <tr>
                                    <td><?= h($clientName) ?></td>
                                    <td><?= h($casinoName) ?></td>
                                    <?php if ($user_init->rol_id === 1) : ?>
                                        <td class="actions">
                                            <div class="btn-group btn-group-toggle mx-3">
                                                <a class="nav-link nav-group-toggle" href="/Clientscasinos/edit/<?= $clientscasinos->id ?>?casinoid=<?= $casinoId ?>">
                                                    <svg class="nav-icon" width="20" height="20">
                                                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                                    </svg>
                                                </a>
                                                <a class="nav-link nav-group-toggle" href="/Clientscasinos/delete/<?= $clientscasinos->id ?>">
                                                    <svg class="nav-icon" width="20" height="20">
                                                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>