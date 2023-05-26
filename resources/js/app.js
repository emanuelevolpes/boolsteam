import './bootstrap';
import '~resources/scss/app.scss'

// Import all of Bootstrap's JS
import * as bootstrap from 'bootstrap'

// gestione immagini build
import.meta.glob([
    '../img/**'
])

// show preview upload 
const imageInput = document.querySelector('#image');
imageInput.addEventListener('change', showPreview);
function showPreview(event){
    if(event.target.files.length > 0){
        const src = URL.createObjectURL(event.target.files[0]);
        const preview = document.getElementById("file-image-preview");
        preview.src = src;
    }
}