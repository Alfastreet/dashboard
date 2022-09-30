<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

 foreach($rol as $r){
    if($user->rol_id === $r->id){
        $nameRol = $r->rol;
    }
 }
?>
<?php include_once __DIR__ . '/layouts/aside.php' ?>

<section style="background-color: #eee; " class="mt-4">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <?= $this->Html->image('imgusers/' . $user->image, ['class' => 'rounded-circle img-fluid', 'alt' => 'avatar', 'style' => 'width: 150px;']) ?>
                    <h5 class="my-3"><?= __($user->name . ' ' . $user->lastName) ?></h5>
                    <p class="text-muted mb-1"><?= $nameRol ?></p>
                    <p class="text-muted mb-4"><?= $user->address ?></p>
                    <div class="d-flex justify-content-center mb-2">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary me-md-2']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nombres Completos</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= __($user->name . ' ' . $user->lastName) ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Identificación</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= __($user->identification) ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Correo Electronico</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= __($user->email) ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Telefono</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"> <?= __($user->phone) ?> </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Direccion</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0"><?= __($user->address) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- 
<div class="row">

    <div class="column-responsive column-80">
        <div class="users view content">
            <table>
                <tr>
                    <th><?= __('Identification') ?></th>
                    <td><?= $this->Number->format($user->identification) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rol Id') ?></th>
                    <td><?= $this->Number->format($user->rol_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Checked') ?></th>
                    <td><?= $this->Number->format($user->checked) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Quotes') ?></h4>
                <?php if (!empty($user->quotes)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('User Id') ?></th>
                                <th><?= __('Business Id') ?></th>
                                <th><?= __('Date') ?></th>
                                <th><?= __('Total') ?></th>
                                <th><?= __('Estatus Id') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($user->quotes as $quotes) : ?>
                                <tr>
                                    <td><?= h($quotes->id) ?></td>
                                    <td><?= h($quotes->user_id) ?></td>
                                    <td><?= h($quotes->business_id) ?></td>
                                    <td><?= h($quotes->date) ?></td>
                                    <td><?= h($quotes->total) ?></td>
                                    <td><?= h($quotes->estatus_id) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Quotes', 'action' => 'view', $quotes->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['controller' => 'Quotes', 'action' => 'edit', $quotes->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Quotes', 'action' => 'delete', $quotes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quotes->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div> -->