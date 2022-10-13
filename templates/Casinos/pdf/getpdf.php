<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $this->Html->css('bootstrap.css', ['fullBase' => true]); ?>
    <title>Liquidacion de <?= h($casino->name) ?></title>
</head>
<style>
    * {
        box-sizing: border-box;
    }

    @page {
        margin: 0px !important;
        padding: 0px 0px 0px 0px !important;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .contenedor {
        margin: 10px;
    }

    .datos-basicos:after,
    .datosFinales:after {
        content: "";
        display: table;
        clear: both;
    }

    .datos-cliente {
        margin-top: 200px;
        float: left;
        width: 50%;
    }

    .datos-cliente h3 {
        line-height: 25px;
    }

    .datos-cotizacion {
        float: right;
        width: 50%;
        text-align: right;
    }

    h2 {
        font-size: 18px;
        font-weight: 700;
    }

    h2 span {
        font-weight: 400;
        font-size: 12px;
    }

    h3 {
        font-size: 18px;
        line-height: 5px;
    }

    h3 span {
        font-size: 15px;
        font-weight: 400;
    }

    table {
        margin-top: 25px;
        width: 100%;
        text-align: center;
        border: 2px solid #000;
    }

    table thead {
        border-bottom: 2px solid #000;
    }

    table th {
        border: 1px solid #000;
    }

    table td {
        font-size: 12px;
        border: 1px solid #000;
    }

    table .data tr td {
        padding: 10px 0;
    }

    table .namePart {
        text-transform: capitalize;
    }

    table thead tr td {
        font-weight: 700;
        font-size: 15px;
        padding-bottom: 10px;
    }

    .footerTable {
        width: 100%;
        padding-top: 15px;
        text-align: right;
        line-height: 1px;
        float: right;
    }

    .footerTable h3 {
        font-size: 18px;
    }

    .footerTable h4 {
        font-size: 12px;
    }

    .footerTable p {
        font-size: 10px;
        /* border-left: 1px solid #000;
    margin-top: -25px; */
    }

    .dataText {
        line-height: 5px;
        float: left;
    }

    .header {
        position: fixed;
        top: -5px;
        left: -5px;
        right: 0px;
        height: 5px;

    }

    .footer {
        position: fixed;
        bottom: -5px;
        left: 0px;
        right: 0px;
    }

    .textcenter {
        text-align: center;
        text-transform: uppercase;
    }

    .totalizated {
        text-align: right;
        margin-top: 50px;
    }

    .centered {
        text-align: center;
    }

    .centered img {
        margin: 0px auto;
    }
</style>
<div class="centered">
    <img src="http://localhost/img/Alfa-logo.webp" alt="" srcset="">
</div>

<body class="contenedor">
    <h2 class="textcenter"> <?= __('Liquidacion del mes ' . date('M', strtotime(date('Y-m-d') . '-1 month')) . ' De la empresa ' . h($casino->name)) ?></h2>
    <h2 class="textcenter"> <?= __('Participaciones') ?></h2>
    <table>
        <thead>
            <tr>
                <th>Serial de la máquina</th>
                <th>Nombre de la máquina</th>
                <th>Cashin</th>
                <th>Cashout</th>
                <th>Bet</th>
                <th>Win</th>
                <th>Profit</th>
                <th>Jackpot</th>
                <th>Juegos Jugados</th>
                <th>12% Coljuegos</th>
                <th>1% Admin</th>
                <th>Iva</th>
                <th>Total</th>
                <th>40% Alfastreet</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0;
            $totalizate = 0;
            $totalAll = 0;

            foreach ($accountants as $accountant) :
                foreach ($machines as $machine) :
                    if ($accountant->machine_id == $machine->id) {
                        $namemachine = $machine->serial;
                        $serialName = $machine->name;
                    }
                endforeach;
                foreach ($lastaccountants as $lastaccountant) :
                    $totalCashin = 0;
                    $totalCashout = 0;
                    $totalBet = 0;
                    $totalWin = 0;
                    $totalProfit = 0;
                    $totalJackpot = 0;
                    $totalizate = 0;
                    $alfasteet = 0;
                    $coljuegos = 0;
                    $admin = 0;
                    $iva = 144415;

                    if ($lastaccountant->machine_id === $accountant->machine_id) {
                        $totalCashin = $accountant->cashin - $lastaccountant->cashin;
                        $totalCashout =  $accountant->cashout - $lastaccountant->cashout;
                        $totalBet = $accountant->bet - $lastaccountant->bet;
                        $totalWin = $accountant->win - $lastaccountant->win;
                        $totalProfit = $accountant->profit - $lastaccountant->profit;
                        $totalJackpot = $accountant->jackpot - $lastaccountant->jackpot;
                        $totalizate = $accountant->profit - $lastaccountant->profit;
                        $coljuegos = $totalizate * 0.12;
                        $admin = $coljuegos * 0.01;
                        $totalall = $totalizate - $coljuegos - $admin - $iva;
                        $alfasteet = $totalall * 0.40;

            ?>

                        <tr>
                            <td><?= h($namemachine) ?></td>
                            <td><?= h($serialName) ?></td>
                            <td><?= $this->Number->currency($totalCashin, 'USD') ?></td>
                            <td><?= $this->Number->currency($totalCashout, 'USD') ?></td>
                            <td><?= $this->Number->currency($totalBet, 'USD') ?></td>
                            <td><?= $this->Number->currency($totalWin, 'USD') ?></td>
                            <td><?= $this->Number->currency($totalProfit, 'USD') ?></td>
                            <td><?= $this->Number->currency($totalJackpot, 'USD') ?></td>
                            <td><?= h($accountant->gamesplayed) ?></td>
                            <td><?= $this->Number->currency($coljuegos, 'USD') ?></td>
                            <td><?= $this->Number->currency($admin, 'USD') ?></td>
                            <td><?= $this->Number->currency($iva, 'USD') ?></td>
                            <td><?= $this->Number->currency($totalall, 'USD') ?></td>
                            <td><?= $this->Number->currency($alfasteet, 'USD') ?></td>
                        </tr>

            <?php }
                    $total += $alfasteet;
                endforeach;
            endforeach; ?>
        </tbody>
    </table>

    <h3 class="totalizated">TOTAL LIQUIDACION SIN BORRADOS : <?= $this->Number->currency($total, 'USD') ?></h3>

    <h2 class="textcenter"> <?= __('Borrados') ?></h2>

    <table>
        <thead>
            <tr>
                <th>Serial de la máquina</th>
                <th>Nombre de la máquina</th>
                <th>Cashin</th>
                <th>Cashout</th>
                <th>Bet</th>
                <th>Win</th>
                <th>Profit</th>
                <th>Jackpot</th>
                <th>Juegos Jugados</th>
                <th>12% Coljuegos</th>
                <th>1% Admin</th>
                <th>Iva</th>
                <th>Total</th>
                <th>40% Alfastreet</th>
            </tr>
        </thead>
        <tbody>
            <?php $totalErase = 0;
            $totalizateErase = 0;
            $totalAll = $total + $totalErases->total;
            $iva = 144415;
            foreach ($erases as $erase) :
                foreach ($machines as $machine) :
                    if ($erase->machine_id == $machine->id) {
                        $namemachine = $machine->serial;
                        $serialName = $machine->name;
                    } ?>
                    <tr>
                        <td><?= h($namemachine) ?></td>
                        <td><?= h($serialName) ?></td>
                        <td><?= $this->Number->currency($erase->totalCashin, 'USD') ?></td>
                        <td><?= $this->Number->currency($erase->totalCashout, 'USD') ?></td>
                        <td><?= $this->Number->currency($erase->totalBet, 'USD') ?></td>
                        <td><?= $this->Number->currency($erase->totalWin, 'USD') ?></td>
                        <td><?= $this->Number->currency($erase->totalProfit, 'USD') ?></td>
                        <td><?= $this->Number->currency($erase->totalJackpot, 'USD') ?></td>
                        <td><?= h($erase->gamesplayed) ?></td>
                        <td><?= $this->Number->currency($erase->coljuegos, 'USD') ?></td>
                        <td><?= $this->Number->currency($erase->admin, 'USD') ?></td>
                        <td><?= $this->Number->currency($iva, 'USD') ?></td>
                        <td><?= $this->Number->currency($erase->total, 'USD') ?></td>
                        <td><?= $this->Number->currency($erase->alfastreet, 'USD') ?></td>
                    </tr>
            <?php endforeach;
            endforeach ?>
        </tbody>
    </table>

    <h3 class="totalizated">TOTAL BORRADOS : <?= $this->Number->currency($totalErases->total, 'USD') ?></h3>

    <h2 style="text-align: center;">TOTAL A PAGAR <?= $this->Number->currency($totalAll, 'USD') ?> </h2>

</body>

</html>