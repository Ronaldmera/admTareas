let icoEdit = document.querySelector('.edit-ico');
let closeIco = document.querySelector('.close-edit-ico');
let modal = document.querySelector('.container-form');
const nameInput = document.getElementById("name");
const imageInput = document.getElementById("image");

let originalName = nameInput.value; // Guardar el nombre original antes de abrir el modal

icoEdit.addEventListener("click", function () {
    modal.classList.add('modal-edit-active');
    originalName = nameInput.value;
});

// Cerrar modal y restaurar el nombre original, pero eliminar la imagen seleccionada
closeIco.addEventListener("click", function () {
    modal.classList.remove('modal-edit-active');

    nameInput.value = originalName;
    imageInput.value = "";
});
