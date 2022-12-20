"use strict";

function confirmed(id) {
    Swal.fire({
        title: 'Ingresa el número de factura',
        input: 'text',
        inputPlaceholder: 'Numero de Factura',
        inputAttributes: {
            autocapitalize: 'off',
            'aria-label': 'Numero de Factura'
        },
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        showLoaderOnConfirm: true,
        preConfirm: (value) => {
            return fetch(`${window.location.protocol}//${window.location.hostname}/totalaccountants/updateStatus?id=${id}&nfactura=${value}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText)
                    }
                    return response.json()
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Error: ${error}`
                    )
                })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                icon: 'success',
                title: 'Exito!!',
                text: 'Participación Actualizada Correctamente!!',
                confirmButtonText: 'Ok',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            })
        }
    })
}