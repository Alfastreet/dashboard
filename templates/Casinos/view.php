<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Casino $casino
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Casinos', 'url' => ['controller' => 'Casinos', 'action' => 'index']],
    ['title' => $casino->name]
])
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
                                    <p class="small text-medium-emphasis">Maquinas inscritas a este Casino</p>
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



<!-- Ingreso de datos para las participaciones -->
<?php if ($isAdmin || $user_init->rol_id === '') : ?>
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="card-title mb-0"><?= __('Participaciones') ?></h3>
                        <p class="small text-medium-emphasis">Ingreso de datos para la liquidación de participaciones</p>
                    </div>
                    <div>
                        <button id="erase" class="btn btn-warning">Ingresar Borrados</button>
                    </div>
                </div>
                <div class="row">
                    <div class="column-responsive column-80">
                        <div class="accountants form content">
                            <?= $this->Form->create($accountants, ['id' => 'formAccountants', 'class' => 'row g-3 needs-validation', 'type' => 'file', 'url' => ['controller' => 'accountants', 'action' => 'add', '?' => ['casinoid' => $casino->id, 'token' => $_GET['token']]]]) ?>
                            <div class="col-md-6">
                                <?= $this->Form->control('image', ['type' => 'file', 'required' => 'true', 'id' => 'image', 'label' => false, 'accept' => 'image/png,image/jpeg', 'class' => 'form-control']); ?>
                                <img id="file" class="img-thumbnail rounded">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?= $this->Form->control('machine_id', ['id' => 'machine', 'required' => true, 'disabled' => false, 'class' => 'form-control', 'label' => false, 'empty' => ['' => 'Seleccione la maquina'], 'id' => 'machine']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <?= $this->Form->control('day_init', ['disabled' => true, 'id' => 'dayInit', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Dia de inicio del Contador, INSERTAR SOLO EL NUMERO DEL DIA',  'id' => 'dayInit']); ?>
                                        </div>
                                        <div class="col">
                                            <?= $this->Form->control('day_end', ['disabled' => true, 'id' => 'dayEnd', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Dia final del Contador, INSERTAR SOLO EL NUMERO DEL DIA', 'id' => 'dayEnd']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <?= $this->Form->control('cashin', ['id' => 'cashin', 'disabled' => true, 'id' => 'cashin', 'class' => 'form-control', 'placeholder' => 'CashIn', 'label' => false]); ?>
                                        </div>
                                        <div class="col">
                                            <?= $this->Form->control('cashout', ['disabled' => true, 'id' => 'cashout', 'class' => 'form-control', 'placeholder' => 'CashOut', 'label' => false, 'id' => 'cashout']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <?= $this->Form->control('bet', ['disabled' => true, 'id' => 'bet', 'class' => 'form-control', 'placeholder' => 'Bet', 'label' => false, 'id' => 'bet']); ?>
                                        </div>
                                        <div class="col">
                                            <?= $this->Form->control('win', ['disabled' => true, 'id' => 'win', 'class' => 'form-control', 'placeholder' => 'Win', 'label' => false, 'id' => 'win']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <?= $this->Form->control('jackpot', ['disabled' => true, 'id' => 'jackpot', 'class' => 'form-control', 'placeholder' => 'Jackpot', 'label' => false, 'id' => 'jackpot']);  ?>
                                        </div>
                                        <div class="col">
                                            <?= $this->Form->control('gamesplayed', ['disabled' => true, 'id' => 'gamesplayed', 'class' => 'form-control', 'placeholder' => 'Total de juegos jugados', 'label' => false, 'id' => 'gamesplayed']);  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?= $this->Form->button(__('Enviar Contador'), ['class' => 'btn btn-primary ', 'id' => 'confirmed']) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<!-- Acordeon de los datos de Participaciones -->
<?php if ($isAdmin || $user_init->rol_id === '') : ?>
    <div class="accordion accordion-flush mb-5" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    <?= __('Liquidacion Mes Anterior') ?>
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <!-- Datos mes Anterior -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <p>&nbsp;</p>
                                <div class="table-responsive">
                                    <table class="table table-responsive table-striped table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col"><?= __('Serial de la máquina') ?></th>
                                                <th scope="col"><?= __('Nombre de la máquina') ?></th>
                                                <th scope="col"><?= __('Dia de Inicio') ?></th>
                                                <th scope="col"><?= __('Dia de Finalización') ?></th>
                                                <th scope="col"><?= __('Mes') ?></th>
                                                <th scope="col"><?= __('CashIn') ?></th>
                                                <th scope="col"><?= __('CashOut') ?></th>
                                                <th scope="col"><?= __('Ber') ?></th>
                                                <th scope="col"><?= __('Win') ?></th>
                                                <th scope="col"><?= __('Profit') ?></th>
                                                <th scope="col"><?= __('Jackpot') ?></th>
                                                <th scope="col"><?= __('Juegos Jugados') ?></th>
                                                <th scope="col"><?= __('ColJuegos 12%') ?></th>
                                                <th scope="col"><?= __('Administracion 1%') ?></th>
                                                <th scope="col"><?= __('Total a pagar') ?></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($lastaccountants as $lastaccountant) :
                                                foreach ($machinesName as $machine) :
                                                    if ($lastaccountant->machine_id == $machine->id) {
                                                        $serialMachine = $machine->serial;
                                                        $serialName = $machine->name;
                                                    }
                                                endforeach;
                                            ?>


                                                <tr>
                                                    <td><?= h($serialMachine) ?></td>
                                                    <td><?= h($serialName) ?></td>
                                                    <td><?= h($lastaccountant->day_init) ?></td>
                                                    <td><?= h($lastaccountant->day_end) ?></td>
                                                    <td><?= h($lastaccountant->month_id) ?></td>
                                                    <td><?= $this->Number->currency($lastaccountant->cashin, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($lastaccountant->cashout, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($lastaccountant->bet, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($lastaccountant->win, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($lastaccountant->profit, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($lastaccountant->jackpot, 'USD') ?></td>
                                                    <td><?= h($lastaccountant->gamesplayed) ?></td>
                                                    <td><?= $this->Number->currency($lastaccountant->coljuegos, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($lastaccountant->admin, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($lastaccountant->total, 'USD') ?></td>
                                                    <td><?= $this->Html->image('Accountants/' . $lastaccountant->image, ['class' => 'img-thumbnail']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    <?= __('Liquidacion Mes Actual') ?>
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <!-- Liquidacion Mes Actual -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <p>&nbsp;</p>
                                <div class="table-responsive">
                                    <table class="table table-responsive table-striped table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col"><?= __('Serial de la máquina') ?></th>
                                                <th scope="col"><?= __('Nombre de la máquina') ?></th>
                                                <th scope="col"><?= __('Dia de Inicio') ?></th>
                                                <th scope="col"><?= __('Dia de Finalización') ?></th>
                                                <th scope="col"><?= __('Mes') ?></th>
                                                <th scope="col"><?= __('CashIn') ?></th>
                                                <th scope="col"><?= __('CashOut') ?></th>
                                                <th scope="col"><?= __('Ber') ?></th>
                                                <th scope="col"><?= __('Win') ?></th>
                                                <th scope="col"><?= __('Profit') ?></th>
                                                <th scope="col"><?= __('Jackpot') ?></th>
                                                <th scope="col"><?= __('Juegos Jugados') ?></th>
                                                <th scope="col"><?= __('ColJuegos 12%') ?></th>
                                                <th scope="col"><?= __('Administracion 1%') ?></th>
                                                <th scope="col"><?= __('Total a pagar') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($accountants as $accountant) :
                                                foreach ($machinesName as $machine) :
                                                    if ($accountant->machine_id == $machine->id) {
                                                        $serialMachine = $machine->serial;
                                                        $serialName = $machine->name;
                                                    }
                                                endforeach;
                                            ?>
                                                <tr>
                                                    <td><?= h($serialMachine) ?></td>
                                                    <td><?= h($serialName) ?></td>
                                                    <td><?= h($accountant->day_init) ?></td>
                                                    <td><?= h($accountant->day_end) ?></td>
                                                    <td><?= h($accountant->month_id) ?></td>
                                                    <td><?= $this->Number->currency($accountant->cashin, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($accountant->cashout, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($accountant->bet, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($accountant->win, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($accountant->profit, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($accountant->jackpot, 'USD') ?></td>
                                                    <td><?= h($accountant->gamesplayed) ?></td>
                                                    <td><?= $this->Number->currency($accountant->coljuegos, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($accountant->admin, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($accountant->total, 'USD') ?></td>
                                                    <td><?= $this->Html->image('Accountants/' . $accountant->image, ['class' => 'img-thumbnail']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    <?= __('Liquidacion Total') ?>
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <!-- Liquidacion Total -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-responsive table-striped table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col"><?= __('Serial de la máquina') ?></th>
                                                <th scope="col"><?= __('Nombre de la máquina') ?></th>
                                                <th scope="col"><?= __('Dia de Inicio') ?></th>
                                                <th scope="col"><?= __('Dia de Finalización') ?></th>
                                                <th scope="col"><?= __('Mes') ?></th>
                                                <th scope="col"><?= __('CashIn') ?></th>
                                                <th scope="col"><?= __('CashOut') ?></th>
                                                <th scope="col"><?= __('Bet') ?></th>
                                                <th scope="col"><?= __('Win') ?></th>
                                                <th scope="col"><?= __('Profit') ?></th>
                                                <th scope="col"><?= __('Jackpot') ?></th>
                                                <th scope="col"><?= __('Juegos Jugados') ?></th>
                                                <th scope="col"><?= __('Coljuegos 12%') ?></th>
                                                <th scope="col"><?= __('Administracion 1%') ?></th>
                                                <th scope="col"><?= __('IVA') ?></th>
                                                <th scope="col"><?= __('Total') ?></th>
                                                <th scope="col"><?= __('Alfastreet 40%') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total = 0;
                                            $totalizate = 0;

                                            foreach ($accountants as $accountant) :
                                                foreach ($machinesName as $machine) :
                                                    if ($accountant->machine_id == $machine->id) {
                                                        $serialMachine = $machine->serial;
                                                        $serialName = $machine->name;
                                                    }
                                                endforeach;
                                                foreach ($lastaccountants as $lastaccountant) :
                                                    $totalCashin = 0;
                                                    $totalCashout = 0;
                                                    $totalBet = 0;
                                                    $totalWin = 0;
                                                    $totalProfit = 0;
                                                    $totalJackpot = 0;
                                                    $totalizate = 0;
                                                    $alfasteet = 0;
                                                    $coljuegos = 0;
                                                    $admin = 0;
                                                    $iva = 144415;

                                                    if ($lastaccountant->machine_id === $accountant->machine_id) {
                                                        $totalCashin = $accountant->cashin - $lastaccountant->cashin;
                                                        $totalCashout =  $accountant->cashout - $lastaccountant->cashout;
                                                        $totalBet = $accountant->bet - $lastaccountant->bet;
                                                        $totalWin = $accountant->win - $lastaccountant->win;
                                                        $totalProfit = $accountant->profit - $lastaccountant->profit;
                                                        $totalJackpot = $accountant->jackpot - $lastaccountant->jackpot;
                                                        $totalizate = $accountant->profit - $lastaccountant->profit;
                                                        $coljuegos = $totalizate * 0.12;
                                                        $admin = $coljuegos * 0.01;
                                                        $totalall = $totalizate - $coljuegos - $admin - $iva;
                                                        $alfasteet = $totalall * 0.40;


                                            ?>

                                                        <tr>
                                                            <td><?= h($serialMachine) ?></td>
                                                            <td><?= h($serialName) ?></td>
                                                            <td><?= h($accountant->day_init) ?></td>
                                                            <td><?= h($accountant->day_end) ?></td>
                                                            <td><?= h($accountant->month_id) ?></td>
                                                            <td><?= $this->Number->currency($totalCashin, 'USD') ?></td>
                                                            <td><?= $this->Number->currency($totalCashout, 'USD') ?></td>
                                                            <td><?= $this->Number->currency($totalBet, 'USD') ?></td>
                                                            <td><?= $this->Number->currency($totalWin, 'USD') ?></td>
                                                            <td><?= $this->Number->currency($totalProfit, 'USD') ?></td>
                                                            <td><?= $this->Number->currency($totalJackpot, 'USD') ?></td>
                                                            <td><?= h($accountant->gamesplayed) ?></td>
                                                            <td><?= $this->Number->currency($coljuegos, 'USD') ?></td>
                                                            <td><?= $this->Number->currency($admin, 'USD') ?></td>
                                                            <td><?= $this->Number->currency($iva, 'USD') ?></td>
                                                            <td><?= $this->Number->currency($totalall, 'USD') ?></td>
                                                            <td><?= $this->Number->currency($alfasteet, 'USD') ?></td>
                                                        </tr>

                                            <?php }
                                                    $total += $alfasteet;
                                                endforeach;
                                            endforeach; ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <h3 class="lead text-center">Total a pagar en el mes: <span><?= $this->Number->currency($total, 'USD') ?></span></h3>
                            <input type="hidden" id="totalLiquidation" value="<?= $total ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsedFour" aria-expanded="false" aria-controls="flush-collapsedFour">
                    <?= __('Borrados') ?>
                </button>
            </h2>
            <div id="flush-collapsedFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <!-- Borrados -->
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="text-center card-title"><?= __('Borrados') ?></h3>
                                <p>&nbsp;</p>
                                <div class="table-responsive">
                                    <table class="table table-responsive table-striped table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col"><?= __('Serial de la máquina') ?></th>
                                                <th scope="col"><?= __('Nombre de la máquina') ?></th>
                                                <th scope="col"><?= __('Dia de Inicio') ?></th>
                                                <th scope="col"><?= __('Dia de Finalización') ?></th>
                                                <th scope="col"><?= __('Mes') ?></th>
                                                <th scope="col"><?= __('CashIn') ?></th>
                                                <th scope="col"><?= __('CashOut') ?></th>
                                                <th scope="col"><?= __('Ber') ?></th>
                                                <th scope="col"><?= __('Win') ?></th>
                                                <th scope="col"><?= __('Profit') ?></th>
                                                <th scope="col"><?= __('Jackpot') ?></th>
                                                <th scope="col"><?= __('Juegos Jugados') ?></th>
                                                <th scope="col"><?= __('ColJuegos 12%') ?></th>
                                                <th scope="col"><?= __('Administracion 1%') ?></th>
                                                <th scope="col"><?= __('Total a pagar') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($erases as $erase) :
                                                foreach ($machinesName as $machine) :
                                                    if ($erase->machine_id == $machine->id) {
                                                        $serialMachine = $machine->serial;
                                                        $serialName = $machine->name;
                                                    }
                                                endforeach;
                                            ?>
                                                <tr>
                                                    <td><?= h($serialMachine) ?></td>
                                                    <td><?= h($serialName) ?></td>
                                                    <td><?= h($erase->day_init) ?></td>
                                                    <td><?= h($erase->day_end) ?></td>
                                                    <td><?= h($erase->month_id) ?></td>
                                                    <td><?= $this->Number->currency($erase->cashin, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($erase->cashout, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($erase->bet, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($erase->win, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($erase->profit, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($erase->jackpot, 'USD') ?></td>
                                                    <td><?= h($erase->gamesplayed) ?></td>
                                                    <td><?= $this->Number->currency($erase->coljuegos, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($erase->admin, 'USD') ?></td>
                                                    <td><?= $this->Number->currency($erase->total, 'USD') ?></td>
                                                    <td><?= $this->Html->image('Accountants/' . $erase->image, ['class' => 'img-thumbnail']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php foreach ($totalErases as $total) : ?>
                                        <h3 class="lead text-center">Total de liquidacion de Borrados: <span><?= $this->Number->currency($total->total, 'USD') ?></span></h3>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($isAdmin) : ?>
        <button type="button" id="generate" class="btn btn-primary"><?= __('Descargar Liquidacion') ?></button>
    <?php endif ?>
<?php endif ?>


<?= $this->Html->Script('erase') ?>
<?= $this->Html->Script('accounts') ?>
<?= $this->Html->Script('confirmedAccountants') ?>
<?= $this->Html->Script('createLiquidation') ?>