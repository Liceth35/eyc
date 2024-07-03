$(document).ready(function() {
    const daysInMonth = new Date(2024, 7, 0).getDate();
    const calendar = $('#calendar');
    const availableDays = [1, 2, 8, 9, 15, 16, 22, 23, 29, 30]; // Ejemplo de días disponibles

    for (let i = 1; i <= daysInMonth; i++) {
        const dayClass = availableDays.includes(i) ? 'available' : 'unavailable';
        calendar.append(`<div class="calendar-day ${dayClass}">${i}</div>`);
    }

    $('.calendar-day.available').click(function() {
        $('.calendar-day').removeClass('selected');
        $(this).addClass('selected');
    });

    $('.continue-button').click(function() {
        const selectedDay = $('.calendar-day.selected').text();
        const selectedTime = $('input[name="time"]:checked').val();

        if (selectedDay && selectedTime) {
            alert(`Cita agendada para el día ${selectedDay} de julio a las ${selectedTime}.`);
        } else {
            alert('Por favor seleccione un día y un horario.');
        }
    });
});
