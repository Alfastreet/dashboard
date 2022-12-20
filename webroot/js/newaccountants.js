"use strict";

document.addEventListener('DOMContentLoaded', () => {
    const casino = document.querySelector('#casino');
    const divMachines = document.querySelector('#machines');
    const lastAccountant = document.querySelector('#lasted');
    const newAccountant = document.querySelector('#formnewaccountant');
    const contadoresmes = document.querySelector('#tableAccountant');
    const tablaLiquidaciones = document.querySelector('#liquidations');
    const _csrfToken = document.querySelector('#csrfToken').content;
    let timerInterval;
    let contadorDosMeses = [];
    let actuales = [];

    casino.addEventListener('change', (e) => {
        const idCasino = e.target.value;

        if (idCasino === '0') {
            divMachines.style.display = 'none';
            limpiarContadores();
            limpiarLiquidacion();
            limpiarData();
            limpiarFormulario();
        } else {
            divMachines.style.display = 'block';
            maquinasCasino(idCasino);
            mostrarContadores();
            obtenerLiquidacion(idCasino);
        }
    })

    // Traer las maquinas del casino seleccionado
    async function maquinasCasino(id) {

        try {
            const url = `${window.location.protocol}//${window.location.hostname}/machines/participations?casinoid=${id}`;
            const request = await fetch(url);
            const result = await request.json();

            if (result) {
                generarHtml(result, id);
            }
        } catch (error) {
            console.error(error);
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
                limpiarData();
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
                contadorDosMeses = 0;
            } else {
                contadorDosMeses = result[0];
                htmlContadotes(result);
                addAcountant(id, casinoId);
            }

        } catch (error) {
            console.error(error);
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
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(cashin))}</td>
            </tr>
            <tr>
                <td>Cashout - Cancelled</td>
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(cashout))}</td>
            </tr>
            <tr>
                <td>Bet</td>
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(bet))}</td>
            </tr>
            <tr>
                <td>Win</td>
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(win))}</td>
            </tr>
            <tr>
                <td>Profit</td>
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(profit))}</td>
            </tr>
            <tr>
                <td>Jackpot</td>
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(jackpot))}</td>
            </tr>
            <tr>
                <td>Games Played - Juegos Jugados</td>
                <td>${gamesplayed}</td>
            </tr>
            <tr>
                <td>12% Coljuegos</td>
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(coljuegos))}</td>
            </tr>
            <tr>
                <td>1% Administracion</td>
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(admin))}</td>
            </tr>
            <tr>
                <td>Total de la liquidacion</td>
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(total))}</td>
            </tr>
            <tr>
                <td>40% Alfastreet</td>
                <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(alfastreet))}</td>
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
            <input type="hidden" name="machine_id" id="maquina" value="${id}">
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
            <div class="row mb-4">
                <div class="col-6">
                    <input type="file" name="image" class="form-control mb-4" accept="image/png,image/jpeg" required aria-required="true">
                </div>
                <div class="col-6">
                    <select class="form-control" label="false" name="percent" id="porcentaje">
                        <option value="">Porcentaje de participacion Alfastreet</option>
                        <option value="0.30">30% de participación</option>
                        <option value="0.40">40% de participación</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary" name="send" type="submit"> Enviar Contador </button>
            <a href="${window.location.protocol}//${window.location.hostname}/erases/add?casinoId=${casino_id}&machineId=${id}" class="btn btn-warning text-white">Insertar Borrados</a>
        `;
        newAccountant.appendChild(formulario);
        const maquina = document.querySelector('#maquina');
        formulario.addEventListener('submit', (e) => {
            e.preventDefault();
            sendNewAccountant(maquina.value);
        }
        );

    }

    // Funcion asincrona para el post de la participacion
    async function sendNewAccountant(maquina) {
        const form = document.querySelector('#accountantForm');
        const data = new FormData(form);

        // Verificar los datos de envio en consola
        // for (let key of data.keys()) {
        //     console.log(key, data.get(key));
        // };


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
                setTimeout(() => {
                    obtenerContadorMes(maquina);
                }, 1000);
            }

        } catch (error) {
            console.error(error);
            swalWithBootstrapButtons.fire(
                'Ups!!',
                'Ha ocurrido un error. Intentalo mas tarde :(',
                'error'
            )
        }
    }

    // Obtener los contadores del mes
    async function obtenerContadorMes(machine) {
        const url = `${window.location.protocol}//${window.location.hostname}/accountants/accountMachine?machineid=${machine}`;
        const request = await fetch(url);
        const result = await request.json();
        actuales = result;

        setTimeout(() => {
            crearLiquidacion(casino.value, contadorDosMeses, actuales);
        }, 1000);
    }

    // Mostrar los contadores del mes actual
    async function mostrarContadores() {

        const contadoresCasino = casino.value;
        const url = `${window.location.protocol}//${window.location.hostname}/accountants/liquidations?casinoid=${contadoresCasino}`;
        const request = await fetch(url);
        const result = await request.json();

        if (result === 'vacio') {
            nodatacontadores();
        } else if (result) {
            htmlmesContadores(result);
        } else {
            console.error('error');
        }
    }


    // Crear HTML para los contadores
    function htmlmesContadores(contadores) {
        limpiarContadores();
        const titulo = document.createElement('H5');
        titulo.setAttribute('class', 'text-center');
        titulo.textContent = 'Participaciones del mes';
        const tabla = document.createElement('TABLE');
        tabla.classList.add('table', 'table-bordered', 'table-striped', 'text-center', 'table-hover');
        const thead = document.createElement('THEAD');
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
            const tbody = document.createElement('TBODY');
            tbody.innerHTML = `
                <tr>
                    <td>${serial}</td>
                    <td>${day_init}</td>
                    <td>${day_end}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(cashin))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(cashout))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(bet))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(win))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(profit))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(jackpot))}</td>
                    <td>${gamesplayed}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(coljuegos))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(admin))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(total))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(alfastreet))}</td>
                </tr>
            `;
            tabla.appendChild(tbody);
        };

        contadoresmes.appendChild(titulo);
        contadoresmes.appendChild(tabla);
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


    // Liquidacion de los contadores
    async function crearLiquidacion(casino, last, news) {
        const porcentaje = document.querySelector('#porcentaje').value
        const totalcashin = news.cashin - last.cashin;
        const totalcashout = news.cashout - last.cashout;
        const totalbet = news.bet - last.bet;
        const totalwin = news.win - last.win;
        const totaljackpot = news.jackpot - last.jackpot;
        const totalprofit = news.profit - last.profit;
        const games = news.gamesplayed;
        const machine_id = news.machine_id;
        const data = new FormData();
        data.append('machine_id', machine_id);
        data.append('cashin', totalcashin);
        data.append('cashout', totalcashout);
        data.append('bet', totalbet);
        data.append('win', totalwin);
        data.append('jackpot', totaljackpot);
        data.append('profit', totalprofit);
        data.append('games', games);
        data.append('percent', porcentaje);

        Swal.fire({
            title: 'Calculando su liquidacion, por favor espere!',
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
            const request = await fetch(url, {
                headers: {
                    'X-CSRF-Token': _csrfToken,
                },
                method: 'POST',
                body: data,
            });
            const result = await request.json();
            if (result === 'ok') {
                Swal.fire(
                    'Exito!!',
                    'Liquidacion de la maquina realizada!!',
                    'success'
                );
                limpiarFormulario();
                limpiarData();

                setTimeout(() => {
                    obtenerLiquidacion(casino);
                }, 1000);
            }
        } catch (error) {
            console.error(error);
            Swal.fire(
                'Ups!!',
                'Hubo un error en la peticion, Intenta de nuevo mas tarde :(',
                'error'
            );
        }
    };

    // Obtener las liquidaciones del casino en el mes
    async function obtenerLiquidacion(casino) {
        const url = `${window.location.protocol}//${window.location.hostname}/liquidations/liquidation?casino=${casino}`;
        const request = await fetch(url);
        const result = await request.json();
        if (result) {
            htmlLiquidacion(result);
        } else {
            console.log('vacio');
        }

    }

    // Html para las liquidaciones
    function htmlLiquidacion(liquidaciones) {
        limpiarLiquidacion();
        const titulo = document.createElement('H5');
        titulo.setAttribute('class', 'text-center');
        titulo.textContent = 'Liquidación del mes actual';
        const tabla = document.createElement('TABLE');
        tabla.classList.add('table', 'table-bordered', 'table-striped', 'text-center', 'table-hover');
        const topTabla = document.createElement('THEAD');
        topTabla.innerHTML = `
            <tr>
                <th>Serial de la maquina</th>
                <th>Cashin - Dropin</th>
                <th>Cashout - Cancelled</th>
                <th>Bet</th>
                <th>Win</th>
                <th>Profit</th>
                <th>Jackpot</th>
                <th>Coljuegos 12%</th>
                <th>Administracion 1%</th>
                <th>Total</th>
                <th>Alfastreet</th>
            </tr>
        `;
        tabla.appendChild(topTabla);

        for (const liquidacion of liquidaciones) {
            const { admin, alfastreet, bet, cashin, cashout, coljuegos, profit, total, win, jackpot, Machines: { serial } } = liquidacion;
            const tbody = document.createElement('TBODY');
            tbody.innerHTML = `
                <tr>
                    <td>${serial}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(cashin))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(cashout))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(bet))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(win))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(profit))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(jackpot))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(coljuegos))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(admin))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(total))}</td>
                    <td>${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseFloat(alfastreet))}</td>
                </tr>
            `;
            tabla.appendChild(tbody);
        };

        totalAlfastreet(casino.value);

        // Datos insertados
        tablaLiquidaciones.appendChild(titulo);
        tablaLiquidaciones.appendChild(tabla);

    }

    // Obtener el total de liquidación
    async function totalAlfastreet(casino) {
        const url = `${window.location.protocol}//${window.location.hostname}/liquidations/totalLiquidation?casino=${casino}`;
        const request = await fetch(url);
        const result = await request.json();

        const totalTitulo = document.createElement('H5');
        totalTitulo.classList.add('text-center');
        totalTitulo.textContent = `Total a Pagar = ${new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP' }).format(parseInt(result))}`;

        const buttonSendLiquidationTotal = document.createElement('BUTTON');
        buttonSendLiquidationTotal.setAttribute('type', 'button');
        buttonSendLiquidationTotal.setAttribute('id', 'generarTotalLiquidacion');
        buttonSendLiquidationTotal.classList.add('btn', 'btn-primary');
        buttonSendLiquidationTotal.textContent = 'Generar liquidacion Total';

        tablaLiquidaciones.appendChild(totalTitulo);
        if (result != 0) {
            tablaLiquidaciones.appendChild(buttonSendLiquidationTotal);

            const actionButtonLiquidation = document.querySelector('#generarTotalLiquidacion');
            actionButtonLiquidation.addEventListener('click', (e) => {
                e.preventDefault();
                sendData(casino, result)
            });
        }

    }

    // Enviar los datos para totalizar la liquidación
    async function sendData(casino, valor) {
        const data = new FormData();
        data.append('casino_id', casino);
        data.append('totalLiquidation', valor);

        Swal.fire({
            title: 'Calculando su liquidacion, por favor espere!',
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
            const url = `${window.location.protocol}//${window.location.hostname}/totalaccountants/add`;
            const request = await fetch(url, {
                headers: {
                    'X-CSRF-Token': _csrfToken,
                },
                method: 'POST',
                body: data,
            });
            const result = await request.json();
            if (result === 'ok') {
                Swal.fire(
                    'Gracias!!',
                    'La liquidación de tus maquinas ha sido realizada con exito!!',
                    'success'
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace(`${window.location.protocol}//${window.location.hostname}/accountants/general`);
                    }
                });
            }

        } catch (error) {
            Swal.fire(
                'Ups!!',
                'Hubo un error al ingresar los datos, por favor contacte con Administrador :(',
                'error'
            );
        }


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

    // Limpiar Liquidaciones
    function limpiarLiquidacion() {
        while (tablaLiquidaciones.firstChild) {
            tablaLiquidaciones.removeChild(tablaLiquidaciones.firstChild);
        }
    }
});