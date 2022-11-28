<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Accountant[]|\Cake\Collection\CollectionInterface $accountants
 */

$this->Breadcrumbs->add([
    ['title' => 'Inicio', 'url' => '/'],
    ['title' => 'Participaciones']
]);

?>

<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="text-center card-title"><?= __('Informe de Participaciones') ?></h2>
            <div class="table-responsive">
                <table class="table  table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                    <thead>
                        <tr>
                            <th><?= __('Cliente') ?></th>
                            <th><?= __('Enero') ?></th>
                            <th><?= __('Febrero') ?></th>
                            <th><?= __('Marzo') ?></th>
                            <th><?= __('Abril') ?></th>
                            <th><?= __('Mayo') ?></th>
                            <th><?= __('Junio') ?></th>
                            <th><?= __('Julio') ?></th>
                            <th><?= __('Agosto') ?></th>
                            <th><?= __('Septiembre') ?></th>
                            <th><?= __('Octubre') ?></th>
                            <th><?= __('Noviembre') ?></th>
                            <th><?= __('Diciembre') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $client) : ?>
                            <tr>
                                <td><?= h($client->name) ?></td>

                                <?php if ($enero !== null) {
                                    if ($enero->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $enero->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($febrero !== null) {
                                    if ($febrero->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $febrero->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>
                                
                                <?php if ($marzo !== null) {
                                    if ($marzo->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $marzo->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($abril !== null) {
                                    if ($abril->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $abril->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($mayo !== null) {
                                    if ($mayo->casino_id === $client->Casino['id']) { ?>
                                        <td><?= $mayo->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($junio !== null) {
                                    if ($junio->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $junio->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($julio !== null) {
                                    if ($julio->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $julio->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($agosto !== null) {
                                    if ($agosto->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $agosto->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($septiembre !== null) {
                                    if ($septiembre->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $septiembre->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($octubre !== null) {
                                    if ($octubre->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $octubre->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($noviembre !== null) {
                                    if ($noviembre->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $noviembre->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                                <?php if ($diciembre !== null) {
                                    if ($diciembre->casino_id === $client->Casinos['id']) { ?>
                                        <td><?= $diciembre->totalLiquidation ?></td>
                                    <?php }
                                } else { ?>
                                    <td><?= __('No hay datos para mostrar') ?></td>
                                <?php } ?>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- 
<div class="col-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="accountants index content">
                <h2 class="text-center"><?= __('Seguimiento de Participaciones') ?></h2>
                <div class="table-responsive">
                    <table class="table  table-responsive table-striped table-hover table-sm table-bordered text-center" id="myTable">
                        <caption>Lista de Participaciones Totales</caption>
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('id', '#') ?></th>
                                <th scope="col"><?= __('Nombre de la Maquina') ?></th>
                                <th scope="col"><?= __('Casino') ?></th>
                                <th scope="col"><?= __('Dia de Inicio') ?></th>
                                <th scope="col"><?= __('Dia de Finalización') ?></th>
                                <th scope="col"><?= __('Mes') ?></th>
                                <th scope="col"><?= __('Año') ?></th>
                                <th scope="col"><?= __('Cashin') ?></th>
                                <th scope="col"><?= __('Cashout') ?></th>
                                <th scope="col"><?= __('Bet') ?></th>
                                <th scope="col"><?= __('Win') ?></th>
                                <th scope="col"><?= __('Profit') ?></th>
                                <th scope="col"><?= __('Jackpot') ?></th>
                                <th scope="col"><?= __('Total de Juegos Jugados') ?></th>
                                <th scope="col"><?= __('Coljuegos 12%') ?></th>
                                <th scope="col"><?= __('Administración 1%') ?></th>
                                <th scope="col"><?= __('Total') ?></th>
                                <th scope="col"><?= __('Alfastreet 40%') ?></th>
                                <th scope="col"><?= __('Imagen') ?></th>

                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php foreach ($accountants as $accountant) : ?>
                                <tr>
                                    <th scope="row"><?= $this->Number->format($accountant->id) ?></th>
                                    <td><?= $accountant->has('machine') ? h($accountant->machine->name) : '' ?></td>
                                    <td><?= $accountant->has('casino') ? h($accountant->casino->name) : '' ?></td>
                                    <td><?= h($accountant->day_init) ?></td>
                                    <td><?= h($accountant->day_end) ?></td>
                                    <td><?= h($accountant->month_id) ?></td>
                                    <td><?= h($accountant->year) ?></td>
                                    <td><?= $this->Number->currency($accountant->cashin, 'USD') ?></td>
                                    <td><?= $this->Number->currency($accountant->cashout, 'USD') ?></td>
                                    <td><?= $this->Number->currency($accountant->bet, 'USD') ?></td>
                                    <td><?= $this->Number->currency($accountant->win, 'USD') ?></td>
                                    <td><?= $this->Number->currency($accountant->profit, 'USD') ?></td>
                                    <td><?= $this->Number->currency($accountant->jackpot, 'USD') ?></td>
                                    <td><?= h($accountant->gamesplayed) ?></td>
                                    <td><?= $this->Number->currency($accountant->coljuegos, 'USD') ?></td>
                                    <td><?= $this->Number->currency($accountant->admin, 'USD') ?></td>
                                    <td><?= $this->Number->currency($accountant->total, 'USD') ?></td>
                                    <td><?= $this->Number->currency($accountant->alfastreet, 'USD') ?></td>
                                    <td><?= $this->Html->image('Accountants/' . $accountant->image, ['class' => 'img-thumbnail']) ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <?= $this->Html->link(__('Exportar'), ['action' => 'csv'], ['class' => 'btn btn-outline-primary']) ?>
    </div> -->