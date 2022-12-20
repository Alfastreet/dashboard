<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Casinos', 'url' => ['controller' => 'Casinos', 'action' => 'index']],
    ['title' => $casino->name]
]);

$totalLiquidacion = 0;

foreach($liquidations as $li){
    $totalLiquidacion += $li->alfastreet;
}

?>
<div class="col-12">
    <div class="mb-3">
        <?php include_once __DIR__ . '/layouts/aside.php' ?>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="mb-6">
                <h2 class="text-center card-title"><?= h($casino->name) ?></h2>
                <input type="hidden" id="casinoid" value="<?= $casino->id ?>">
                <input type="hidden" id="token" value="<?= $casino->token ?>">
                <div class="mb-3 row">
                    <div class="col">
                        <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Dirección del Casino:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($casino->address) ?>">
                        </div>
                        <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Teléfono del Casino:') ?></label>
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= h($casino->phone) ?>">
                        </div>
                    </div>
                    <div class="col">
                        <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Departamento:') ?></label>
                        <div class="col-md-6">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $casino->has('state') ? h($casino->state->name) : '' ?>">
                        </div>
                        <label for="staticEmail" class="col-md-6 col-form-label fw-bold"><?= __('Ciudad:') ?></label>
                        <div class="col-md-4">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $casino->has('city') ? h($casino->city->name) : '' ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Acordeon de los datos relacionados -->

<div class="accordion accordion-flush mb-3" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFive">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                <?= __('Clientes de Este Casino') ?>
            </button>
        </h2>
        <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <!-- Clientes relacionados -->
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="card-title mb-0"><?= __('Clientes pertenecientes a este Casino') ?></h3>
                                    <p class="small text-medium-emphasis"><?= __('Lista de los clientes relacionados con este casino') ?></p>
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
                                        foreach ($clients as $client) {
                                            if ($clientscasino->client_id == $client->id) {
                                                $nameClient = $client->name;
                                            }
                                        }
                                    ?>
                                        <tr>
                                            <td><?= h($nameClient) ?></td>
                                            <?php if ($isAdmin) : ?>
                                                <td>
                                                    <div class="btn-group btn-group-toggle mx-3">
                                                        <a class="nav-link nav-group-toggle" href="/clientscasinos/edit/<?= $clientscasino->id ?>?casinoid=<?= $casino->id ?>&token=<?= $casino->token ?>">
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
                                            <?php endif ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingSix">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                <?= __('Maquinas Relacionadas al Casino') ?>
            </button>
        </h2>
        <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <!-- Maquinas relacionadas -->
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="card-title mb-0"><?= __('Tus Maquinas') ?></h3>
                                    <p class="small text-medium-emphasis"><?= __('Maquinas inscritas a este Casino') ?></p>
                                </div>
                                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                                    <?= $this->Html->link(__('Agregar una Nueva Maquina'), ['controller' => 'Machines', 'action' => 'add', '?' => ['casinoid' => $casino->id]], ['class' => 'btn btn-primary']) ?>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-responsive text-center table-hover">
                                    <tr>
                                        <th><?= __('Serial de la Maquina') ?></th>
                                        <th><?= __('Nombre de la Maquina') ?></th>
                                        <th><?= __('Dia de Instalacion') ?></th>
                                        <th><?= __('Imagen') ?></th>
                                    </tr>
                                    <?php foreach ($casino->machines as $machines) : ?>
                                        <tr>
                                            <td><?= h($machines->serial) ?></td>
                                            <td><?= h($machines->name) ?></td>
                                            <td><?= h($machines->dateInstalling) ?></td>
                                            <td><?= $this->Html->image('Machines/' . $machines->image, ['class' => 'img-thumbnail img-fluid rounded mx-auto d-block', 'style' => 'max-width:150px']) ?></td>
                                            <?php if ($isAdmin) : ?>
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
                                            <?php endif ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->Html->Script('erase') ?>
<?= $this->Html->Script('accounts') ?>
<?= $this->Html->Script('confirmedAccountants') ?>
<?= $this->Html->Script('createLiquidation') ?>