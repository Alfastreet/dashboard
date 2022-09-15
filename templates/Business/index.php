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
                                <td><?= $this->Number->format($busines->owner_id) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $busines->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $busines->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $busines->id], ['confirm' => __('Are you sure you want to delete # {0}?', $busines->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layout/paginator.php' ?>