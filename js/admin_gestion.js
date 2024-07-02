function cargarMunicipiosAdmin(departamentoId) {
    fetch(`cargarMunicipios.php?departamento_id=${departamentoId}`)
        .then(response => response.json())
        .then(data => {
            const municipioSelect = document.getElementById('municipio-admin');
            municipioSelect.innerHTML = '<option value="">Selecciona un municipio</option>';
            data.forEach(municipio => {
                municipioSelect.innerHTML += `<option value="${municipio.id}">${municipio.nombre}</option>`;
            });
        });
}

function publicarDisponibilidad() {
    const departamentoId = document.getElementById('departamento-admin').value;
    const municipioId = document.getElementById('municipio-admin').value;
    const fecha = document.getElementById('fecha').value;
    const horario = document.getElementById('horario-admin').value;
    const disponible = document.getElementById('disponible').value;

    fetch('publicarDisponibilidad.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ departamento_id: departamentoId, municipio_id: municipioId, fecha, horario, disponible })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Disponibilidad publicada exitosamente');
        } else {
            alert('Error al publicar disponibilidad');
        }
    });
}

function reagendarCita() {
    const citaId = document.getElementById('cita-id').value;
    const nuevaFecha = document.getElementById('nueva-fecha').value;
    const nuevaHora = document.getElementById('nueva-hora').value;

    fetch('reagendarCita.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ cita_id: citaId, nueva_fecha: nuevaFecha, nueva_hora: nuevaHora })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Cita reagendada exitosamente');
        } else {
            alert('Error al reagendar cita');
        }
    });
}

fetch('cargarDepartamentos.php')
    .then(response => response.json())
    .then(data => {
        const departamentoSelect = document.getElementById('departamento-admin');
        data.forEach(departamento => {
            departamentoSelect.innerHTML += `<option value="${departamento.id}">${departamento.nombre}</option>`;
        });
    });
