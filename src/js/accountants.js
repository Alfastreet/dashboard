//Inicio de todos los procesos Async del documento

document.addEventListener('DOMContentLoaded', function() {
    //Funcion Inicializadora
    initApp();
})

function initApp() {
    //Metodos Async
    //
}
let machine = [];
let count = {
    serial: '',
    machineName: '',
    casino: '',
    dataCount: {
        days: '',
        mounth: '',
        totalBet: '',
        totalWin: ''
    },
    foto: ''
}

const selectCasino = document.querySelector('#casinos'). addEventListener('change', function(e) {
    const idCasino = e.target.value;
    searchCasino(idCasino);
})

const div = document.querySelector('.table-counts')
div.style.display = 'none';

async function searchCasino (id) {
    try {
        const url = `http://localhost/alfastreet/machines/searchPart?id=${id}`;
        const result = await fetch(url);
        const res = await result.json();

        if(res != 'error'){
            machine = res;
            console.log(res)
        }


    } catch (error) {
        console.log(error);
    }
}
