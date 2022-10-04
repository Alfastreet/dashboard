<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Usuarios') ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Añadir un nuevo Usuario'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th><?= __('Nombres') ?></th>
                            <th><?= __('Apellidos') ?></th>
                            <th><?= __('Dirección') ?></th>
                            <th><?= __('Telefono') ?></th>
                            <th><?= __('Identificación') ?></th>
                            <th><?= __('Correo Electronico') ?></th>
                            <th><?= __('Rol') ?></th>
                            <th><?= __('') ?></th>
                            <th><?= __('') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) :
                            foreach($rol as $ro){
                                if($user->rol_id === $ro->id){
                                    $rolName = $ro->rol;
                                }
                            } ?>
                            <tr>
                                <td><?= h($user->name) ?></td>
                                <td><?= h($user->lastName) ?></td>
                                <td><?= h($user->address) ?></td>
                                <td><?= $this->Number->format($user->phone) ?></td>
                                <td><?= $this->Number->format($user->identification) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= h($rolName) ?></td>
                                <td><?= $this->Html->image('imgusers/' . $user->image, ['class' => 'card-img-top']) ?></td>
                                <td class="actions">
                                <div class="btn-group btn-group-toggle mx-3">
                                        <a class="nav-link nav-group-toggle" href="/users/edit/<?= $user->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/users/view/<?= $user->id ?>">
                                            <svg class="nav-icon" width="20" height="20">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
                                            </svg>
                                        </a>
                                        <a class="nav-link nav-group-toggle" href="/users/delete/<?= $user->id ?>">
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

