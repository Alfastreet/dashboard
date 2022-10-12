<!DOCTYPE html>
<html>

<head>
    <title>Orden de trabajo # <?=$order[0]->order_id?></title>
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
            margin: 5px;
        }

        .titulo {
            margin-top: 75px;
        }

        .datos-basicos:after,
        .datosFinales:after {
            content: "";
            display: table;
            clear: both;
        }

        .datos-cliente {
            margin-top: 5px;
            float: left;
            width: 50%;
        }

        .datos-cliente h3 {
            line-height: 15px;
            padding: 15px;
        }

        .datos-cotizacion {
            float: right;
            width: 50%;
            text-align: right;
        }

        p {
            font-size: 10px;
        }

        h1 {
            text-align: center;
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
            font-size: 12px;
            font-weight: 400;
        }

        table {
            margin-top: 25px;
            width: 100%;
            text-align: center;
            border: 1px solid #000;
        }

        table thead {
            border-bottom: 2px solid #000;
        }

        table td {
            font-size: 12px;
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

        .comments {
            margin-top: 10px 0;
            padding: 10px 0;
        }

        h5 {
            font-size: 10px;
        }

        .firma img {
            width: 20%;
        }

        .line-finma {
            max-width: 250px;
            text-align: center;
            border-bottom: 1px solid black;
        }

        .marca-de-agua {
            background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url("http://localhost/webroot/img/logoalfa.png");
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: auto;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="marca-de-agua">
        <div class="contenedor ">
            <div class="titulo">
                <h1> Orden de trabajo # <?= $order[0]->order_id  ?> </h1>
            </div>
            <div class="datos-basicos ">
                <div class="datos-cliente ">
                    <h3>Tecnico Encargado: <span> <?= $order[0]->name . ' ' . $order[0]->lastName ?> </span> </h3>
                    <h3>Estado de la Orden: <span> <?= $order[0]->status ?> </span> </h3>
                    <h3>Número de Factura: <span> <?= $order[0]->invoice ?> </span> </h3>
                </div>
                <div class="datos-cliente ">
                    <h3>Cliente: <span> <?= $order[0]->businessName ?> </span> </h3>
                    <h3>Telefono del Casino: <span> <?= $order[0]->phone ?> </span> </h3>
                </div>
            </div>
            <h1>Detalles de la Maquina</h1>
            <div class="datos-basicos">
                <div class="datos-cliente">
                    <h3>Serial de la maquina: <span><?= $order[0]->serial ?></span></h3>
                    <h3>Modelo: <span><?= $order[0]->modelMachine ?></span></h3>
                </div>
                <div class="datos-cliente">
                    <h3>Casino: <span> <?= $order[0]->casinoName ?> </span> </h3>
                    <h3>Dirección: <span> <?= $order[0]->address ?> </span> </h3>
                </div>
            </div>
            <h1>Resumen de la Orden</h1>
            <table>
                <thead>
                    <tr>
                        <td>Producto</td>
                        <td>Cantidad</td>
                        <td>Moneda</td>
                        <td>Valor</td>
                    </tr>
                </thead>
                <tbody class="data">
                    <?php foreach ($order as $o) : ?>
                        <tr>
                            <td><?= $o->productName ?></td>
                            <td><?= $o->amount ?></td>
                            <td><?= $o->moneyName ?></td>
                            <td>$<?= number_format($o->value, 2) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <td>Tipo de Apuesta</td>
                        <td>Apuesta Minima</td>
                        <td>Apuesta Maxima</td>
                    </tr>
                </thead>
                <tbody class="data">
                    <tr>
                        <td>Total</td>
                        <td><?= $order[0]->totalmin ?></td>
                        <td><?= $order[0]->totalmax ?></td>
                    </tr>
                    <tr>
                        <td>Interior</td>
                        <td><?= $order[0]->interiormin ?></td>
                        <td><?= $order[0]->interiormax ?></td>
                    </tr>
                    <tr>
                        <td>Exterior</td>
                        <td><?= $order[0]->exteriormin ?></td>
                        <td><?= $order[0]->exteriormax ?></td>
                    </tr>
                    <tr>
                        <td>Apuesta X36</td>
                        <td><?= $order[0]->x36min ?></td>
                        <td><?= $order[0]->x36max ?></td>
                    </tr>
                    <tr>
                        <td>Apuesta X18</td>
                        <td><?= $order[0]->x18min ?></td>
                        <td><?= $order[0]->x18max ?></td>
                    </tr>
                    <tr>
                        <td>Apuesta X12</td>
                        <td><?= $order[0]->x12min ?></td>
                        <td><?= $order[0]->x12max ?></td>
                    </tr>
                    <tr>
                        <td>Apuesta X9</td>
                        <td><?= $order[0]->x9min ?></td>
                        <td><?= $order[0]->x9max ?></td>
                    </tr>
                    <tr>
                        <td>Apuesta X7</td>
                        <td><?= $order[0]->x7min ?></td>
                        <td><?= $order[0]->x7max ?></td>
                    </tr>
                    <tr>
                        <td>Apuesta X6</td>
                        <td><?= $order[0]->x6min ?></td>
                        <td><?= $order[0]->x6max ?></td>
                    </tr>
                    <tr>
                        <td>Apuesta X3</td>
                        <td><?= $order[0]->x3min ?></td>
                        <td><?= $order[0]->x3max ?></td>
                    </tr>
                    <tr>
                        <td>Apuesta X2</td>
                        <td><?= $order[0]->x2min ?></td>
                        <td><?= $order[0]->x2max ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="datos-basicos">
                <div class="datos-cliente" style=" padding: 10px;">
                    <h3>Configuracion Centro</h3>
                    <h4>Soplado: <?= $order[0]->soplado ?></h4>
                    <h4>Contrasoplado: <?= $order[0]->contrasoplado ?></h4>
                    <h4>Tiempo de Apuesta: <?= $order[0]->timeapuesta ?></h4>
                </div>
                <div class="datos-cliente" style="padding: 10px;">
                    <h3>Configuracion Jackpot</h3>
                    <h4>% de Apuesta: <?= $order[0]->apuestaper ?></h4>
                    <h4>% de Hidden: <?= $order[0]->hiddenper ?></h4>
                    <h4>Frecuencia Inicial: <?= $order[0]->frecuenciaini ?></h4>
                    <h4>Frecuencia Final: <?= $order[0]->fecuenciafin ?></h4>
                    <h4>Apuesta Minima: <?= $order[0]->apuestamin ?></h4>
                    <h4>Maximo Limite: <?= $order[0]->limitmax ?></h4>
                </div>
            </div>

            <div class="comments">
                <h4>Observaciones Sobre la Cotización:</h4>
                <p><?= $order[0]->comment ?></p>
            </div>

            <div class="datos-basicos">
                <div class="datos-cliente">
                    <h3>Cordialmente, <span></span> </h3>
                    <br>
                    <div class="line-finma"></div>

                </div>
                <div class="datos-cliente">
                    <h3>Firma del Tecnico </h3>
                    <br>
                    <div class="line-finma"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>