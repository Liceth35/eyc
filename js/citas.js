// citas.js
document.addEventListener('DOMContentLoaded', function() {
    cargarCitas();
});

function cargarCitas() {
    fetch('controlador/cargarCitas.php')
        .then(response => response.json())
        .then(data => {
            // Lógica para cargar las citas en la interfaz
        });
}

function cancelar(id) {
    fetch(`controlador/cancelarCita.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                cargarCitas();
            }
        });
}

function reagendar(id) {
    const nuevaFecha = prompt('Ingrese la nueva fecha (YYYY-MM-DD):');
    const nuevaHora = prompt('Ingrese la nueva hora (HH:MM):');
    if (nuevaFecha && nuevaHora) {
        fetch('controlador/reagendarCita.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id, fecha: nuevaFecha, hora: nuevaHora })
        }).then(response => response.json()).then(data => {
            if (data.status === 'success') {
                cargarCitas();
            }
        });
    }
}
