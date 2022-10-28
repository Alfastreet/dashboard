<div class="row">
    <div class="col md-4 offset-md-4">
        <?= $this->Flash->render() ?>
        <div class="card">
            <h3 class="card-header">Reinicio de Contraseña</h3>
            <div class="card-body">
                <?= $this->Form->create() ?>
                    <div class="form-group">
                        <?= $this->Form->control('password', ['class' => 'form-control']) ?>
                    </div>
                <?= $this->Form->button('Reestablecer mi contraseña', ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link('Iniciar Sesion', ['action' => 'login'], ['class' => 'btn btn-success']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>