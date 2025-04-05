document.addEventListener("DOMContentLoaded", () => {
    const baseUrl = "http://localhost/admTareas/public";

    document.querySelectorAll('.btn-show-task').forEach(button => {
        button.addEventListener('click', function () {
            const taskId = this.getAttribute('data-id');

            fetch(`${baseUrl}/task/${taskId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Error ${response.status}: ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(task => {
                    // Función para formatear fecha "2025-04-05" a "05-04-2025"
                    const formatearFecha = fecha => {
                        if (!fecha) return "Sin fecha";
                        const [año, mes, dia] = fecha.split("-");
                        return `${dia}-${mes}-${año}`;
                    };

                    const fechaCreacion = formatearFecha(task.created_at);
                    const fechaLimite = formatearFecha(task.end_date);

                    // Mostrar los datos en el modal
                    document.getElementById('modal-title').innerText = task.title || "Sin título";
                    document.getElementById('modal-description').innerText = task.content || "Sin descripción";
                    document.getElementById('modal-status').innerText = task.status || "Sin estado";
                    document.getElementById('modal-date').innerText = fechaCreacion;
                    document.getElementById('modal-end-date').innerText = fechaLimite;

                    document.getElementById('modal-task').classList.add('modal-show-active');
                })
                .catch(error => {
                    console.error('Error al cargar la tarea:', error);
                    alert('No se pudo cargar la información de la tarea.');
                });
        });
    });

    document.querySelector('#modal-task .close').addEventListener('click', function () {
        document.getElementById('modal-task').classList.remove('modal-show-active');
    });
});
