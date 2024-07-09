document.addEventListener('DOMContentLoaded', function() {
    cargarDisponibilidad();
});

function cargarDisponibilidad() {
    fetch('controlador/cargarDisponibilidad.php')
        .then(response => response.json())
        .then(data => {
            const calendar = document.getElementById('calendar');
            calendar.innerHTML = ''; // Limpiar el calendario antes de actualizar

            data.forEach(event => {
                const eventElement = document.createElement('div');
                eventElement.className = 'event';
                eventElement.innerHTML = `
                    <div class="event-municipio">${event.municipio}</div>
                    <div class="event-fecha">${event.fecha}</div>
                    <div class="event-horario">${event.horario}</div>
                    <div class="event-disponible">${event.disponible ? 'Disponible' : 'No Disponible'}</div>
                `;
                calendar.appendChild(eventElement);
            });
        })
        .catch(error => console.error('Error al cargar disponibilidad:', error));
}
