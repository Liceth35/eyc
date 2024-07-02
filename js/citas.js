document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        dateClick: function(info) {
            alert('Clicked on: ' + info.dateStr);
            // Handle the date click event to proceed with time selection
        }
    });
    calendar.render();

    document.querySelectorAll('.next-btn').forEach(button => {
        button.addEventListener('click', () => {
            const nextStep = button.getAttribute('data-next-step');
            updateStep(nextStep);
        });
    });

    document.querySelectorAll('.prev-btn').forEach(button => {
        button.addEventListener('click', () => {
            const prevStep = button.getAttribute('data-prev-step');
            updateStep(prevStep);
        });
    });

    function updateStep(step) {
        document.querySelectorAll('.step-content').forEach(content => {
            content.classList.remove('active');
            if (content.getAttribute('data-step') === step) {
                content.classList.add('active');
            }
        });

        document.querySelectorAll('.step').forEach(stepElem => {
            stepElem.classList.remove('active');
            if (stepElem.getAttribute('data-step') === step) {
                stepElem.classList.add('active');
            }
        });
    }
});

function cargarMunicipios(departamentoId) {
    // Load municipalities based on selected department
    // For now, we'll just log the department ID
    console.log('Selected department:', departamentoId);
}

function cargarDisponibilidad(municipioId) {
    // Load availability based on selected municipality
    // For now, we'll just log the municipality ID
    console.log('Selected municipality:', municipioId);
}
