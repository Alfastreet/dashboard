const file = document.querySelector('#file');
const image = document.querySelector('#image');

image.addEventListener('change', () => {

    const archive = image.files;

    if(!archive || !archive.length){
        file.src = '';
        return;
    }

    const firstArchive = archive[0];
    const objectUrl = URL.createObjectURL(firstArchive);

    file.src = objectUrl;


    document.querySelector('#dayInit').disabled = false;
    document.querySelector('#dayEnd').disabled = false;
    document.querySelector('#cashin').disabled = false;
    document.querySelector('#cashout').disabled = false;
    document.querySelector('#bet').disabled = false;
    document.querySelector('#win').disabled = false;
    document.querySelector('#jackpot').disabled = false;
    document.querySelector('#gamesplayed').disabled = false;
})