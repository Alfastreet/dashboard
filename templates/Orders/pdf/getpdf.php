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

        .datos-cliente h3 {
            line-height: 25px;
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

        <div class="table">


            <div class="firma">
                <img src="http://localhost/webroot/img/firma.jpg" alt="">
            </div>

            <div>
                <hr>
                <h5 style="text-align: center; font-size: 10px;">Cra 70C N° 50 - 08 PBX:601 6315249 <span style="text-decoration: underline; font-weight: 400;">isela.sanchez@alfastreet.co soporte@alfastreet.co </span></h5>
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