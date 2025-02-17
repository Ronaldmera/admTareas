$(document).ready(function() {
    // Asegúrate de que los formularios tengan la clase "formularioEliminar"
    $('.formularioEliminar').submit(function(e) {
        e.preventDefault();  // Prevenimos el envío inmediato del formulario

        // Mostrar el modal de confirmación
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡Esta acción no puede revertirse!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminarlo"
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, enviamos el formulario
                this.submit(); // Esto envía el formulario
            }
        });
    });
});
