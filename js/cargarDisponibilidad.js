$(document).ready(function() {
    // Función para cancelar una cita
    function cancelar(id) {
        if (confirm('¿Está seguro de que desea cancelar esta cita?')) {
            fetch(`./controlador/cancelarCita.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('Cita cancelada exitosamente.');
                        location.reload();
                    } else {
                        alert('Error al cancelar la cita.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un error al procesar la solicitud.');
                });
        }
    }

    // Función para reagendar una cita
    function reagendar(id) {
        $('#calendar-container').show();
        $('#calendar').fullCalendar('destroy'); // Destruir cualquier instancia anterior
        $('#calendar').fullCalendar({
            events: './controlador/cargarDisponibilidad.php', // URL de tu controlador que devuelve eventos en formato JSON
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                var nueva_fecha = moment(start).format('YYYY-MM-DD');

                $.ajax({
                    url: './controlador/obtenerHoraDisponible.php',
                    type: 'GET',
                    data: { fecha: nueva_fecha },
                    dataType: 'json',
                    success: function(data) {
                        if (data.disponible) {
                            // Limpiar el contenido del dropdown
                            $('#hora_inicio').empty();
                            $('#hora_fin').empty();

                            // Crear las opciones del dropdown
                            data.horas.forEach(hora => {
                                $('#hora_inicio').append(`<option value="${hora}">${hora}</option>`);
                                $('#hora_fin').append(`<option value="${hora}">${hora}</option>`);
                            });

                            // Mostrar el formulario para seleccionar hora
                            $('#reagendar-form').show();

                            // Manejar el envío del formulario
                            $('#submit-reagendar').off('click').on('click', function() {
                                var nueva_hora_inicio = $('#hora_inicio').val();
                                var nueva_hora_fin = $('#hora_fin').val();
                                var direccion = $('#direccion').val();
                                var numero_contrato = $('#numero_contrato').val();

                                if (nueva_hora_inicio && nueva_hora_fin && direccion && numero_contrato) {
                                    if (confirm(`¿Está seguro de que desea reagendar la cita para el ${nueva_fecha} de ${nueva_hora_inicio} a ${nueva_hora_fin}?`)) {
                                        $.ajax({
                                            url: './controlador/reagendarCita.php',
                                            type: 'POST',
                                            contentType: 'application/x-www-form-urlencoded',
                                            data: {
                                                id: id,
                                                fecha: nueva_fecha,
                                                hora_inicio: nueva_hora_inicio,
                                                hora_fin: nueva_hora_fin,
                                                direccion: direccion,
                                                numero_contrato: numero_contrato
                                            },
                                            dataType: 'json',
                                            success: function(data) {
                                                if (data.status === 'success') {
                                                    alert('Cita reagendada exitosamente.');
                                                    location.reload();
                                                } else {
                                                    alert(data.message || 'Error al reagendar la cita.');
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                console.error('Error:', error);
                                                alert('Hubo un error al procesar la solicitud.');
                                            }
                                        });
                                    }
                                } else {
                                    alert('Hora de inicio, hora de fin, dirección y número de contrato son necesarios.');
                                }
                            });
                        } else {
                            alert('No hay horas disponibles para la fecha seleccionada. Por favor elija otra.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Hubo un error al verificar la disponibilidad.');
                    }
                });

                $('#calendar').fullCalendar('unselect');
            }
        });
    }

    // Inicializar el calendario y manejar el cierre del contenedor del calendario
    $('#calendar-container').hide(); // Esconder el calendario al cargar la página
    $('#close-calendar').click(function() {
        $('#calendar-container').hide();
    });

    // Asegúrate de definir las funciones para los enlaces o botones en tu HTML
    // Por ejemplo:
    // $('a.reagendar').click(function() {
    //     var id = $(this).data('id');
    //     reagendar(id);
    // });

    // O si estás manejando eventos en el HTML directamente:
    // <a href="javascript:void(0);" onclick="reagendar(<?php echo $cita['id']; ?>)">Reagendar</a>
});
