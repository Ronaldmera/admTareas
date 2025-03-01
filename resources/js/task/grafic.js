document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("myChart").getContext("2d");

    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Completadas", "Pendientes"],
            datasets: [{
                data: [complete, pending],
                backgroundColor: ["#28a745", "#19a7bd"]
            }]
        }
    });
});

//si no hay tareas muestra el mensaje de: no hay tareas para realizar la grafica
let msjEmpty = document.querySelector('.tasks-empty');
    if(complete === 0 && pending === 0){
    msjEmpty.style.display = "flex";
}
