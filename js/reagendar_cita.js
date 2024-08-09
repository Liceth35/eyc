$(document).ready(function() {
    $('#form-reagendar-cita').on('submit', function(event) {
        event.preventDefault();

        // Recoger datos del formulario
        var formData = $(this).serialize();

        // Enviar solicitud AJAX
        $.ajax({
            type: 'POST',
            url: 'update_reagendar_cita.php',
            data: formData,
            success: function(response) {
                if (response.status === 'success') {
                    // Obtener valores de los campos del formulario
                    var id = $('#id').val();
                    var nombre = $('#nombre').val();
                    var dia = $('#dia-seleccionado').val();
                    var mes = $('#mes-seleccionado').val();
                    var franja = $('#franja-seleccionada').val();
                    
                    // Función para obtener el nombre del mes
                    function obtenerNombreMes(mes) {
                        var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                        return meses[mes - 1];
                    }
                    
                    // Mostrar el mensaje de confirmación
                    Swal.fire({
                        title: '¡Cita reagendada!',
                        html: `
                            <p><strong>N° Cita:</strong> ${id}</p>
                            <p><strong>Nombre:</strong> ${nombre}</p>
                            <p>Queremos confirmar tu cita</p>
                            <p><strong>Fecha:</strong> ${dia} ${obtenerNombreMes(Number(mes))} a las <strong>${franja}</strong></p>
                        `,
                        confirmButtonText: 'OK, gracias'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir a admin_gestion.php después de hacer clic en OK, gracias
                            window.location.href = 'admin_gestion.php';
                        }
                    });

                    // Ocultar el modal y resetear el formulario
                    $('#modal-confirmacion').hide();
                    $('#form-reagendar-cita')[0].reset();
                } else {
                    // Manejar errores
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema al reagendar la cita.',
                        icon: 'error'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Manejar errores de la solicitud
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al reagendar la cita.',
                    icon: 'error'
                });
            }
        });
    });
});
