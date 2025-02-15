let ico = document.querySelector(".eye-icon");//icono de ojo
let passwordContent = document.getElementById("password");//contenido del input password

//al tocar el icono se ejecuta esta funcion flecha
ico.addEventListener('click', () => {
    if(passwordContent.type === "password"){//si el tipo es password lo convierte en text
        passwordContent.type = "text";
    }
    else{
        passwordContent.type = "password";//si el tipo es text lo convierte en password
    }

})

