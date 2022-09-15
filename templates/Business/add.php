<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Busines $busines
 */
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Inscribir Empresa') ?></h3>
                    <p class="small text-medium-emphasis">Inscripcion de la Empresa</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Volver al Listado'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <div class="column-responsive column-80">
                <div class="business form content">
                    <?= $this->Form->create($busines, ['novalidate' => true, 'class' => 'row g-3 needs-validation'] ) ?>
                    <fieldset>
                        <legend><?= __('Add Busines') ?></legend>
                        <div class="row g-2">
  <div class="col-md">
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="mdo@example.com">
      <label for="floatingInputGrid">Email address</label>
    </div>
  </div>
                        <?php
                        echo $this->Form->control('name');
                        echo $this->Form->control('nit');
                        echo $this->Form->control('phone');
                        echo $this->Form->control('address');
                        echo $this->Form->control('email');
                        echo $this->Form->control('owner_id', ['options' => $owner]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>