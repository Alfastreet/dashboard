<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->Html->css('pdf.css', ['fullBase' => true]) ?>
    <title><?= h('Liquidacion ' . $nameCasino->name) ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;400;700&display=swap');

        * {
            box-sizing: border-box;
        }

        @page {
            margin-top: 50px !important;
            margin-bottom: 50px !important;
            margin-right: 50px !important;
            margin-left: 50px !important;
            padding: 0px 0px 0px 0px !important;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        h1 {
            font-size: 1.5rem;
        }

        .titulo {
            text-align: center;
        }

        .tabla {
            width: 75%;
            margin: 25px auto;
            border: 0.5px solid #000;
            border-radius: 10px;
        }

        .tabla th,
        .tabla td {
            border-bottom: 1px solid #999;
            width: 50%;
        }

        .tabla th {
            font-size: 15px;
            text-transform: capitalize;
            font-weight: bolder;
        }

        .tabla tbody tr th {
            text-align: justify;
            font-size: 14px;
            padding: 15px;
        }

        .tabla td {
            text-align: center;
            font-size: 12px;
        }

        .tabla tfoot tr th {
            text-align: right;
            font-size: 20px;
            border: 0;
            width: 100%;
            border-spacing: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="titulo"><?= h('Liquidación del cliente ' . $nameCasino->name) ?></h1>
        <table class="tabla">
            <thead>
                <tr>
                    <th><?= h('Concepto') ?></th>
                    <th><?= h('Descripción - Valor') ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th><?= h('Cashin - Dropin') ?></th>
                    <?php foreach ($maquinas as $cashin) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $cashin->machine_id . ' Cashin - Dropin') ?></td>
                                <td><?= $this->Number->currency($cashin->cashin, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <th><?= h('Cashout - Cancelled') ?></th>
                    <?php foreach ($maquinas as $cashout) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $cashout->machine_id . ' Cashout - Cancelled') ?></td>
                                <td><?= $this->Number->currency($cashout->cashout, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <th><?= h('Bet - Apuestas') ?></th>
                    <?php foreach ($maquinas as $bet) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $bet->machine_id . ' Bet - Apuestas') ?></td>
                                <td><?= $this->Number->currency($bet->bet, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <th><?= h('Win - Ganancias') ?></th>
                    <?php foreach ($maquinas as $win) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $win->machine_id . ' Win - Ganancias') ?></td>
                                <td><?= $this->Number->currency($win->win, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <th><?= h('Profit - Beneficio') ?></th>
                    <?php foreach ($maquinas as $profit) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $profit->machine_id . ' Profit - Beneficio') ?></td>
                                <td><?= $this->Number->currency($profit->profit, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <th><?= h('Jackpot - Premio Mayor') ?></th>
                    <?php foreach ($maquinas as $jackpot) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $jackpot->machine_id . ' Jackpot - Premio Mayor') ?></td>
                                <td><?= $this->Number->currency($jackpot->jackpot, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <th><?= h('Coljuegos 12%') ?></th>
                    <?php foreach ($maquinas as $coljuegos) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $coljuegos->machine_id . ' Impuesto Coljuegos 12%') ?></td>
                                <td><?= $this->Number->currency($coljuegos->coljuegos, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <th><?= h('Administración 1%') ?></th>
                    <?php foreach ($maquinas as $admin) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $admin->machine_id . ' Impuesto Administracion 1%') ?></td>
                                <td><?= $this->Number->currency($admin->admin, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <th><?= h('Total') ?></th>
                    <?php foreach ($maquinas as $total) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $total->machine_id . ' Total IVA Incluido') ?></td>
                                <td><?= $this->Number->currency($total->total, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <th><?= h('Alfastreet') ?></th>
                    <?php foreach ($maquinas as $alfastreet) : ?>
                        <table>
                            <tr>
                                <td><?= h('Maquina: ' . $alfastreet->machine_id . ' Ganancia Alfastreet') ?></td>
                                <td><?= $this->Number->currency($alfastreet->alfastreet, 'COP') ?></td>
                            </tr>
                        </table>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
        <h2 style="text-align: right;"><?= h('Valor total a pagar: ' . $this->Number->currency($totalLiquidacion->totalLiquidation, 'COP')) ?></h2>
    </div>
</body>

</html>