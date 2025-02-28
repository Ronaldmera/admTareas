document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("myChart").getContext("2d");

    new Chart(ctx, {
        type: "pie",
        data: {
            labels: ["Completadas", "Pendientes"],
            datasets: [{
                data: [complete, pending],
                backgroundColor: ["#3b83f6de", "#9fb6dbde"]
            }]
        }
    });
});
