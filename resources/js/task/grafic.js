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
