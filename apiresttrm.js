(async () => {
    const url = `https://www.datos.gov.co/resource/5bav-b4z5.json`;
    const request = await fetch(url);
    const result = await request.json();

    const datos = document.querySelector('#datos');

    result.forEach(data => {
        const fila = `<td>${data.valor}</td>
        <td>${data.vigenciadesde}</td>
        <td>${data.vigenciahasta}</td>`;

        datos.innerHTML = fila;
        console.log(data);

    });
    

})();

// {
//     "valor": "4389.8",
//     "vigenciadesde": "2022-09-15T00:00:00.000",
//     "vigenciahasta": "2022-09-15T00:00:00.000"
// }
