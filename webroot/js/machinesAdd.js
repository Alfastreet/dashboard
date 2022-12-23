"use strict";

document.addEventListener('DOMContentLoaded', () => {
    const formulario = document.querySelector('#formulario');
    const format = document.querySelector('#format');
    const tipoContrato = document.querySelector('[name="contract_id"]');
    const idInterno = document.querySelector('#idint');
    const serial = document.querySelector('#serial');
    const add = document.querySelector('#add');
    const _csrfToken = document.getElementsByName('_csrfToken');

    // Funciones de verificacion
    tipoContrato.addEventListener('change', (e) => {
        const value = e.target.value;
        const casino = document.querySelector('[name="casino_id"]');
        const owner = document.querySelector('[name="owner_id"]');
        const company = document.querySelector('[name="company_id"]');
        const serial = document.querySelector('[name="serial"]');
        const date = document.querySelector('[name="dateInstalling"]');

        if (value == 3) {
            casino.setAttribute('disabled', true);
            casino.value = 0;
            casino.style.visibility = 'hidden';
            owner.setAttribute('disabled', true);
            owner.value = 0;
            owner.style.visibility = 'hidden';
            company.setAttribute('disabled', true);
            company.value = 0;
            company.style.visibility = 'hidden';
            serial.setAttribute('disabled', true);
            serial.value = 0;
            serial.style.visibility = 'hidden';
            date.setAttribute('disabled', true);
            date.value = '0000-00-00';
            date.style.visibility = 'hidden';
        } else {
            casino.removeAttribute('disabled');
            casino.value = '';
            casino.style.visibility = 'visible';
            owner.removeAttribute('disabled');
            owner.value = '';
            owner.style.visibility = 'visible';
            company.removeAttribute('disabled');
            company.value = '';
            company.style.visibility = 'visible';
            serial.removeAttribute('disabled');
            serial.value = '';
            serial.style.visibility = 'visible';
            date.removeAttribute('disabled');
            date.value = '';
            date.style.visibility = 'visible';
        }
    });

    idInterno.addEventListener('blur', validarId);
    serial.addEventListener('blur', validarSerial);

    // Evento para async
    formulario.addEventListener('submit', verificarDatos);

    function verificarDatos(e) {
        e.preventDefault();

        const data = new FormData(formulario);

        for (let key of data.keys()) {
            if (data.get(key) == '') {
                mostrarAlerta(key);
            }
            // console.log(`Llave = ${key}, Valor =  ${data.get(key)}`);
        };

        sendData(data);
    }

    // Funciones validadoras
    function validarId(e) {
        const valor = e.target.value;

        if (valor.trim() === '') {
            limpiarAlertas();
            const alerta = document.createElement('DIV');
            alerta.classList.add('alert', 'alert-danger');
            const mensaje = document.createElement('P');
            mensaje.textContent = `El campo ID interno no puede estar vacio`;
            add.setAttribute('disabled', true);

            alerta.appendChild(mensaje);
            format.appendChild(alerta);
        } else {
            add.removeAttribute('disabled');
            validarExistencia(valor);
        }
    }

    function validarSerial(e) {
        const valor = e.target.value;

        if (valor.trim() === '') {
            limpiarAlertas();
            const alerta = document.createElement('DIV');
            alerta.classList.add('alert', 'alert-danger');
            const mensaje = document.createElement('P');
            mensaje.textContent = `El campo Serial no puede estar vacio`;
            add.setAttribute('disabled', true);

            alerta.appendChild(mensaje);
            format.appendChild(alerta);
        } else {
            add.removeAttribute('disabled');
            validarSerial(valor);
        }
    }

    // Funciones Asyncronas

    async function validarExistencia(data) {
        const url = `${window.location.protocol}//${window.location.hostname}/machines/searchIdInt?idint=${data}`;
        const request = await fetch(url);
        const result = await request.json();

        if (result === 'error') {
            Swal.fire(
                'Ups!!',
                'Esta maquina ya se encuentra registrada',
                'error'
            )
            add.setAttribute('disabled', true);
        } else {
            add.removeAttribute('disabled');
        }
    }

    async function validarSerial(data) {
        const url = `${window.location.protocol}//${window.location.hostname}/machines/searchSerial?serial=${data}`;
        const request = await fetch(url);
        const result = await request.json();

        console.log(result);

        // if (result === 'error') {
        //     Swal.fire(
        //         'Ups!!',
        //         'Este serial ya se encuentra en uso!!',
        //         'error'
        //     )
        //     add.setAttribute('disabled', true);
        // } else {
        //     add.removeAttribute('disabled');
        // }
    }

    // Post HTTP
    async function sendData(data) {
        Swal.fire({
            title: 'Ingresando Maquina, por favor espere!',
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
            const url = `${window.location.protocol}//${window.location.hostname}/machines/add`;
            const request = await fetch(url, {
                headers: {
                    'X-CSRF-Token': _csrfToken.value,
                },
                method: 'POST',
                body: data,
            });
            const result = await request.json();
            Swal.fire(
                'Exito!!',
                'Maquina agregada!!',
                'success'
            );
            formulario.reset();
        } catch (error) {
            console.error(error);
            swalWithBootstrapButtons.fire(
                'Ups!!',
                'Ha ocurrido un error. Intentalo mas tarde :(',
                'error'
            );
        }

    }

    function mostrarAlerta(dato) {
        limpiarAlertas();
        const alerta = document.createElement('DIV');
        alerta.classList.add('alert', 'alert-danger');
        const mensaje = document.createElement('P');
        mensaje.textContent = `El campo ${dato} es Requerido`;

        alerta.appendChild(mensaje);
        format.appendChild(alerta);
    }

    function limpiarAlertas() {
        setTimeout(() => {
            while (format.firstChild) {
                format.removeChild(format.firstChild)
            }
        }, 2500);
    }
});