
var titleText = `¡Bienvenido, ${userName}!`;
        var msgText = "Aquí puedes gestionar tus tareas de manera eficiente y visualizar tu progreso.";

        let i = 0;
        let j = 0;

        function typeEffectTitle() {
            if (i < titleText.length) {
                document.getElementById("typing-title").innerHTML += titleText.charAt(i);
                i++;
                setTimeout(typeEffectTitle, 50); // Velocidad de escritura
            } else {
                document.getElementById("typing-msg").style.display = "block"; // Mostrar el mensaje
                setTimeout(typeEffectMsg, 500); // Esperar antes de escribir el mensaje
            }
        }

        function typeEffectMsg() {
            if (j < msgText.length) {
                document.getElementById("typing-msg").innerHTML += msgText.charAt(j);
                j++;
                setTimeout(typeEffectMsg, 40); // Velocidad de escritura
            }
        }

        typeEffectTitle(); // Iniciar animación


//mustra el texto aparte se no hay tareas para realizar la grafica
let txt = document.querySelector('#tasks-empty');
let containerGrafic = document.querySelector('.grafic');

if (pending === 0 && complete === 0) {
    txt.style.display = "flex";
   containerGrafic.classList.add('grafic-empty')
} else {
    txt.style.display = "none";
    containerGrafic.classList.remove('grafic-empty');
}
