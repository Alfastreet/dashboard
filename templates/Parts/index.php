<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Part[]|\Cake\Collection\CollectionInterface $parts
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Piezas y Servicios'],
])

?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Piezas y Servicios') ?></h3>
                    <p class="small text-medium-emphasis">Piezas y Servicios agregados a la fecha</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Agregar una Pieza o Servicio'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="display table table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th><?= __('') ?></th>
                            <th><?= __('Serial') ?></th>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('Moneda') ?></th>
                            <th><?= __('Precio') ?></th>
                            <th><?= __('Tipo de Producto') ?></th>
                            <th><?= __('Cantidad Disponible') ?></th>
                            <th><?= __('') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($parts as $part) : ?>
                            <tr>
                                <td><?= $this->Html->image('Parts/' . $part->image, ['class' => 'img-thumbnail']) ?></td>
                                <td><?= h($part->serial) ?></td>
                                <td><?= h($part->name) ?></td>
                                <td><?= $part->has('money') ? h($part->money->name) : '' ?></td>
                                <td><?= $this->Number->currency($part->value, 'USD') ?></td>
                                <td><?= h($part->typeproduct_id) ?></td>
                                <td><?= $this->Number->format($part->amount) ?></td>
                                <td class="actions">
                                    <div class="btn-group btn-group-toggle mx-3">
                                        <a class="nav-link nav-group-toggle" href="/parts/edit/<?= $part->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/parts/view/<?= $part->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/parts/delete/<?= $part->id ?>">
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
