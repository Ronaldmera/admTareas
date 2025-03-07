let icoAdd = document.querySelector('.item-add'); // Ícono de +
let modal = document.querySelector('.modal-create-task'); // Contenedor del modal
let closeModal = document.querySelector('.btn-close-modal'); // Botón de cancelar modal
let titleInput = document.querySelector('input[name="title"]'); // Input de título
let contentTextarea = document.querySelector('textarea[name="content"]'); // Textarea de contenido
let statusSelect = document.querySelector('#status-option'); // Select de estado

icoAdd.addEventListener('click', () => {
    modal.classList.add('active');
});

closeModal.addEventListener('click', () => {
    modal.classList.remove('active');

    // Limpiar los valores del formulario
    titleInput.value = "";
    contentTextarea.value = "";
    statusSelect.value = "";
});
