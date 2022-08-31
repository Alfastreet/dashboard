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
})