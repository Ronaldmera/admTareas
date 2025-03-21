document.addEventListener("DOMContentLoaded", () => {
    const baseUrl = "http://localhost/admTareas/public"; // URL base de tu aplicación

    // Vincular eventos "click" a los botones de mostrar tarea
    document.querySelectorAll('.btn-show-task').forEach(button => {
        button.addEventListener('click', async function () {
            const taskId = this.getAttribute('data-id'); // Obtener ID del botón
            try {
                // Solicitud al backend para obtener la tarea
                const response = await fetch(`${baseUrl}/task/${taskId}`);
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }

                const task = await response.json(); // Convertir respuesta en JSON
                // console.log('Datos recibidos:', task);

                // Actualizar el contenido del modal
                document.getElementById('modal-title').innerText = task.title || "Sin título";
                document.getElementById('modal-description').innerText = task.content || "Sin descripción";
                document.getElementById('modal-status').innerText = task.status || "Sin estado";
                document.getElementById('modal-date').innerText = task.created_at
                    ? new Date(task.created_at).toLocaleDateString()
                    : "Sin fecha";

                // Mostrar el modal
                const modal = document.getElementById('modal-task');
                modal.classList.add('modal-show-active');

            } catch (error) {
                console.error('Error al cargar la tarea:', error);
                alert('No se pudo cargar la información de la tarea. Verifica la conexión o la configuración.');
            }
        });
    });

    // Cerrar el modal al hacer clic en el botón de cerrar
    document.querySelector('#modal-task .close').addEventListener('click', function () {
        document.getElementById('modal-task').classList.remove('modal-show-active');
    });
});
