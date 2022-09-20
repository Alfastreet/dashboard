<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines[]|\Cake\Collection\CollectionInterface $business
 */
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Empresas') ?></h3>
                    <p class="small text-medium-emphasis">Empresas de los clientes agregados a la fecha</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Agregar una Empresa'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table  table-responsive table-striped table-hover table-sm table-bordered text-center">
                    <thead>
                        <tr>
                            <th><?= __('Nombre') ?></th>
                            <th><?= __('N.I.T') ?></th>
                            <th><?= __('Teléfono') ?></th>
                            <th><?= __('Dirección') ?></th>
                            <th><?= __('Correo Electronico') ?></th>
                            <th><?= __('Dueño') ?></th>
                            <th class="actions"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($business as $busines) : ?>
                            <tr>
                                <td><?= h($busines->name) ?></td>
                                <td><?= h($busines->nit) ?></td>
                                <td><?= $this->Number->format($busines->phone) ?></td>
                                <td><?= h($busines->address) ?></td>
                                <td><?= h($busines->email) ?></td>
                                <td><?= $busines->has('owner') ? h($busines->owner->name) : '' ?></td>
                                <td class="actions">
                                    <div class="btn-group btn-group-toggle mx-3">
                                        <a class="nav-link nav-group-toggle" href="/business/edit/<?=$busines->id?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/business/view/<?=$busines->id?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>                                       
                                        <a class="nav-link nav-group-toggle" href="/business/delete/<?=$busines->id?>">
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

<?= $this->element('paginator')?>