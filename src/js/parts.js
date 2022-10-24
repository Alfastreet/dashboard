const file = document.querySelector('#file');
const image = document.querySelector('#image');
const serial = document.querySelector('#serial');
const nameProduct = document.querySelector('#name');
const anadir = document.querySelector('#anadir');
const money = document.querySelector('#money');
const value = document.querySelector('#value');
const amount = document.querySelector('#amount');

serial.addEventListener('focusout', (e) => {
    const valor = e.target.value;
    searchPart(valor);
})

image.addEventListener('change', () => {

    const archive = image.files;

    if (!archive || !archive.length) {
        file.src = '';
        return;
    }

    const firstArchive = archive[0];
    const objectUrl = URL.createObjectURL(firstArchive);

    file.src = objectUrl;
})

async function searchPart(v) {
    const url = `${window.location.protocol}//${window.location.hostname}/parts/searchpart?serial=${v}`;
    const request = await fetch(url);
    const result = await request.json();

    if (result === 'error') {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'La pieza ya fue registrada'
        });
        
        nameProduct.disabled = true;
        anadir.disabled = true;
        money.disabled = true;
        value.disabled = true;
        amount.disabled = true;

    } else {
        nameProduct.disabled = false;
        anadir.disabled = false;
        money.disabled = false;
        value.disabled = false;
        amount.disabled = false;
    }

}

