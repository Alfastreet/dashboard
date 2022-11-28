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
                            <p class="mb-0"><?= __('Nombres Completos')?></p>
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
