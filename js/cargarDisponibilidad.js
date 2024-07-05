// cargarDisponibilidad.js
document.addEventListener('DOMContentLoaded', function() {
    cargarDisponibilidadInicial();
});

function cargarDisponibilidadInicial() {
    fetch('controlador/cargarDisponibilidad.php')
        .then(response => response.json())
        .then(data => {
            // Lógica para cargar la disponibilidad inicial
        });
}
