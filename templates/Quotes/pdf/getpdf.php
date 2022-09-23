<!DOCTYPE html>
<html>
<head>
<title>PDF</title>
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

.datos-cliente h3{
    line-height : 25px;
}

.datos-cotizacion {
    float: right;
    width: 50%;
    text-align: right;
}

p {
    font-size: 10px;
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
    border: 2px solid #000;
}

table thead {
    border-bottom: 2px solid #000;
}

table td {
    font-size: 12px;
}

table .data tr td{
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
.comments {
    margin: 10px 0;
    padding: 10px 0;
}

h5 {
    font-size: 10px;
}
.firma img {
    width: 20%;
}

</style>
</head>
<body>

<div class="header">
    <img src="http://localhost/webroot/img/header.png" alt="" srcset="">
</div>


    <div class="contenedor ">
        <div class="datos-basicos ">
            <div class="datos-cliente ">
                <h3>Cliente: <span> <?= $quote[0]->bName ?> </span> </h3>
                <h3>Teléfono: <span> <?= $quote[0]->phone ?> </span> </h3>
                <h3>Correo: <span> <?= $quote[0]->email ?> </span> </h3>
            </div>
            <div class="datos-cotizacion ">
                <h2>Cotizacion N°: <span>AC-<?= $quote[0]->id?>-<?=date('Y')?></span></h2>
                <h2>Fecha: <span><?= date('Y-m-d') ?></span></h2>
            </div>
        </div>

        <div class="table">
            <table>
                <thead>
                    <tr>
                        <td>Serial</td>
                        <td>Descripción</td>
                        <td>Cantidad</td>
                        <td>VR. Unit</td>
                        <td>VR. total</td>
                        <td>Moneda</td>
                    </tr>
                </thead>
                <tbody class="data">
                    <?php foreach($quote as $q): ?>
                    <tr>
                        <td><?= $q->serial ?></td>
                        <td class="namePart"><?= $q->pname ?></td>
                        <td><?= $q->amount ?> UND</td>
                        <td>$<?= number_format($q->valorUnidad , 2 , ',', '.')  ?></td>
                        <td>$<?=  number_format($q->subtotal , 2 , ',' , '.')  ?></td>
                        <td><?= $q->shortcode ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="datosFinales">
                <div class="footerTable">
                    <div>
                        <!--Dolars -->

                        <h3>Total USD</h3>
                        <h4>Subtotal:
                            <?php if($quote[0]->totalUSD === 'NULL'){ ?>
                                0
                            <?php }else {
                                echo '$'.number_format( $quote[0]->totalUSD ,2 );
                            } ?>
                        </h4>
                        <h4>IVA: 
                            <?php if($quote[0]->totalUSD === 'NULL'){ ?>
                                0
                            <?php }else {
                                echo '$'.number_format( $quote[0]->totalUSD * 0.19, 2 );
                            } ?>
                        </h4>
                        <h4>Total:
                            <?php if($quote[0]->totalUSD === 'NULL'){ ?>
                                0
                            <?php }else {
                                echo '$'.number_format( ($quote[0]->totalUSD + ($quote[0]->totalUSD * 0.19)) , 2 );
                            } ?>
                        </h4>
                        <p>Favor Utilizar la TRM del dia de Pago</p>
                        <br>
                    </div>

                    <!--Euros-->

                    <div>
                        <h3>Total EUR</h3>

                        <h4>Subtotal:
                            <?php if($quote[0]->totalEUR === 'NULL'){ ?>
                                0
                            <?php }else {
                                echo '$'.number_format($quote[0]->totalEUR , 2 ,',', '.');
                            } ?>
                        </h4>

                        <h4>IVA:
                            <?php if($quote[0]->totalEUR === 'NULL'){ ?>
                                0
                            <?php }else {
                                echo '$'.number_format( $quote[0]->totalEUR * 0.19, 2 );
                            } ?>
                        </h4>
                        <h4>Total:
                            <?php if($quote[0]->totalEUR === 'NULL'){ ?>
                                0
                            <?php }else {
                                echo '$'.number_format( ($quote[0]->totalEUR + ($quote[0]->totalEUR * 0.19)) , 2 );
                            } ?>
                        </h4>
                        <p>Favor usar la taza de cambio actualizada</p>
                        <br>
                    </div>

                    <!--Colombian Peso-->

                    <div <?php if($quote[0]->totalCOP !== 'NULL') { ?> style="display: block;" <?php }else { ?> style="display: none;" <?php } ?>>
                        <h3>Total COP</h3>
                        <h4>Subtotal: 
                        
                            <?php if($quote[0]->totalCOP === 'NULL'){ ?>
                                0
                            <?php }else {
                                echo '$'.number_format($quote[0]->totalCOP);
                            } ?>
    
                        </h4>
                        <h4>IVA:
                            <?php if($quote[0]->totalCOP === 'NULL'){ ?>
                                0
                            <?php }else {
                                echo '$'.number_format( $quote[0]->totalCOP * 0.19, 2 );
                            } ?>
                        
                        
                        </h4>
                        <h4>Total:
                            <?php if($quote[0]->totalCOP === 'NULL'){ ?>
                                0
                            <?php }else {
                                echo '$'.number_format( ($quote[0]->totalCOP + ($quote[0]->totalCOP * 0.19)) , 2 ) ;
                            } ?>
                        </h4>
                    </div>

                    

                </div>
                <div class="dataText">
                <div class="comments"> 
                    <h4>Observaciones</h4>
                    <p><?= $quote[0]->comments ?></p>
                </div>
                    <h5>Favor únicamente girar en cheque o consignar en:</h5>
                    <p>Banco BBVA - Cuenta Corriente</p>
                    <p><span>ALFASTREET COLOMBIA S.A.S</span></p>
                    <p>Cuenta 10 Digitos: <span>0171026180</span> </p>
                    <p>Cuenta 15 Digitos: <span>0171000100026180</span> </p>
                    <br>

                    <h5>Tiempo de entrega: <span>INMEDIATO</span></h5>
                    <h5>Lugar de entrega: <span>SEGUN LO CONVENIDO</span></h5>
                    <h5>Vencimiento: <?= date('d-m-Y', strtotime($quote[0]->date . " +1 week" )) ?></h5>
                    <br>

                    <h5>Cordialmente, </h5>

                    <div class="firma">
                        <img src="http://localhost/webroot/img/firma.jpg" alt="">
                    </div>

                    <div>
                        <hr>
                        <h5 style="text-align: center; font-size: 10px;">Cra 70C N° 50 - 08  PBX:601 6315249    <span style="text-decoration: underline; font-weight: 400;">isela.sanchez@alfastreet.co   soporte@alfastreet.co  </span></h5>
                        <h5 style="text-align: center; font-size: 10px; text-decoration: underline; font-weight: 400;"> www.alfastreet.co </h5>
                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="footer">
        <img src="http://localhost/webroot/img/footer.png" alt="">
    </div>
</body>
</html>