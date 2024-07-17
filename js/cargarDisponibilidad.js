fetch(`../controlador/verificarDisponibilidad.php?fecha=${nueva_fecha}&hora_inicio=${nueva_hora_inicio}&hora_fin=${nueva_hora_fin}`)
    .then(response => response.json())
    .then(data => {
        console.log(data); // Depuración: Verificar la respuesta del servidor
        if (data.disponible === true) {
            if (confirm(`¿Está seguro de que desea reagendar la cita para el ${nueva_fecha} de ${nueva_hora_inicio} a ${nueva_hora_fin}?`)) {
                fetch('../controlador/reagendarCita.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id: id, fecha: nueva_fecha, hora_inicio: nueva_hora_inicio, hora_fin: nueva_hora_fin })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('Cita reagendada exitosamente.');
                        location.reload();
                    } else {
                        alert(data.message || 'Error al reagendar la cita.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un error al procesar la solicitud.');
                });
            }
        } else {
            alert('La fecha y hora seleccionadas no están disponibles. Por favor elija otra.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Hubo un error al verificar la disponibilidad.');
    });
