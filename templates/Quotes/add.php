<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Quotes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotes form content">
            <?= $this->Form->create($quote) ?>
            <fieldset>
                <legend><?= __('Nueva Cotizaciòn') ?></legend>
                <div class="input-group mb-3">
                    <label>Selecciona tu Usuario</label>
                    
                    <?= $this->Form->control('user_id', [
                            'options' => $users, 
                            'label' => false, 
                            'id' => 'user',
                        ]); ?>
                </div>

                <div class="input-group mb-3">
                    <label>Selecciona la Empresa</label>
                    <?= $this->Form->control('business_id', [
                            'label' => false, 
                            'id' => 'bussines',
                            'empty' => '-- Selecciona Una opcion --'
                        ]); ?>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nombre del Responsable</label>
                        <select name="client" id="client" class="form-control">
                            <!--Contenido mediante AJAX-->
                        </select>
                    </div>
                    
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="casino" class="form-label">Casino</label>
                        <select name="casino" id="casino" class="form-control">
                            <!--Contenido mediante AJAX-->
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="machine" class="form-label">Maquina</label>
                        <select name="machine" id="machine" class="form-control">
                            <!--Contenido mediante AJAX-->
                        </select>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="serial" class="form-label">Serial de la pieza</label>
                        <input type="hidden" name="serial_id" id="serial_id">
                        <input type="text" name="serial" id="serial">
                    </div>
                    <div class="col-sm-6">
                        <label for="name_serial" class="form-label">Nombre de la pieza</label>
                        <input type="text" name="name_serial" id="name_serial" disabled>
                    </div>
                    <div class="col-sm-6">
                        <label for="value_serial" class="form-label">Valor de la pieza</label>
                        <input type="hidden" name="serial_money_id" id="serial_money_id" disabled>
                        <input type="hidden" id="money_id" name="money_id">
                        <input type="text" name="value_serial" id="value_serial" disabled>
                    </div>
                    <div class="col-sm-6">
                        <label for="amount" class="form-label">Cantidad</label>
                        <input type="number" name="amount" id="amount" required >
                    </div>
                    <div class="col-sm-6">
                        <label for="subtotal" class="form-label">Subtotal</label>
                        <input type="hidden" name="subtotalNumber" id="subtotalNumber" required disabled>
                        <input type="text" name="subtotal" id="subtotal" required disabled>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Agregar') , ['id' => 'añadir', 'type' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!--Table tmp details quote-->

<div class="row">

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Serial</th>
        <th scope="col">Nombre de la pieza</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio UN</th>
        <th scope="col">Tipo de moneda</th>
        <th scope="col">Subtotal</th>
        </tr>
    </thead>
    <tbody id="controller">
        <!--Datos mediante AJAX-->        
    </tbody>

    <tfooter id="totailsDolar">
        <!--Ajax Content-->
    </tfooter>

    <tfooter id="totailsEuro">
        <!--Ajax Content-->
    </tfooter>

    <tfooter id="totailsPeso">
        <!--Ajax Content-->
    </tfooter>
    </table>

</div>

<button type="button" class="btn btn-primary btn-lg" id="process">Procesar Cotizacion</button>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?= $this->Html->script('quotes') ?>