document.addEventListener('DOMContentLoaded', function() {

    initApp();
})

function initApp(){

}

const dateInit = document.querySelector('#dateInit');
dateInit.addEventListener('change', function(e){
    getDate(e.target.value);
});

const dateEnd = document.querySelector('#dateEnd');
dateEnd.addEventListener('change', function(e) {
    getDate(e.target.value);
});

const month = document.querySelector('#month');
month.addEventListener('change',  function(e) {
    console.log(e.target.value)
})

const year = document.querySelector('#year').value;
console.log(`Año: ${year}`);

const totalInit = document.querySelector('#totalIni').addEventListener('keyup', function(e) {
    console.log(`Valor Inicial: ${e.target.value}`);
});

const totalEnd = document.querySelector('#totalEnd').addEventListener('keyup', function(e) {
    console.log(`Valor Final: ${e.target.value}`);
});

const profit = document.querySelector('#profit').addEventListener('keyup', function(e){
    console.log(`Juegos Jugados: ${e.target.value}`);
})



function getDate(data) {
    const day = data.split('-').pop() 
    console.log( `Dia: ${day}` );
}

