function cargarMunicipios(departamentoId) {
    fetch(`controlador/cargarMunicipios.php?departamento_id=${departamentoId}`)
        .then(response => response.json())
        .then(data => {
            const municipioSelect = document.getElementById('municipio');
            municipioSelect.innerHTML = '<option value="">Selecciona un municipio</option>';
            data.forEach(municipio => {
                municipioSelect.innerHTML += `<option value="${municipio.id}">${municipio.nombre}</option>`;
            });
        });
}

function cargarDisponibilidad(municipioId) {
    fetch(`controlador/cargarDisponibilidad.php?municipio_id=${municipioId}`)
        .then(response => response.json())
        .then(data => {
            const events = data.map(d => ({ title: 'Disponible', start: d.fecha, allDay: true }));
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', events);
        });
}

document.addEventListener('DOMContentLoaded', function() {
    $('#calendar').fullCalendar();
});

function goToStep(step) {
    document.querySelectorAll('.step, .step-content').forEach(element => {
        element.classList.remove('active');
    });
    document.querySelector(`.step[data-step="${step}"]`).classList.add('active');
    document.getElementById(`step${step}`).classList.add('active');
}
