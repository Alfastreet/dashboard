<div class="row">
    <div class="col">
        <?= $this->Form->control('image', ['type' => 'file', 'accept' => 'image/png,image/jpeg', 'class' => 'form-control', 'label' => false, 'id' => 'image']); ?>
        <img id="file" class="img-thumbnail rounded">
    </div>
    <div class="col">
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <?= $this->Form->control('serial', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Serial']); ?>
                </div>
                <div class="col">
                    <?= $this->Form->control('name', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Nombre de la pieza']); ?>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <?= $this->Form->control('money_id', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Tipo de Moneda']); ?>
                </div>
                <div class="col">
                    <?= $this->Form->control('value', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Valor de la pieza']); ?>
                </div>
                <div class="col">
                    <?= $this->Form->control('amount', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Cantidad disponible']); ?>
                </div>
            </div>
        </div>
    </div>
</div>