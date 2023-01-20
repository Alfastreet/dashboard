'use strict';

const downloadButton = document.querySelector('#download');

downloadButton.addEventListener('click', async (e) => {
    e.preventDefault();

    const { value: formValues } = await Swal.fire({
        title: 'Seleccione mes y año de la liquidación',
        html:
            `<select id="swal-input1" class="swal2-input">
                <option value="1">Enero</option>        
                <option value="2">Febrero</option>        
                <option value="3">Marzo</option>        
                <option value="4">Abril</option>        
                <option value="5">Mayo</option>        
                <option value="6">Junio</option>        
                <option value="7">Julio</option>        
                <option value="8">Agosto</option>        
                <option value="9">Septiembre</option>        
                <option value="10">Octubre</option>        
                <option value="11">Noviembre</option>        
                <option value="12">Diciembre</option>        
            </select>` +
            `<select id="swal-input2" class="swal2-input"">
                <option value="2022">Año 2022</option>        
                <option value="2023">Año 2023</option>        
            </select>`,
        focusConfirm: false,
        preConfirm: async () => {
            try {
                const response = await fetch(`${window.location.protocol}//${window.location.hostname}/accountants/excel?month=${document.getElementById('swal-input1').value}&year=${document.getElementById('swal-input2').value}`);

                if (response.status === 200) {
                    window.location.href = `${window.location.protocol}//${window.location.hostname}/accountants/excel?month=${document.getElementById('swal-input1').value}&year=${document.getElementById('swal-input2').value}`;
                }
            } catch (error) {
                console.log(error);
                Swal.showValidationMessage(
                    `Request failed: ${error}`
                );
            }
        }
    })


});



/* 

 Swal.fire({
        title: 'Selecciona el mes de Liquidación',
        input: 'select',
        inputOptions: {
            1: 'Enero',
            2: 'Febrero',
            3: 'Marzo',
            4: 'Abril',
            5: 'Mayo',
            6: 'Junio',
            7: 'Julio',
            8: 'Agosto',
            9: 'Septiembre',
            10: 'Octubre',
            11: 'Noviembre',
            12: 'Diciembre',
        },
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Liquidar',
        showLoaderOnConfirm: true,
        preConfirm: async (login) => {
            try {
                const response = await fetch(`${window.location.protocol}//${window.location.hostname}/accountants/excel?month=${login}`);
                console.log(response.status);
                if (response.status === 200) {
                    window.location.href = `${window.location.protocol}//${window.location.hostname}/accountants/excel?month=${login}`;
                }
            } catch (error) {
                console.log(error);
                Swal.showValidationMessage(
                    `Request failed: ${error}`
                );
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    })

    () => {
            return [
                document.getElementById('swal-input1').value,
                document.getElementById('swal-input2').value
            ]
        }
*/