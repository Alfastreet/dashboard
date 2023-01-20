const confirmed = document.querySelector('#confirmed');
const id = document.querySelector('#id').value
const quotes = document.querySelector('#quotes');
const quotevalue = document.querySelector('#quotevalue');
const agreementvalue = document.querySelector('#agreementvalue').value;
const separation = document.querySelector('#separation');
const _csrfToken = document.getElementsByName('_csrfToken');
const machineId = document.querySelector('#machine');

confirmed.addEventListener('click', () => {
  const date = new Date();
  date.toUTCString();
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  });

  
  swalWithBootstrapButtons.fire({
    title: 'Advertencia?',
    text: `La cartera tendra vigencia desde la fecha ${date}`,
    icon: 'info',
    showCancelButton: true,
    confirmButtonText: 'Si, Firmar!',
    cancelButtonText: 'No, Cancelar!',
    reverseButtons: true
  }).then(async (result) => {
    if (result.isConfirmed) {

      let timerInterval
      Swal.fire({
        title: 'Creando Nuevo estado de Cartera, por favor espere!',
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
        const url = `${window.location.protocol}//${window.location.hostname}/agreements/signed?id=${id}`;
        const request = await fetch(url);
        const result = await request.json();

        if (result === 'ok') {
          createWallet(id, agreementvalue);
          instalationMachine(machineId);
        }

      } catch (error) {
        console.log(error);
        swalWithBootstrapButtons.fire(
          'Ups!!',
          'Ha ocurrido un error. Intentalo mas tarde :(',
          'error'
        )
      }

    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Cancelado',
        'La operacion ha sido cancelada :)',
        'error'
      )
    }
  })
})

async function createWallet(id, agreementvalue) {
  const data = new FormData();
  data.append('agreement_id', id);
  data.append('payment', agreementvalue);
  data.append('collection', separation.value)

  let timerInterval
  Swal.fire({
    title: 'Creando Cartera, por favor espere!',
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
    const url = `${window.location.protocol}//${window.location.hostname}/wallets/add`;
    const request = await fetch(url, {
      headers: {
        'X-CSRF-Token': _csrfToken[0].value
      },
      method: 'POST',
      body: data
    });

    const result = await request.json();
    if (result === 'ok') {
      console.log(result);
      Swal.fire(
        'Exito!!',
        'Cartera generada Correctamente!!',
        'success'
      ).then((result) => {
        if (result.isConfirmed) {
          window.location.reload();
        }
      })

    }

  } catch (error) {
    console.error(error);
  }

}


async function instalationMachine(machine) {
    try {
        const url = `${window.location.protocol}//${window.location.hostname}/machines/updateinstalation?machineid=${machine}`;

        const request = await fetch(url);
        const result = await request.json();

        console.log(result)
        
    } catch (error) {
        console.log(error);
    }
}