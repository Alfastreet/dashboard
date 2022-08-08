<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Quote $quote
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Quotes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="quotes form content">
            <?= $this->Form->create($quote) ?>
            <fieldset>
                <legend><?= __('Nueva Cotizaciòn') ?></legend>
                <div class="input-group mb-3">
                    <label>Selecciona tu Usuario</label>
                    
                    <?= $this->Form->control('user_id', ['options' => $users, 'label' => false, 'id' => 'user']); ?>
                </div>

                <div class="input-group mb-3">
                    <label>Selecciona la Empresa</label>
                    <?= $this->Form->control('business_id', ['label' => false, 'id' => 'bussines']); ?>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="firstName" class="form-label">Nombre del Responsable</label>
                        <select name="client" id="client" class="form-control">
                            <!--Contenido mediante AJAX-->
                        </select>
                    </div>
                    
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="casino" class="form-label">Casino</label>
                        <select name="casino" id="casino" class="form-control">
                            <!--Contenido mediante AJAX-->
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label for="machine" class="form-label">Maquina</label>
                        <select name="machine" id="machine" class="form-control">
                            <!--Contenido mediante AJAX-->
                        </select>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="serial" class="form-label">Serial de la pieza</label>
                        <input type="hidden" name="serial_id" id="serial_id">
                        <input type="text" name="serial" id="serial">
                    </div>
                    <div class="col-sm-6">
                        <label for="name_serial" class="form-label">Nombre de la pieza</label>
                        <input type="text" name="name_serial" id="name_serial" disabled>
                    </div>
                    <div class="col-sm-6">
                        <label for="value_serial" class="form-label">Valor de la pieza</label>
                        <input type="hidden" name="serial_money_id" id="serial_money_id" disabled>
                        <input type="hidden" id="money_id" name="money_id">
                        <input type="text" name="value_serial" id="value_serial" disabled>
                    </div>
                    <div class="col-sm-6">
                        <label for="amount" class="form-label">Cantidad</label>
                        <input type="number" name="amount" id="amount" required >
                    </div>
                    <div class="col-sm-6">
                        <label for="subtotal" class="form-label">Subtotal</label>
                        <input type="hidden" name="subtotalNumber" id="subtotalNumber" required disabled>
                        <input type="text" name="subtotal" id="subtotal" required disabled>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Agregar') , ['id' => 'añadir']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<!--Table tmp details quote-->

<div class="row">

    <table class="table">
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

<button type="button" class="btn btn-primary btn-lg" id="process">Procesar Cotizacion</button>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

    //Funcion para encontrar a quien se le hara ña cotización

    $('#bussines').change(function() {
        var businessId = $(this).val();

        if(businessId) {
            $.ajax({
                type: 'GET',
                url: '<?= $this->Url->build(['controller' => 'client', 'action' => 'getClients'])?>',
                data: {
                   business_id: businessId
                },
                success: function(res) {
                    var data = JSON.parse(res);
                    if(res) {
                        
                        $('#client').empty();
                        //$('#cargo').empty();
                        $('#client').append('<option> Seleccione el a quien se le hara la Cotizacion </option>');
                        $.each(data, function(key, value) {
                            
                            $("#client").append('<option value="' + value.id + '">' + value.name +
                                    '</option>');
                            //$("#cargo").val(value.position);
                            
                        });
                    } else {
                        $('#client').empty();
                        //$('#cargo').empty();
                    }
                }
            });
        } else {

            $("#client").empty();
            //$('#cargo').empty();

        }
        
    });


    // Funcion para los casinos del responsable

    $('#client').change(function() {
        var clientId = $(this).val();
        

        if(clientId) {
            $.ajax({
                type: 'GET',
                url: '<?= $this->Url->build(['controller' => 'clientscasinos', 'action' => 'getCasino'])?>',
                data: {
                    client_id: clientId
                },
                success: function(res) {
                    var data = JSON.parse(res);
                    if(res) {
                        $('#casino').empty();
                        $('#casino').append('<option>--Seleccione el casino responsable del cliente--</option>')
                        $.each(data, function(key, value) {
                            $("#casino").append('<option value="' + value.id + '">' + value.name +
                                    '</option>');
                        });
                    } else {
                        $('#casino').empty();
                    }
                }
            });
        } else {
            $('#casino').empty();   
        }
    });


    //Funcion para las maquinas instaladas en el casino correspondiente

    $('#casino').change(function () { 
        
        var casinoId = $(this).val();

        if(casinoId) {
            $.ajax({
                type: 'GET',
                url: '<?= $this->Url->build(['controller' => 'machines', 'action' => 'getMachine'])?>',
                data: {
                    casino_id: casinoId
                },
                success: function(res) {
                    var data = JSON.parse(res);
                    

                    if(res) {
                        $('#machine').empty();
                        $('#machine').append('<option>-- Selecciona La maquina --</option>');
                        $.each(data, function(key, value) {
                            $("#machine").append('<option value="' + value.id + '">' + value.name +
                                    '</option>');
                        });
                    } else {
                        $('#machine').empty();
                    }
                }
            });
        } else {
            $('#machine').empty();
        }

     });

     //Buscar el serial de la parte

     $('#serial').keyup(function() {
        var serialId = $(this).val();
        
        
        if(serialId) {
            $.ajax({
                type: 'GET',
                url: '<?= $this->Url->build(['controller' => 'parts', 'action' => 'getPart'])?>',
                data: {
                    serial_id: serialId
                },
                success: function(res) {
                    var data = JSON.parse(res);
                    console.log(data);
                    
                    if(res) {
                        $('#serial_id').empty();
                        $('#name_serial').empty();
                        $('#name_serserial_money_idial').empty();
                        $('#value_serial').empty();

                        $.each(data, function(key,value){
                            $('#serial_id').val(value.id);
                            $('#name_serial').val(value.name);
                            $('#serial_money_id').val(value.money_id);
                            $('#money_id').val(value.money_id);


                            
                            var moneyId = value.money_id;
                            
                            //Casos para el tipo de moneda y el formateo del valor
                            if(moneyId = '1'){
                                var formatusd = new Intl.NumberFormat('en-US', {
                                        style: 'currency',
                                        currency: 'USD'
                                    });

                                    var usdValue = value.value;
                                    
                                    $('#value_serial').val(formatusd.format(usdValue));

                                    $('#amount').keyup(function() {

                                        var subtotalusd = $(this).val() * value.value;

                                        $('#subtotalNumber').val(subtotalusd);
                                        $('#subtotal').val(formatusd.format(subtotalusd));
                                    });
                            } else if(moneyId = '2') {
                                var formateur = new Intl.NumberFormat('es-ES', {
                                        style: 'currency',
                                        currency: 'EUR'
                                    });

                                    var euroValue = value.value;
                                    $('#value_serial').val(formateur.format(euroValue));

                                    $('#amount').keyup(function() {

                                        var subtotaleur = $(this).val() * value.value;
                                        $('#subtotal').val(formateur.format(subtotaleur));
                                    });

                            } else if (moneyId = '3') {
                                var formatcop = new Intl.NumberFormat('es-CO', {
                                        style: 'currency',
                                        currency: 'COP'
                                    });

                                    var pesoValue = value.value;
                                    $('#value_serial').val(formatcop.format(pesoValue));

                                    $('#amount').keyup(function() {

                                        var subtotal = $(this).val() * value.value;
                                        $('#subtotal').val(formatcop.format(subtotal));
                                    });
                            } else {
                                console.log('No es valida');
                            }

                            
                            
                        });

                    } else {
                        $('#serial_id').empty();
                        $('#name_serial').empty();
                        $('#name_serial').val(value.name);
                        $('#serial_money_id').val(value.money_id);

                    }
                }
            });
        } else {
            $('#serial_id').empty();
            $('#name_serial').empty();
            $('#name_serserial_money_idial').empty();
            $('#value_serial').empty();
        }
     });


     //Añadir producto

     $('#añadir').click(function(e) {
        e.preventDefault();
        
        //let token = $('#user-id').children(":selected").attr("id");     
        let typeProduct = 1;
        let product_id = $('#serial_id').val();
        let amount = $('#amount').val();
        let total = $('#subtotalNumber').val();
        let money_id = $('#money_id').val();

        $.ajax({
            headers: {
                'X-CSRF-Token' : $('[name="_csrfToken"]').val()
            },
            method: 'POST',
            url: '<?= $this->Url->build(['controller' => 'Tmpdetailsquote', 'action' => 'add']) ?>',
            data: {
                
                typeProduct: typeProduct,
                product_id: product_id,
                amount: amount,
                value: total,
                token: 1234,
                money_id: money_id
            } ,
            success: function(res) {
                let data = JSON.parse(res);
                console.log(data);
                let table;

                let format = new Intl.NumberFormat('es-CO', {
                                        style: 'currency',
                                        currency: 'COP'
                                    });

                if(data) {
                    for(let i = 0; i < data.length; i++){
                        table += '<tr><td>'+ (i+1)  +'</td>'
                            +'<td>' + data[i].serial + '</td>'
                            +'<td>' + data[i].name + '</td>'
                            +'<td>' + data[i].amount + '</td>'
                            +'<td>' + data[i].value + '</td>'
                            +'<td>' + data[i].moneyId + '</td>'
                            +'<td class="totails">' + format.format(data[i].total) + ' </td></tr>';
                            
                    }
                    $('#controller').html(table);

                    let subtotal = 0;
                    let total = 0;
                    let totalIva = 0;
                    let iva = 0
                    let footerTableDolar;
                    let footerTableEUR;
                    
                    for (let i = 0; i < data.length; i++){

                        subtotal = data[i].value * data[i].amount;

                        total += subtotal;

                        if(i==data.length-1){
                            
                            iva = total * 0.19;

                            totalIva = ( (total * 0.19) + total );                            

                            
                            for(let j = 0; j < data.length; j++){

                                if(j==data.length - (data.length)){

                                    let typeMoney = data[j].moneyId;
                                    
                                    console.log(typeMoney);

                                    if(typeMoney == 'Dolar' ){

                                        let productPrice = (data[j].value * data[j].amount );

                                        let totalDolar = 0;

                                        totalDolar += productPrice;

                                        console.log(totalDolar);

                                    }
                                    
                                }


                            }
                            


                        }
                    }
                    
                }

            }, 
            error: function(err) {
                console.log(err);
            }

        })

     })


     $('#process').click(function(e){
        e.preventDefault();

        let rows = $('#controller tr td').length;
        
        if(rows > 0) {

            let business_id =  $('#client').val();
            console.log(business_id);
    
            $.ajax({
                headers: {
                    'X-CSRF-Token' : $('[name="_csrfToken"]').val()
                },
                method: 'POST',
                url: '<?= $this->Url->build(['controller' => 'Quotes', 'action' => 'pdf']) ?>',
                data: {
                    codClient: business_id,
                    token: 1234,
                },
                success: function(res){
                    
                    console.log('Si se hizo')

                    if(res != 'error'){
                        window.location.href = 'http://localhost/alfastreet/quotes';
                    }
    
                },
                error: function(err) {
                    console.log(err);
                }
            })

        }
            

        


     })
        
     



</script>