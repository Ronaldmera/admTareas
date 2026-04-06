const btnShowForm = document.querySelector('.btn-show-form-update-password');
const form = document.querySelector('.form-update-password');
btnShowForm.addEventListener('click', () => {
  form.classList.toggle('d-none');
  if (form.classList.contains('d-none')) {
    btnShowForm.textContent = 'Cambiar contraseña';
  } else {
    btnShowForm.textContent = 'Cancelar';
  }
});
