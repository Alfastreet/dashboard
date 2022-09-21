<div class="mb-3">
    <div class="row">
        <div class="col-md-2">
            <?= $this->Form->control('owner_id', ['options' => $owner, 'class' => 'form-control', 'label' => false, 'require' => true, 'label' => 'Dueño de la empresa:']) ?>
        </div>
    </div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col">
            <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Razon Social', 'label' => false]) ?>
        </div>
        <div class="col">
            <?= $this->Form->control('nit', ['class' => 'form-control', 'placeholder' => 'Nit', 'label' => false]) ?>
        </div>
    </div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col">
            <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Correo Electronico', 'label' => false]) ?>
        </div>
        <div class="col">
            <?= $this->Form->control('phone', ['class' => 'form-control', 'placeholder' => 'Telefono', 'label' => false]) ?>
        </div>
        <div class="col">
            <?= $this->Form->control('address', ['class' => 'form-control', 'placeholder' => 'Direccion', 'label' => false]) ?>
        </div>
    </div>
</div>