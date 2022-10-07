<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Nueva Cotización') ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Ver todas las Cotizaciones'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="quotes form content">
                    <?= $this->Form->create($quote, ['class' => 'row g-3 needs-validation']) ?>
                    <fieldset>
                        <input type="hidden" name="userid" id="userid" value="<?= $this->request->getSession()->read('Auth.id') ?>">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $this->Form->control('business_id', [
                                        'class' => 'form-control',
                                        'label' => false,
                                        'id' => 'bussines',
                                        'empty' => ['' => 'Empresa Dirigida la Cotización']
                                    ]); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="firstName" class="form-label">Nombre del Responsable</label>
                                    <select name="client" id="client" class="form-control">
                                        <!--Contenido mediante AJAX-->
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="casino" class="form-label">Casino</label>
                                    <select name="casino" id="casino" class="form-control">
                                        <!--Contenido mediante AJAX-->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="machine" class="form-label">Maquina (Opcional)</label>
                                    <select name="machine" id="machine" class="form-control">
                                        <!--Contenido mediante AJAX-->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="serial" class="form-label">Serial de la pieza</label>
                                    <input type="hidden" name="serial_id" id="serial_id">
                                    <input type="text" name="serial" id="serial" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="name_serial" class="form-label">Nombre de la pieza</label>
                                    <input type="text" name="name_serial" id="name_serial" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="value_serial" class="form-label">Valor de la pieza</label>
                                    <input type="hidden" name="serial_money_id" id="serial_money_id" disabled>
                                    <input type="hidden" id="money_id" name="money_id">
                                    <input type="text" name="value_serial" id="value_serial" class="form-control" disabled>
                                </div>
                                <div class="col">
                                    <label for="amount" class="form-label">Cantidad</label>
                                    <input type="number" name="amount" id="amount" class="form-control" min="0" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <label for="subtotal" class="form-label">Subtotal</label>
                                    <input type="hidden" name="subtotalNumber" id="subtotalNumber" required disabled>
                                    <input type="text" name="subtotal" id="subtotal" class="form-control" required disabled>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <?= $this->Form->button(__('Agregar'), ['id' => 'anadir', 'type' => 'button', 'class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Table tmp details quote-->

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="column-responsive column-80">
                <table class="table table-bordered table-striped table-responsive text-center table-hover">
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
            <button type="button" class="btn btn-primary" id="process">Procesar Cotizacion</button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?= $this->Html->script('quotes') ?>