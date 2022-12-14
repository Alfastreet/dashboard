<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card-group d-block d-md-flex row">
          <div class="card col-md-7 p-4 mb-0">
            <div class="card-body">
              <h1><?= __('Iniciar Sesión') ?></h1>
              <p class="text-medium-emphasis"><?= __('Ingresa a tu cuenta') ?></p>
              <?= $this->Form->create() ?>
                <div class="input-group mb-3">
                  <span class="input-group-text d-none d-sm-block">
                    <svg class="icon">
                      <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg>
                  </span>
                    <?= $this->Form->control('email', ['required' => true, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Correo Electronico']) ?>
                  </div>
                <div class="input-group mb-4">
                  <span class="input-group-text  d-none d-sm-block">
                    <svg class="icon">
                      <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg>
                  </span>
                  <?= $this->Form->control('password', ['required' => true, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Password']) ?>
                </div>
                <div class="row">
                  <div class="col-6">
              <?= $this->Form->submit(__('Ingresar'), ['class' => 'btn btn-primary']) ?>
              <?= $this->Form->end() ?>
                </div>
                <div class="col-6 text-end">
                  <!-- <button class="btn btn-link px-0" type="button">Forgot password?</button> -->
                </div>
              </div>
            </div>
          </div>
          <div class="card col-md-5 text-white bg-primary py-5">
            <div class="card-body text-center">
              <div>
                <h2>Registrate</h2>
                <p>Registrate para acceder al sistema, se necesitara una previa autorización para acceder</p></div>
                <?= $this->Html->link(__('Registrar Ahora'), ['action' => 'add'], ['class' => 'btn btn-lg btn-outline-light mt-3']) ?>
                <?= $this->Html->link(__('¿Olvidaste tu contraseña?'), ['action' => 'forgotpass'], ['class' => 'btn btn-lg btn-outline-light mt-3']) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>