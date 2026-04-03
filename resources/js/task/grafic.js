document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("myChart").getContext("2d");

    let labels = ["Completadas", "Pendientes"];
    let data = [complete, pending];
    let colors = ["#3cb198", "#e26355"];

    if (pending === 0 && complete === 0) {
        labels = ["Sin tareas"];
        data = [1];
        colors = ["#6c757d"];
    }
    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: labels,
            datasets: [
                {
                    data: data,
                    backgroundColor: colors,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        },
    });
});
