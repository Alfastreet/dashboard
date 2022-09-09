<div class="login">
  <div class="image-login">
    <img src="https://picsum.photos/1000/1000" alt="imagenAlfa">
  </div>
  <div class="login-form">
    <?= $this->Flash->render('auth') ?>
      <?= $this->Form->create() ?>
        <div class="mb-3">
          <?= $this->Form->control('email', ['required' => true, 'class' => 'form-control']) ?>
        </div>
        <div class="mb-3">
          
          <?= $this->Form->control('password', ['required' => true]) ?>

        </div>
      <?=  $this->Form->submit(__('Ingresar'), ['class' => 'btn btn-primary']) ?>
      <?= $this->Form->end() ?>
    <?=  $this->Html->link('Registrarse', ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-success']) ?>
  </div>
</div>


