<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Model[]|\Cake\Collection\CollectionInterface $model
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Modelos de Maquinas') ?></h3>
                    <p class="small text-medium-emphasis">Modelos de las diferentes maquinas que hay registradas</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Agregar una Modelo'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th><?= __('Modelo') ?></th>
                            <th class="actions"><?= __('') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($model as $model) : ?>
                            <tr>
                                <td><?= h($model->name) ?></td>
                                <td class="actions">
                                    <div class="btn-group btn-group-toggle mx-3">
                                        <a class="nav-link nav-group-toggle" href="/model/edit/<?= $model->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/model/view/<?= $model->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/model/delete/<?= $model->id ?>">
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