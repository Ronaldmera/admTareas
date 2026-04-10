let ico = document.querySelector(".eye-icon");//icono de ojo
const iconoCloseEye = document.querySelector(".close-eye");
let passwordContent = document.getElementById("password");//contenido del input password

//mustra la contraseña y cambia el icono al de ojo con la linea cruzada
ico.addEventListener('click', () => {
        passwordContent.type = "text";
        iconoCloseEye.style.display = "flex";
        ico.style.display = "none";
});
//oculta la contraseña o la convierte en  tipo password y se coloca el icono de ojo
iconoCloseEye.addEventListener('click', () => {
    passwordContent.type = "password";
    iconoCloseEye.style.display = "none";
    ico.style.display = "flex";
});

