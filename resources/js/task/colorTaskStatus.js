//cambia el color del estado de cada tarea dependiendo del estado
let camps = document.querySelectorAll('#status'); // Selecciona todas las celdas con clase "status"

camps.forEach((camp, index) => {
    if (taskStatus[index] === "completada") {
        camp.style.color = "#509AEB";
    } else if (taskStatus[index] === "pendiente") {
        camp.style.color = "#E57373";
    } else {
        camp.style.color = "black";
    }
});
