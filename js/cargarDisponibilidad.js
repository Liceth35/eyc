document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('subirArchivo').addEventListener('click', function() {
        let boton = document.getElementById('subirArchivo');
        let form = document.getElementById('cargarDisponibilidadform');
        let formData = new FormData(form);

        // Cambiar texto del botón y deshabilitarlo
        boton.textContent = 'Espere por favor...';
        boton.disabled = true;

        fetch('./insertDisponibilidad.php', {
            method: 'POST',
            body: formData
        })
        .then(respuesta => {
            if (!respuesta.ok) {
                throw new Error('Algo salió mal: ' + respuesta.statusText);
            }
            return respuesta.json();
        })
        .then(data => {
            if (data.estado === 'success') {
                Swal.fire({
                    title: 'Agenda Cargada correctamente',
                    text: ' ' + data.mensaje,
                    icon: 'success',
                    confirmButtonText: 'De acuerdo'
                });
            } else {
                Swal.fire({
                    title: 'Algo salió mal',
                    text: 'Algo salió mal: ' + data.mensaje,
                    icon: 'error',
                    confirmButtonText: 'Volver a intentarlo'
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Algo salió mal',
                text: 'Algo salió mal: ' + error,
                icon: 'error',
                confirmButtonText: 'Volver a intentarlo'
            });
        })
        .finally(() => {
            // Restablecer el botón después del proceso
            boton.textContent = 'Enviar';
            boton.disabled = false;
        });
    });
});
