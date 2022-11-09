<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $quotes
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $detailsquotes
 * @var \Cake\Collection\CollectionInterface|string[] $parts
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Ordenes de Trabajo', 'url' => ['controller' => 'Orders', 'action' => 'index']],
    ['title' => 'Generar Orden de trabajo # '.$this->request->getQuery('quoteId')],
])
?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Orden de Trabajo # ' . $this->request->getQuery('quoteId')) ?></h3>
                    <input type="hidden" id="quote_id" value="<?= $this->request->getQuery('quoteId') ?>">
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
                <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                    <?= $this->Html->link(__('Ver todas las Ordenes de Trabajo'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <div class="column-responsive column-80">
                <div class="orders form content">
                    <?= $this->Form->create($order, ['class' => 'row g-3 needs-validation']) ?>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Numero de Cotizacion:') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $this->request->getQuery('quoteId') ?>">
                                </div>
                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Cliente Dirigido:') ?></label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $client->name ?>">
                                    <input type="hidden" id="client_id" value="<?= $this->request->getQuery('clientId') ?>">
                                </div>
                            </div>
                            <div class="col">
                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Tecnico Encargado:') ?></label>
                                <div class="col-sm-10">
                                    <?= $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control', 'label' => false, 'id' => 'user', 'empty' => ['0' => 'Seleccione al tecnico encargado'], 'require' => true]) ?>
                                </div>
                                <label for="staticEmail" class="col-sm-6 col-form-label fw-bold"><?= __('Maquina:') ?></label>
                                <div class="col-sm-10">
                                    <?= $this->Form->control('machine_id', ['options' => $machine, 'class' => 'form-control', 'label' => false, 'id' => 'machine', 'empty' => ['0' => 'Seleccione la maquina'], 'require' => true]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 ">
                            <h2 class="text-center "><?= __('Datos de Apuesta') ?></h2>
                            <div class="col p-5">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <?= __('Apuesta Minima') ?>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?= $this->Form->control('totalmin', ['class' => 'form-control', 'label' => false, 'id' => 'totalmin', 'require' => false, 'placeholder' => 'Total Apuesta minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('interiormin', ['class' => 'form-control', 'label' => false, 'id' => 'interiormin', 'require' => false, 'placeholder' => 'Interior Apuesta minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('exteriormin', ['class' => 'form-control', 'label' => false, 'id' => 'exteriormin', 'require' => false, 'placeholder' => 'Exterior Apuesta minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x36min', ['class' => 'form-control', 'label' => false, 'id' => 'x36min', 'require' => false, 'placeholder' => ' Apuesta x36 minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x18min', ['class' => 'form-control', 'label' => false, 'id' => 'x18min', 'require' => false, 'placeholder' => 'Apuesta x18 minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x12min', ['class' => 'form-control', 'label' => false, 'id' => 'x12min', 'require' => false, 'placeholder' => 'Apuesta x12 minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x9min', ['class' => 'form-control', 'label' => false, 'id' => 'x9min', 'require' => false, 'placeholder' => 'Apuesta x9 minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x7min', ['class' => 'form-control', 'label' => false, 'id' => 'x7min', 'require' => false, 'placeholder' => 'Apuesta x7 minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x6min', ['class' => 'form-control', 'label' => false, 'id' => 'x6min', 'require' => false, 'placeholder' => 'Apuesta x6 minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x3min', ['class' => 'form-control', 'label' => false, 'id' => 'x3min', 'require' => false, 'placeholder' => 'Apuesta x3 minima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x2min', ['class' => 'form-control', 'label' => false, 'id' => 'x2min', 'require' => false, 'placeholder' => 'Apuesta x2 minima', 'type' => 'number']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col  p-5">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                <?= __('Apuesta Maxima') ?>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?= $this->Form->control('totalmax', ['class' => 'form-control', 'label' => false, 'id' => 'totalmax', 'require' => false, 'placeholder' => 'Total Apuesta maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('interiormax', ['class' => 'form-control', 'label' => false, 'id' => 'interiormax', 'require' => false, 'placeholder' => 'Interior Apuesta maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('exteriormax', ['class' => 'form-control', 'label' => false, 'id' => 'exteriormax', 'require' => false, 'placeholder' => 'Exterior Apuesta Maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x36max', ['class' => 'form-control', 'label' => false, 'id' => 'x36max', 'require' => false, 'placeholder' => ' Apuesta x36 maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x18max', ['class' => 'form-control', 'label' => false, 'id' => 'x18max', 'require' => false, 'placeholder' => 'Apuesta x18 maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x12max', ['class' => 'form-control', 'label' => false, 'id' => 'x12max', 'require' => false, 'placeholder' => 'Apuesta x12 maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x9max', ['class' => 'form-control', 'label' => false, 'id' => 'x9max', 'require' => false, 'placeholder' => 'Apuesta x9 maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x7max', ['class' => 'form-control', 'label' => false, 'id' => 'x7max', 'require' => false, 'placeholder' => 'Apuesta x7 maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x6max', ['class' => 'form-control', 'label' => false, 'id' => 'x6max', 'require' => false, 'placeholder' => 'Apuesta x6 maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x3max', ['class' => 'form-control', 'label' => false, 'id' => 'x3max', 'require' => false, 'placeholder' => 'Apuesta x3 maxima', 'type' => 'number']) ?>
                                                <?= $this->Form->control('x2max', ['class' => 'form-control', 'label' => false, 'id' => 'x2max', 'require' => false, 'placeholder' => 'Apuesta x2 maxima', 'type' => 'number']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <h2 class="text-center"><?= __('Configuracion General') ?></h2>
                            <div class="col p-5">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <?= __('Configuracion Centro') ?>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <?= $this->Form->control('soplado', ['class' => 'form-control', 'label' => false, 'id' => 'soplado', 'require' => false, 'placeholder' => 'Soplado',]) ?>
                                                <?= $this->Form->control('contrasoplado', ['class' => 'form-control', 'label' => false, 'id' => 'contrasoplado', 'require' => false, 'placeholder' => 'Contrasoplado',]) ?>
                                                <?= $this->Form->control('timeapuesta', ['class' => 'form-control', 'label' => false, 'id' => 'timeapuesta', 'require' => false, 'placeholder' => 'Tiempo de Apuesta',]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col p-5">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <?= __('Configuracion Jackpot') ?>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                            <?= $this->Form->control('apuestaper', ['class' => 'form-control', 'label' => false, 'id' => 'apuestaper', 'require' => false, 'placeholder' => '% de Apuesta', 'type' => 'number']) ?>
                                            <?= $this->Form->control('hiddenper', ['class' => 'form-control', 'label' => false, 'id' => 'hiddenper', 'require' => false, 'placeholder' => '% de Hidden', 'type' => 'number']) ?>
                                            <?= $this->Form->control('frecuenciaini', ['class' => 'form-control', 'label' => false, 'id' => 'frecuenciaini', 'require' => false, 'placeholder' => 'Frecuencia Inicial',]) ?>
                                            <?= $this->Form->control('fecuenciafin', ['class' => 'form-control', 'label' => false, 'id' => 'fecuenciafin', 'require' => false, 'placeholder' => 'Frecuencia Final',]) ?>
                                            <?= $this->Form->control('apuestamin', ['class' => 'form-control', 'label' => false, 'id' => 'apuestamin', 'require' => false, 'placeholder' => 'Apuesta Inicial',]) ?>
                                            <?= $this->Form->control('limitmax', ['class' => 'form-control', 'label' => false, 'id' => 'limitmax', 'require' => false, 'placeholder' => 'Maximo Limite',]) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->button(__('Crear Orden de Trabajo'), ['id' => 'generate', 'type' => 'button', 'class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Resumen de la Orden') ?></h3>
                    <p class="small text-medium-emphasis">&nbsp;</p>
                </div>
            </div>
            <div class="column-responsive column-80">
                <table class="table table-bordered table-striped table-responsive text-center table-hover">
                    <thead>
                        <th><?= __('Producto') ?></th>
                        <th><?= __('Cantidad') ?></th>
                        <th><?= __('Moneda') ?></th>
                        <th><?= __('Valor') ?></th>
                    </thead>
                    <?php foreach ($detailsquotes as $dt) : ?>
                        <?php foreach ($products as $p) {
                            if ($dt->product_id == $p->id) {
                                $nameProduct = $p->name;
                            }
                        }
                        foreach ($money as $m) {
                            if ($dt->money_id == $m->id) {
                                $moneyName = $m->name;
                            }
                        } ?>
                        <tr>
                            <td><?= h($nameProduct) ?></td>
                            <td><?= h($dt->amount) ?></td>
                            <td><?= h($moneyName) ?></td>
                            <td><?= $this->Number->currency($dt->value, 'USD')  ?></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="card-title mb-0"><?= __('Comentarios de la Cotizacion') ?></h3>
                    <p class="text-emphasis">&nbsp;</p>
                </div>
            </div>
            <p class="text-center"><?= $quotes->comments ?></p>
        </div>
    </div>
</div>

<?= $this->Html->script('orders.js') ?>