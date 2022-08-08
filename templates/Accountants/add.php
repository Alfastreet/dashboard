<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant $accountant
 * @var \Cake\Collection\CollectionInterface|string[] $machines
 * @var \Cake\Collection\CollectionInterface|string[] $casinos
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="row">
    <div class="title">
        <h3>Contadores del Casino <?= h($nameCasino) ?></h3>
    </div>
    <div class="column-responsive column-80">
        <div class="machinesCasinos">

            <?php foreach($machines as $machine): ?> 
                <div class="card">
                    <!--Imagen de la maquina-->

                    <div class="card-header">
                        <h5 class="card-title"><?= h($machine->name) ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Serial de la maquina: <span class="text-muted"><?= h($machine->serial) ?></span></p>
                        <p class="card-text">Año: <span class="text-muted"><?= h($machine->yearModel) ?></span></p>
                        <p class="card-text">Garantia: <span class="text-muted"><?= h($machine->warranty) ?></span></p>
                        <p class="card-text">Modelo: <span class="text-muted"><?= h($machine->modelName)?></span></p>
                        <p class="card-text">Marca: <span class="text-muted"><?= h($machine->nameMark)?></span></p>
                        <p class="card-text">Fecha de Instalacion: <span class="text-muted"><?= h($machine->dateInstalling)?></span></p>
                        <p class="card-text">Monitor: <span class="text-muted"><?= h($machine->display)?></span></p>
                    </div>
                    <div class="card-footer">
                        <?= $this->Html->link(__('Generar Contador'), ['controller' => 'detailsaccountants', 'action' => 'add', '?' => ['id' => $_GET['id'], 'casinoid' => $_GET['casinoid'], 'machineid' => $machine->id, 'token' => $_GET['token']]], ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            <?php endforeach ?> 


            <!-- <?= $this->Form->create($accountant, ['type' => 'file']) ?>
            <fieldset>
                <legend><?= __('Añadir Contador') ?></legend>                                

            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?> -->
        </div>
    </div>
</div>

<script src="http://localhost/alfastreet/webroot/js/accountants.js"></script>