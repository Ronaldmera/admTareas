document.addEventListener("DOMContentLoaded", () => {
    const baseUrl = "http://localhost/admTareas/public";

    document.querySelectorAll('.btn-edit-task').forEach(button => {
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
                    document.getElementById('update-title').value = task.title;
                    document.getElementById('update-content').value = task.content;
                    document.getElementById('update-status').value = task.status;

                    // Convertir end_date a formato YYYY-MM-DD si existe
                    if (task.end_date) {
                        const fechaLimite = new Date(task.end_date);
                        const fechaFormateada = fechaLimite.toISOString().split('T')[0];
                        document.getElementById('update-end-date').value = fechaFormateada;
                    } else {
                        document.getElementById('update-end-date').value = '';
                    }

                    // Asignar la acción del formulario
                    const form = document.querySelector('#modal-edit form');
                    form.action = `${baseUrl}/task/${taskId}`;

                    // Mostrar el modal
                    document.querySelector('.modal-edit').classList.add('modal-edit-active');
                    document.querySelector('.item-add').style.display = "none";
                })
                .catch(error => {
                    console.error('Error al cargar la tarea:', error);
                    alert('No se pudo cargar la información de la tarea.');
                });
        });
    });

    // Cerrar modal
    document.querySelector('#modal-edit .btn-close-modal').addEventListener('click', function () {
        document.getElementById('modal-edit').classList.remove('modal-edit-active');
        document.querySelector('.item-add').style.display = "flex";
    });
});
