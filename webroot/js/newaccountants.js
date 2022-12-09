"use strict";

document.addEventListener('DOMContentLoaded', () => {
    const casino = document.querySelector('#casino');
    const divMachines = document.querySelector('#machines');
    const lastAccountant = document.querySelector('#lasted');
    const newAccountant = document.querySelector('#formnewaccountant');
    const contadoresmes = document.querySelector('#tableAccountant');
    const _csrfToken = document.querySelector('#csrfToken').content;
    let timerInterval;

    casino.addEventListener('change', (e) => {
        const idCasino = e.target.value;

        if (idCasino === '0') {
            divMachines.style.display = 'none';
            limpiarContadores();
        } else {
            divMachines.style.display = 'block';
            maquinasCasino(idCasino);
            mostrarContadores();
        }
    })

    // Traer las maquinas del casino seleccionado
    async function maquinasCasino(id) {

        try {
            const url = `${window.location.protocol}//${window.location.hostname}/machines/participations?casinoid=${id}`;
            const request = await fetch(url);
            const result = await request.json();

            if (result) {
                console.log(result);
                generarHtml(result, id);
            }
        } catch (error) {
            console.log(error);
        }

    }

    // Select de las maquinas en participacion
    function generarHtml(machines, casino) {
        limpiarHtml();

        const select = document.createElement('select');
        select.setAttribute('class', 'form-control');
        select.setAttribute('label', false);
        select.setAttribute('id', 'idMachine');
        const option = document.createElement('option');
        option.value = 0;
        option.text = 'Selecciona una maquina';
        select.appendChild(option);

        for (const maquina of machines) {
            const option = document.createElement('option');
            const { id, name, serial } = maquina;
            option.value = id;
            option.text = `Modulo ${serial} (${name})`;
            select.appendChild(option);
        };

        divMachines.appendChild(select);
        const idmachine = document.querySelector('#idMachine');

        idmachine.addEventListener('change', (e) => {
            const machineId = e.target.value;
            if (machineId == 0) {
                limpiarFormulario();
                nodata();
            } else {
                ultimosContadores(machineId, casino);
            }
        });
    }

    // Funcion Asincrona para los contadores del mes anterior
    async function ultimosContadores(id, casinoId) {
        try {
            const url = `${window.location.protocol}//${window.location.hostname}/accountants/lastAccountants?machineid=${id}`;
            const request = await fetch(url);
            const result = await request.json();

            if (result === 'vacio') {
                nodata();
                addAcountant(id, casinoId);
            } else {
                htmlContadotes(result);
                addAcountant(id, casinoId);
            }

        } catch (error) {
            console.log(error);
        }
    };

    // Si no encuentra datos de las participaciones del mes anterior
    function nodata() {
        limpiarData();

        const titulo = document.createElement('H5');
        titulo.setAttribute('class', 'card-title')
        titulo.setAttribute('class', 'text-center');
        titulo.innerHTML = 'No hay datos de contadores Anteriores';

        lastAccountant.appendChild(titulo);
    }

    // Tabla de datos para los contadores del mes pasado

    function htmlContadotes(contadores) {
        limpiarData();

        const { admin, alfastreet, bet, cashin, cashout, coljuegos, day_end, day_init, gamesplayed, jackpot, profit, total, win } = contadores[0];

        const tabla = document.createElement('Table');
        tabla.setAttribute('class', 'table table-responsive table-striped table-hover table-sm table-bordered text-center');
        const thead = document.createElement('thead');
        const headertable = document.createElement('tr');
        headertable.innerHTML = `
            <th>Dato</th>
            <th>Valor</th>
        `;
        const tbody = document.createElement('tbody');
        tbody.innerHTML = `
            <tr>
                <td>Dia de Inicio</td>
                <td>${day_init}</td>
            </tr>
            <tr>
                <td>Dia de Finalizacion</td>
                <td>${day_end}</td>
            </tr>
            <tr>
                <td>Cashin - Drop In</td>
                <td>${cashin}</td>
            </tr>
            <tr>
                <td>Cashout - Cancelled</td>
                <td>${cashout}</td>
            </tr>
            <tr>
                <td>Bet</td>
                <td>${bet}</td>
            </tr>
            <tr>
                <td>Win</td>
                <td>${win}</td>
            </tr>
            <tr>
                <td>Profit</td>
                <td>${profit}</td>
            </tr>
            <tr>
                <td>Jackpot</td>
                <td>${jackpot}</td>
            </tr>
            <tr>
                <td>Games Played - Juegos Jugados</td>
                <td>${gamesplayed}</td>
            </tr>
            <tr>
                <td>12% Coljuegos</td>
                <td>${coljuegos}</td>
            </tr>
            <tr>
                <td>1% Administracion</td>
                <td>${admin}</td>
            </tr>
            <tr>
                <td>Total de la liquidacion</td>
                <td>${total}</td>
            </tr>
            <tr>
                <td>40% Alfastreet</td>
                <td>${alfastreet}</td>
            </tr>
        `;

        tabla.appendChild(thead);
        thead.appendChild(headertable);
        tabla.appendChild(tbody);

        lastAccountant.appendChild(tabla);

    }

    // Formulario de los contadores
    function addAcountant(id, casino_id) {
        limpiarFormulario();

        const formulario = document.createElement('form');
        formulario.setAttribute('name', 'accountant');
        formulario.setAttribute('enctype', 'multipart/form-data');
        formulario.setAttribute('id', 'accountantForm')
        formulario.innerHTML = `
            <input type="hidden" name="machine_id" value="${id}">
            <input type="hidden" name="casino_id" value="${casino_id}">
            <div class="row mb-4">
                <div class="col-6">
                    <input type="number" name="day_init" class="form-control" required placeholder="Dia de inicio del contador" aria-required="true" >
                </div>
                <div class="col-6">
                    <input type="number" name="day_end" class="form-control" required placeholder="Dia de Finalizacion del contador" aria-required="true" >
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <input type="number" name="cashin" class="form-control" required placeholder="Cashin - Drop In" aria-required="true" >
                </div>
                <div class="col-6">
                    <input type="number" name="cashout" class="form-control" required placeholder="Cashout - Cancelled" aria-required="true" >
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <input type="number" name="bet" class="form-control" required placeholder="Bet" aria-required="true" >
                </div>
                <div class="col-6">
                    <input type="number" name="win" class="form-control" required placeholder="Win" aria-required="true" >
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <input type="number" name="jackpot" class="form-control" required placeholder="Jackpot" aria-required="true" >
                </div>
                <div class="col-6">
                    <input type="number" name="gamesplayed" class="form-control" required placeholder="Juegos Jugados" aria-required="true" >
                </div>
            </div>
            <input type="file" name="image" class="form-control mb-4" accept="image/png,image/jpeg" required aria-required="true">
            <button class="btn btn-primary" name="send" type="submit"> Enviar Contador </button>
        `;
        newAccountant.appendChild(formulario);
        formulario.addEventListener('submit', sendNewAccountant);
    }

    // Funcion asincrona para el post de la participacion
    async function sendNewAccountant(e) {
        const form = document.querySelector('#accountantForm');
        e.preventDefault();
        const data = new FormData(form);

        // Verificar los datos de envio en consola
        for (let key of data.keys()) {
            console.log(key, data.get(key));
        }

        // Solicitud HTTP POST

        Swal.fire({
            title: 'Insertando Contador, por favor espere!',
            timerProgressBar: true,
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading()
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        });

        try {
            const url = `${window.location.protocol}//${window.location.hostname}/accountants/add`;
            const request = await fetch(url, {
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                method: 'POST',
                body: data,
            });
            const result = await request.json();

            if (result === 'ok') {
                Swal.fire(
                    'Exito!!',
                    'Participacion subida!!',
                    'success'
                );
                mostrarContadores();
            }

        } catch (error) {
            console.log(error);
            swalWithBootstrapButtons.fire(
                'Ups!!',
                'Ha ocurrido un error. Intentalo mas tarde :(',
                'error'
            )
        }
    }

    // Mostrar los contadores del mes actual
    async function mostrarContadores() {

        const contadoresCasino = casino.value;
        const url = `${window.location.protocol}//${window.location.hostname}/accountants/liquidations?casinoid=${contadoresCasino}`;
        const request = await fetch(url);
        const result = await request.json();

        console.log(result);

        if (result === 'vacio') {
            console.log('vacio');
            nodatacontadores();
        } else if (result) {
            htmlmesContadores(result);
        } else {
            console.log('error');
        }
    }


    // Crear HTML para los contadores
    function htmlmesContadores(contadores) {
        limpiarContadores();
        const titulo = document.createElement('h5');
        titulo.setAttribute('class', 'text-center');
        titulo.innerHTML = 'Participaciones del mes';
        const tabla = document.createElement('table');
        tabla.setAttribute('class', 'table table-responsive table-striped table-hover table-sm table-bordered text-center');

        const thead = document.createElement('thead');
        thead.innerHTML = `
            <tr>
                <th>Maquina</th>
                <th>Dia Inicio</th>
                <th>Dia Fin</th>
                <th>Cashin</th>
                <th>Cashout</th>
                <th>Bet</th>
                <th>Win</th>
                <th>Profit</th>
                <th>Jackpot</th>
                <th>Juegos Jugados</th>
                <th>Coljuegos 12%</th>
                <th>Administracion 1%</th>
                <th>Total</th>
                <th>Alfastreet 40%</th>
            </tr>
        `;
        tabla.appendChild(thead);

        for (const contador of contadores) {
            const { admin, alfastreet, bet, cashin, cashout, coljuegos, day_init, day_end, gamesplayed, profit, total, win, jackpot, Machines: { serial } } = contador;
            const tbody = document.createElement('tbody');
            tbody.innerHTML = `
                <tr>
                    <td>${serial}</td>
                    <td>${day_init}</td>
                    <td>${day_end}</td>
                    <td>${cashin}</td>
                    <td>${cashout}</td>
                    <td>${bet}</td>
                    <td>${win}</td>
                    <td>${profit}</td>
                    <td>${jackpot}</td>
                    <td>${gamesplayed}</td>
                    <td>${coljuegos}</td>
                    <td>${admin}</td>
                    <td>${total}</td>
                    <td>${alfastreet}</td>
                </tr>
            `;
            tabla.appendChild(tbody);
        };

        const buttonConfirm = document.createElement('button');
        buttonConfirm.setAttribute('class', 'btn btn-primary');
        buttonConfirm.setAttribute('id', 'createLiquidation');
        buttonConfirm.textContent = 'Finalizar y enviar Liquidacion de participaciones';

        contadoresmes.appendChild(titulo); 
        contadoresmes.appendChild(tabla); 
        contadoresmes.appendChild(buttonConfirm);

        const confirm = document.querySelector('#createLiquidation');
        confirm.addEventListener('click', advertenciaLiquidacion)
    }


    // Liquidacion de los contadores
    function advertenciaLiquidacion(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estas Seguro?',
            text: "Esta Accion no se puede cambiar",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, enviar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                crearLiquidacion(casino.value);
            }
        })
    }

    async function crearLiquidacion(casino) {
        Swal.fire({
            title: 'Enviando Contadores',
            html: 'Enviando sus contadores, por favor espere!',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        });

        try {
            const url = `${window.location.protocol}//${window.location.hostname}/liquidations/add?casinoid=${casino}`;
            const request = await fetch(url);
            const result = await request.json();
            console.log(result);
        } catch (error) {
            console.log(error);
        }
    }

    // Si no hay datos de Contadores
    function nodatacontadores() {
        limpiarContadores();
        const titulo = document.createElement('H5');
        titulo.setAttribute('class', 'card-title')
        titulo.setAttribute('class', 'text-center');
        titulo.innerHTML = 'No hay datos de Contadores';
        contadoresmes.appendChild(titulo);
    }


    // Limpiar datos del HTML
    function limpiarFormulario() {
        while (newAccountant.firstChild) {
            newAccountant.removeChild(newAccountant.firstChild);
        }
    };

    function limpiarHtml() {
        while (divMachines.firstChild) {
            divMachines.removeChild(divMachines.firstChild);
        }
    }

    function limpiarData() {
        while (lastAccountant.firstChild) {
            lastAccountant.removeChild(lastAccountant.firstChild);
        }
    }

    // Limpiar Contadores
    function limpiarContadores() {
        while (contadoresmes.firstChild) {
            contadoresmes.removeChild(contadoresmes.firstChild);
        }
    }
});


// Funciones extra para el documento
function currencyFormatter({ currency, value }) {
    const formatter = new Intl.NumberFormat('es-CO', {
        style: 'currency',
        minimumFractionDigits: 2,
        currency
    });
    return formatter.format(value);
};