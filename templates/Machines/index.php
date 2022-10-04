<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Machine[]|\Cake\Collection\CollectionInterface $machines
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Maquinas') ?></h3>
                    <p class="small text-medium-emphasis">Maquinas agregadas a la fecha</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Agregar una Maquina'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th><?= __('# Interno') ?></th>
                            <th><?= __('Serial de la Máquina') ?></th>
                            <th><?= __('Nombre de la Máquina') ?></th>
                            <th><?= __('Año del Modelo') ?></th>
                            <th><?= __('Modelo de la Máquina') ?></th>
                            <th><?= __('Garantia') ?></th>
                            <th><?= __('Fecha de Instalación') ?></th>
                            <th><?= __('Casino Instalado') ?></th>
                            <th><?= __('Propietario') ?></th>
                            <th><?= __('Compañia') ?></th>
                            <th><?= __('Tipo de Contrato') ?></th>
                            <th><?= __('image') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($machines as $machine) : ?>
                            <tr>
                                <td><?= $machine->idint === null ? '' : $this->Number->format($machine->idint) ?></td>
                                <td><?= h($machine->serial) ?></td>
                                <td><?= h($machine->name) ?></td>
                                <td><?= $this->Number->format($machine->yearModel) ?></td>
                                <td><?= $machine->has('model') ? h($machine->model->name) : '' ?></td>
                                <td><?= h($machine->warranty) ?></td>
                                <td><?= h($machine->dateInstalling) ?></td>
                                <td><?= $machine->has('casino') ? h($machine->casino->name) : '' ?></td>
                                <td><?= $machine->has('owner') ? h($machine->owner->name) : '' ?></td>
                                <td><?= $machine->has('company') ? h($machine->company->name) : '' ?></td>
                                <td><?= $machine->has('contract') ? h($machine->contract->name) : '' ?></td>
                                <td><?= $this->Html->image('Machines/'.$machine->image, ['class' => 'img-thumbnail']) ?></td>
                                <td class="actions">
                                    <div class="btn-group btn-group-toggle mx-3">
                                        <a class="nav-link nav-group-toggle" href="/machines/edit/<?= $machine->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/machines/view/<?= $machine->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/machines/delete/<?= $machine->id ?>">
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