const btnShowForm = document.querySelector('.btn-show-form-update-password');
const btnCancel = document.querySelector('.btn-cancel');
const btnChangePassword = document.querySelector('.btn-change-password');
const modal = document.querySelector('.modal-change-password');
let currentPassword = document.querySelector('.current-password');
let newPassword = document.querySelector('.new-password');
let confirmNewPassword = document.querySelector('.confirm-new-password');
let textPasswordError = document.querySelectorAll('.text-password-error');

btnShowForm.addEventListener('click', () => {
  // Mostrar el modal
  modal.classList.add('modal-change-password-active');
});
btnCancel.addEventListener('click', () => {
  modal.classList.remove('modal-change-password-active');
  // limpiando inputs
  currentPassword.value = '';
  newPassword.value = '';
  confirmNewPassword.value = '';
});
// validar si las contraseñas coinciden
btnChangePassword.addEventListener('click', (e) => {
  if (newPassword.value != confirmNewPassword.value) {
    e.preventDefault();
    textPasswordError.forEach((text) => {
      text.textContent = 'Las contraseñas no coinciden';
    });
  }
});
if (window.updatePasswordStatus) {
  if (window.updatePasswordStatus === 'ok') {
    Swal.fire({
      icon: 'success',
      text: 'Contraseña Actualizada',
      showConfirmButton: false,
      timer: 1800,
    });
  } else if (window.updatePasswordStatus === 'error') {
    Swal.fire({
      icon: 'error',
      text: 'La contraseña actual no coincide',
      showConfirmButton: false,
      timer: 1800,
    });
  }
}
