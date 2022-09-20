<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <?= $this->Form->control('business_id', ['options' => $business, 'class' => 'form-control', 'label' => false, 'require' => true, 'label' => false, 'empty'=> ['' => 'Empresa Perteneciente']]); ?>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('owner_id',['options' => $owners, 'class' => 'form-control', 'label' => false, 'require' => true, 'label' => false, 'empty'=> ['' => 'Dueño']] ) ?>
        </div>
    </div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col">
            <?=$this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Nombre del Casino', 'label' => false]) ?>
        </div>
        <div class="col">
            <?= $this->Form->control('phone', ['class' => 'form-control', 'placeholder' => 'Teléfono del Casino', 'label' => false]) ?>
        </div>
    </div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col">
            <?= $this->Form->control('address', ['class' => 'form-control', 'placeholder' => 'Dirección', 'label' => false]) ?>
        </div>
        <div class="col">
            <?= $this->Form->control('state_id', ['empty'=> ['' => 'Departamento'],'class' => 'form-control', 'label' => false]) ?>
        </div>
        <div class="col">
            <?= $this->Form->control('city_id', ['empty'=> ['' => 'Ciudad'],'class' => 'form-control', 'label' => false]) ?>
        </div>
    </div>
</div>
<div class="mb-3">
    <div class="row">
        <div class="col">
            <?= $this->Form->control('image', ['type' => 'file', 'class' => 'form-control', 'label' => false, 'accept' => 'image/png,image/jpeg']) ?>
        </div>
    </div>
</div>