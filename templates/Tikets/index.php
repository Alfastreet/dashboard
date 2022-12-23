<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Tiket> $tikets
 */

use Cake\Chronos\Chronos;

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Tickets'],
]);

$date = Chronos::now('America/Bogota');

?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title text-center"><?= __('Historico de Tickets') ?></h2>
            <input type="hidden" id="userid" value="<?= $this->request->getSession()->read('Auth.id') ?>">
        </div>
        <div class="mb-4">
            <div class="tikets index content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-responsive text-center table-hover" >
                        <tr>
                            <th><?= __('#') ?></th>
                            <th><?= __('Tipo de Soporte') ?></th>
                            <th><?= __('Serial de la Maquina') ?></th>
                            <th><?= __('Nombre del Cliente') ?></th>
                            <th><?= __('Correo del Cliente') ?></th>
                            <th><?= __('Número telefonico') ?></th>
                            <th><?= __('Fecha de Creación') ?></th>
                            <th><?= __('Descripcion del Ticket') ?></th>
                            <th><?= __('') ?></th>
                        </tr>
                        <tbody>
                            <?php foreach ($tikets as $tiket) : ?>
                                <tr class="<?= $tiket->datecreate->addDays(3)->day <= $date->day ? 'table-danger' : ( $tiket->datecreate->addDays(2)->day <= $date->day ? 'table-warning' : ($tiket->status === 'Completado' ? 'table-success' : '')); ?>">
                                    <td><?= $this->Number->format($tiket->id) ?></td>
                                    <td><?= $tiket->has('support') ? $tiket->support->name : '' ?></td>
                                    <td><?= $tiket->machine_id === null ? 'No valido' : ($tiket->has('machine') ? $this->Html->link($tiket->machine->name, ['controller' => 'Machines', 'action' => 'view', $tiket->machine->id]) : '') ?></td>
                                    <td><?= h($tiket->name_client) ?></td>
                                    <td><?= h($tiket->email) ?></td>
                                    <td><?= h($tiket->phone) ?></td>
                                    <td><?= h($tiket->datecreate->toFormattedDateString()) ?></td>
                                    <td><?= h($tiket->comments) ?></td>
                                    <td class="actions">
                                        <div class="d-grid gap-2 d-md-block">
                                            <?php if ($tiket->status === 'Pendiente') : ?>
                                                <button class="btn btn-success change" type="button" value="<?= $tiket->id ?>">
                                                    <svg class="icon">
                                                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-note-add"></use>
                                                    </svg>
                                                </button>
                                            <?php endif; ?>
                                            <?php if ($tiket->resolved === "cotizacion") : ?>
                                                <a href="/quotes/add?tiket=<?= $tiket->id ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                                    <svg class="icon">
                                                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
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
</div>

<?= $this->Html->script('tikets') ?>