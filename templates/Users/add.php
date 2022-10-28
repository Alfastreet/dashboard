<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Registrate') ?></h3>
                    <p class="small text-medium-emphasis">Bienvenido al registro para el sistema Alfastreet</p>
                </div>
            </div>
            <div class="row">
                <div class="column-responsive column-80">
                    <div class="users form content">
                        <?= $this->Form->create($user, ['type' => 'file', 'class' => 'row g-3 needs-validation']) ?>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombres', 'require' => true]) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('lastName', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Apellidos', 'require' => true]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('address', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Dirección', 'require' => true]) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('phone', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Numero de Contacto', 'require' => true, 'type' => 'number']) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('identification', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Numero de Identificación', 'require' => true, 'type' => 'number']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('email', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Correo electronico', 'require' => true]) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('password', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Contraseña', 'require' => true]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('image', ['type' => 'file', 'class' => 'form-control', 'label' => false, 'require' => true]) ?>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->button(__('Registrarse'), ['class' => 'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>