let icoEditProfile = document.querySelector('.btn-edit-profile');
let modalUpdateProfile = document.querySelector('.modal-update-profile');

let btnCancel = document.querySelector('.btn-cancel-update-profile');
icoEditProfile.addEventListener('click', () => {
  modalUpdateProfile.classList.add('modal-update-profile-active');
});

btnCancel.addEventListener('click', () => {
  modalUpdateProfile.classList.remove('modal-update-profile-active');
});
