$(document).ready(function() {
    cargarDisponibilidadInicial();

    $('.continue-button').click(function() {
        guardarCambios();
    });
});

function cargarDisponibilidadInicial() {
    fetch('controlador/cargarDisponibilidad.php')
        .then(response => response.json())
        .then(data => {
            const calendar = $('#calendar');
            data.forEach(d => {
                const dayClass = d.disponible ? 'available' : 'unavailable';
                calendar.append(`<div class="calendar-day ${dayClass}">${d.dia}</div>`);
            });

            $('.calendar-day.available').click(function() {
                $('.calendar-day').removeClass('selected');
                $(this).addClass('selected');
            });
        });
}

function guardarCambios() {
    const disponibilidad = [];
    $('.calendar-day.available').each(function() {
        disponibilidad.push($(this).text());
    });

    fetch('controlador/guardarDisponibilidad.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(disponibilidad)
    }).then(response => response.json()).then(data => {
        if (data.status === 'success') {
            alert('Disponibilidad guardada con éxito.');
        } else {
            alert('Error al guardar la disponibilidad.');
        }
    });
}
