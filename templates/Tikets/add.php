<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tiket $tiket
 * @var \Cake\Collection\CollectionInterface|string[] $machines
 */
?>
<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="mb-3">
                        <div class="d-flex justify-content-between">
                            <h2 class="text-center card-title"><?= __('Solicitud de Mesa De ayuda - Help Desk') ?></h2>
                            <img src="<?= $_SERVER['REQUEST_SCHEME'].'://'. $_SERVER['HTTP_HOST'].'/webroot/img/logoalfa.png' ?>" class="img-fluid img-thumbnail">
                        </div>
                    </div>
                    <div class="column-responsive column-80">
                        <?= $this->Form->create($tiket, ['class' => 'row g-3 needs-validation']) ?>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('support_id', ['options' => $support, 'class' => 'form-control', 'label' => false, 'empty' => ['0' => 'Tipo de Solicitud'], 'id' => 'support', 'required' => 'true']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('name_client', ['class' => 'form-control mb-3', 'label' => false, 'placeholder' => 'Nombres y Apellidos', 'id' => 'nameClient', 'required' => 'true']) ?>
                                    <?= $this->Form->control('email', ['class' => 'form-control mb-3', 'label' => false, 'placeholder' => 'Correo electronico de Contacto', 'id' => 'email', 'required' => 'true']) ?>
                                    <?= $this->Form->control('phone', ['type' => 'number', 'class' => 'form-control mb-3', 'label' => false, 'placeholder' => 'Telefono de Contacto', 'id' => 'phone', 'required' => 'true']) ?>
                                    <?= $this->Form->control('machine_id', ['type' => 'text', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Ingresa el Serial de tu maquina', 'id' => 'serial', 'required' => 'true']) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('comments', ['type' => 'textarea', 'class' => 'form-control', 'label' => false, 'placeholder' => 'Describe tu solicitud', 'id' => 'comments', 'required' => 'true']) ?>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->button(__('Generar Ticket'), ['class' => 'btn btn-primary', 'id' => 'submit']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script('tikets') ?>