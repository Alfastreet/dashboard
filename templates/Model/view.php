<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Model $model
 */
?>
<div class="col-12">
    <div class="mb-3">
        <aside class="column">
            <div class="d-flex justify-content-between">
                <div class="">
                    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'btn btn-primary me-md-2']) ?>
                </div>
                <div class="">
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $model->id], ['class' => 'btn btn-primary me-md-2']) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $model->id], ['confirm' => __('Estas Seguro de eliminar la entrada # {0}?', $model->id), 'class' => 'btn btn-danger me-md-2']) ?>
                </div>
            </div>
        </aside>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="text-center card-title"><?= h($model->name) ?></h2>
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="text-center card-title"><?= __('Maquinas Inscritas con este Modelo') ?></h3>
                    <?php if (!empty($model->machines)) : ?>
                        <div class="table-responsive">
                            <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                                <tr>
                                    <th><?= __('Serial') ?></th>
                                    <th><?= __('Nombre') ?></th>
                                    <th><?= __('Fabricante') ?></th>
                                    <th><?= __('Imagen') ?></th>
                                    <th><?= __('Fecha de Instalación') ?></th>
                                    <th><?= __('Casino') ?></th>
                                    <th><?= __('Propietario') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                                <?php foreach ($model->machines as $machines) : ?>
                                    <tr>
                                        <td><?= h($machines->serial) ?></td>
                                        <td><?= h($machines->name) ?></td>
                                        <td><?= h($machines->maker_id) ?></td>
                                        <td><?= h($machines->image) ?></td>
                                        <td><?= h($machines->dateInstalling) ?></td>
                                        <td><?= h($machines->casino_id) ?></td>
                                        <td><?= h($machines->owner_id) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(__('View'), ['controller' => 'Machines', 'action' => 'view', $machines->id]) ?>
                                            <?= $this->Html->link(__('Edit'), ['controller' => 'Machines', 'action' => 'edit', $machines->id]) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Machines', 'action' => 'delete', $machines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $machines->id)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>