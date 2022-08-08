<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detailsaccountant $detailsaccountant
 * @var \Cake\Collection\CollectionInterface|string[] $accountants
 */
?>

<?php include_once __DIR__.'/../layout/templates/header.php' ?>

<div class="row">

    <div class="column-responsive column-80">
        <div class="detailsaccountants form content">
            <?= $this->Form->create($detailsaccountant) ?>
            <fieldset>
                <legend><?= __('Añadir detalles del contador') ?></legend>
                    <div class="row">
                        <div class="col">
                            <label for="dateInit">Fecha de Inicio</label>
                            
                            <input type="date" class="form-control" id="dateInit" placeholder="Fecha de Inicio">
                        </div>
                        <div class="col">
                            <label for="dateEnd">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="dateEnd" placeholder="Fecha del ultimo informe">
                        </div>
                    </div>

                    <div class="form-row align-items-center">
                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="month">Mes: </label>
                            <select class="custom-select mr-sm-2" id="month">
                                <?php foreach($months as $month): ?>
                                    <option value="<?= $month->id ?>"><?=$month->month?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="col-auto my-1">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Año: </label>
                            <input type="number" disabled id="year" readonly value="2022">
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col">
                            <label for="totalIni">Total Inicial</label>
                            <input type="number" class="form-control" id="totalIni" placeholder="Total Inicial">
                        </div>
                        <div class="col">
                            <label for="totalEnd">Total Final</label>
                            <input type="number" class="form-control" id="totalEnd" placeholder="Total Final">
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col">
                            <label for="profit">Profit</label>
                            <input type="number" class="form-control" id="profit" placeholder="Profit">
                        </div>
                        <div class="col">
                            <label for="totalEnd">Total de Juegos Jugados</label>
                            <input type="number" class="form-control" id="totalJu" placeholder="Juegos Jugados">
                        </div>
                        
                    </div>

                <?php
                    echo $this->Form->control('coljuegoa', ['disabled' => true, 'readonly' => true]);
                    echo $this->Form->control('iva', ['disabled' => true, 'readonly' => true , 'value' => '150000']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?= $this->Html->script('detailsAccoutants') ?>