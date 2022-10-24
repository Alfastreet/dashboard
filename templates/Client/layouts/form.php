<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <?= $this->Form->control('business_id', ['options' => $business, 'empty'=> ['' => 'Selecciona la empresa Encargada'], 'class' => 'form-control',  'label' => false, 'require' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('position_id', ['options' => $clientposition, 'empty'=> ['' => 'Cargo del Cliente'], 'class' => 'form-control', 'label' => false, 'require' => true, 'label' => false ]) ?>
        </div>
    </div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col">
            <?= $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Nombre del Cliente', 'label' => false, 'id' => 'clientName']) ?>
        </div>
        <div class="col">
            <?= $this->Form->control('phone', ['class' => 'form-control', 'placeholder' => 'Telefono', 'label' => false]) ?>
        </div>
    </div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col">
            <?= $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Correo Electronico', 'label' => false]) ?>
        </div>
        
    </div>
</div>