document.addEventListener("DOMContentLoaded", function() {
    const tabla = document.querySelector("table tbody"); // Selecciona el cuerpo de la tabla
    const tareaSeleccionada = document.querySelector(".task-select");

    if (tareaSeleccionada) {
        tabla.prepend(tareaSeleccionada); // Mueve la tarea seleccionada al inicio
    }
});
