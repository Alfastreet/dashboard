const machine = document.querySelector('#machine');
const discount = document.querySelector('#discount');
const agreementvalue = document.querySelector('#agreementvalue');
const resumen = document.querySelector('#resumen');
const business = document.querySelector('#business');
const client = document.querySelector('#client');
const dataAdd = document.querySelector('#dataAdd');
const iniquote = document.querySelector('#iniquote');
const quoteper = document.querySelector('#quoteper');
const separation = document.querySelector('#separation');
const percentValue = document.querySelector('#percentValue');
const nquote = document.querySelector('#nquote');
const sald = document.querySelector('#sald');
const anadir = document.querySelector('#anadir');
const comments = document.querySelector('#comments');
const quotevalue = document.querySelector('#quotevalue');
const _csrfToken = document.getElementsByName('_csrfToken');

machine.disabled = true;


machine.addEventListener('change', (e) => {
    const val = e.target.value
    if (val != 0) {
        dataAdd.style.display = 'block';
        searchId(val);
    } else {
        dataAdd.style.display = 'none';
    }
});

business.addEventListener('change', (e) => {
    const value = e.target.value;
    searchClient(value);
});

anadir.addEventListener('click', (e) => {
    e.preventDefault;
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Antes de Continuar',
        text: "Se generara un nuevo acuerdo comercial, esta informacion no se podra editar despues ¿Deseas continuar?",
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Generar Contrato',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            generateAgreement();
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
});

async function generateAgreement() {
    const data = new FormData();

    data.append("client_id", client.value);
    data.append("business_id", business.value);
    data.append("machine_id", machine.value);
    data.append("discount", discount.value);
    data.append("agreementvalue", agreementvalue.value);
    data.append("nquote", nquote.value);
    data.append("quoteini", iniquote.value);
    data.append("separation", separation.value);
    data.append("comments", comments.value);
    data.append("percentinicial", quoteper.value);
    data.append("quotevalue", quotevalue.value);

    try {
        const url = `${window.location.protocol}//${window.location.hostname}/agreements/add`;
        const request = await fetch(url, {
            headers: {
                'X-CSRF-Token': _csrfToken[0].value
            },
            method: 'POST',
            body: data
        });
        const result = await request.json();

        if (result === 'ok') {
            viewAgreement();
        }

    } catch (error) {
        console.log(error);
        Swal.fire(
            'Ups!!',
            'Ocurrio un error, Intenta de nuevo mas tarde',
            'error'
          )
    }


}

async function viewAgreement() {
    const url = `${window.location.protocol}//${window.location.hostname}/agreements/searchagreement`;
    const request = await fetch(url);
    const result = await request.json();

    if (result) {
        paymentsGenerate(result.id, result.nquote, result.quotevalue);
        return;
    }

}

async function paymentsGenerate(id, quote, value) {

    const data = new FormData();
    data.append("agreement_id", id);
    data.append("quotevalue", value);
    data.append("nquote", quote);

    const url = `${window.location.protocol}//${window.location.hostname}/estimateds/add`;
    const request = await fetch(url, {
        headers: {
            'X-CSRF-Token': _csrfToken[0].value
        },
        method: 'POST',
        body: data
    });
    const result = await request.json();

    if (result === 'ok') {
        window.location.replace(`${window.location.protocol}//${window.location.hostname}/agreements/view/${id}`);
        return;
    }

}


async function searchClient(v) {
    const url = `${window.location.protocol}//${window.location.hostname}/client/searchClientBusiness?id=${v}`;
    const request = await fetch(url);
    const result = await request.json();

    if (result != 'error') {
        let data = `<option value="">-- Seleccione una opcion --</option>`

        for (let i = 0; i < result.length; i++) {
            data += `<option value="${result[i].id}">${result[i].name}</option>`
        }

        client.disabled = false;
        machine.disabled = false;
        client.innerHTML = data;

    } else {
        client.disabled = true;
        client.value = 0;
    }

}

async function searchId(id) {
    limpiardata();
    const url = `${window.location.protocol}//${window.location.hostname}/machines/searchId?id=${id}`;
    const request = await fetch(url);
    const result = await request.json();

    const valueMachine = parseInt(result.value);
    const valueFormated = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(valueMachine);

    resumen.innerHTML += `
                        <tr>
                            <th scope="row">Maquina</th>
                            <td>${result.name}</td>
                        </tr>
                        <tr>
                            <th scope="row">Valor de la maquina</th>
                            <td>${valueFormated}</td>
                        </tr>`;

    discount.addEventListener('focusout', (e) => {
        const discountValue = e.target.value;
        const valorVenta = valueMachine - discountValue;
        const percentresult = (discountValue * 100) / valueMachine;
        percentValue.value = percentresult;
        agreementvalue.value = valorVenta;
        const ventaFormated = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(agreementvalue.value);

        resumen.innerHTML += `
                            <tr>
                                <th scope="row">Descuento</th>
                                <td>${percentValue.value}%</td>
                                <td>$ ${discount.value} USD</td>
                            </tr>
                            <tr>
                                <th scope="row">Valor de la Venta</th>
                                <td>${ventaFormated}</td>
                            </tr>
                                
                                `
    });

    separation.addEventListener('focusout', (e) => {
        const value = e.target.value;
        const valueFormated = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(value);

        resumen.innerHTML += `<tr>
                                <th scope="row">Separacion</th>
                                <td>${valueFormated}</td>
                            </tr>`
    })

    quoteper.addEventListener('focusout', (e) => {
        const percent = e.target.value;
        const initQuote = ((agreementvalue.value * percent) / 100) - separation.value;
        const iniFormated = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(initQuote)
        iniquote.value = initQuote;
        const saldo = agreementvalue.value - initQuote - separation.value;
        const saldoFormated = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(saldo);
        sald.value = saldo;

        resumen.innerHTML += `<tr>
                                <th scope="row">Cuota Inicial</th>
                                <td>${percent}%</td>
                                <td>${iniFormated}</td>
                            </tr>
                            <tr>
                                <th scope="row">Saldo</th>
                                <td>${saldoFormated}</td>
                            </tr>`

    });

    nquote.addEventListener('focusout', (e) => {
        const quotes = e.target.value;
        const quoteValue = Math.round(sald.value / quotes);
        const percentFinanciero = 0.43;
        const percent = (quoteValue * percentFinanciero) / 100;
        const impuesto = (sumar(quotes, percent)) / quotes;
        const quoteV = quoteValue + impuesto;
        const quoteVFormated = new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(quoteV);

        resumen.innerHTML += `<tr>
                                <th scope="row">Numero de Cuotas</th>
                                <td>${nquote.value}</td>
                            </tr>
                            <tr>
                                <th scope="row">Valor de la Cuota</th>
                                <td>${quoteVFormated}</td>
                            </tr>`

        function sumar(q, p) {
            let total = 0;

            for (let i = 0; i < q; i++) {
                const nose = q - i;
                const sumatoria = p * nose;
                total += sumatoria;
            }
            return total;
        }
        quotevalue.value = quoteV;


    })

}

// Limpiar data
function limpiardata() {
    while(resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
    }
}

