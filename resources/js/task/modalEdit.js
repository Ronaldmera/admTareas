document.addEventListener("DOMContentLoaded", () => {
    const baseUrl = "http://localhost/admTareas/public"; // URL base de tu aplicación

    // Vincular eventos "click" a los botones de mostrar tarea
    document.querySelectorAll('.btn-edit-task').forEach(button => {
        button.addEventListener('click', async function () {
            const taskId = this.getAttribute('data-id');
            try {
                // Solicitud al backend para obtener la tarea
                const response = await fetch(`${baseUrl}/task/${taskId}`);
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }

                const task = await response.json(); // Convertir respuesta en JSON
                // console.log('Datos recibidos:', task);

                document.getElementById('update-title').value = task.title;
                document.getElementById('update-content').value = task.content;
                document.getElementById('update-status').value = task.status;


                // Mostrar el modal
                const modal = document.getElementById('modal-edit');
                modal.style.display = "flex";

            } catch (error) {
                console.error('Error al cargar la tarea:', error);
                alert('No se pudo cargar la información de la tarea. Verifica la conexión o la configuración.');
            }
        });
    });

    // Cerrar el modal al hacer clic en el botón de cerrar
    document.querySelector('#modal-edit .btn-close-modal').addEventListener('click', function () {
        document.getElementById('modal-edit').style.display = "none";
    });

    // Cerrar el modal al hacer clic fuera del contenido del modal (opcional)
    const modal = document.getElementById('modal-edit');
    modal.addEventListener('click', function (event) {
        if (event.target === this) {
            this.style.display = "none"; // Ocultar el modal si se hace clic fuera
        }
    });
});

