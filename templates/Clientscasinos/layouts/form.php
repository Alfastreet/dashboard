<div class="mb-3">
    <div class="row">
        <div class="col-md-6">
            <?= $this->Form->control('client_id', ['options' => $clients, 'empty'=> ['' => 'Nombre del Cliente'], 'class' => 'form-control', 'label' => false, 'require' => true, 'label' => false]) ?>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('casino_id', ['options' => $casinos, 'empty'=> ['' => 'Casino Perteneciente'], 'default' => $casinoid, 'class' => 'form-control', 'label' => false, 'require' => true, 'label' => false, 'readonly' => true ]) ?>
        </div>
    </div>
</div>