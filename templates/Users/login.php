
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
  <div class="mb-3">
    
    
    <?= $this->Form->control('email', ['required' => true]) ?>
    
  </div>
  <div class="mb-3">
    
    <?= $this->Form->control('password', ['required' => true]) ?>

  </div>
 <?=  $this->Form->button('Ingresar', ['class' => 'btn btn-primary']) ?>
 <?=  $this->Html->link('Registrarse', ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-success']) ?>
<?= $this->Form->end() ?>