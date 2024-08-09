document.addEventListener('DOMContentLoaded', function() {
    const modalFranjas = document.getElementById('modal-franjas');
    const modalConfirmacion = document.getElementById('modal-confirmacion');
    const closeBtns = document.querySelectorAll('.close');
    const franjasHorariasDiv = document.getElementById('franjas-horarias');
    const municipioSelect = document.getElementById('municipio');
    const calendarioDiv = document.getElementById('calendario');
    const formCita = document.getElementById('form-cita');

    let selectedFranja = null;
    let selectedDia = null;
    let selectedMes = null;
    let selectedMunicipio = null;

    // Cargar municipios
    fetch('getMunicipios.php')
        .then(response => response.json())
        .then(data => {
            //console.log('Municipios cargados:', data);
            data.municipios.forEach(municipio => {
                const option = document.createElement('option');
                option.value = municipio.id;
                option.textContent = municipio.nombre;
                municipioSelect.appendChild(option);
            });
            municipioSelect.addEventListener('change', cargarCalendario);
            cargarCalendario(); // Cargar el calendario por defecto
        })
        .catch(error => console.error('Error al cargar municipios:', error));

    // Mostrar modal con franjas horarias
    calendarioDiv.addEventListener('click', function(event) {
        if (event.target.classList.contains('dia') && !event.target.classList.contains('inactivo')) {
            selectedDia = event.target.dataset.dia;
            selectedMes = event.target.dataset.mes;
            selectedMunicipio = municipioSelect.value;
            //console.log('Fecha seleccionada:', selectedDia, selectedMes, selectedMunicipio);
            cargarFranjasHorarias(selectedDia, selectedMes, selectedMunicipio);
        }
    });

    // Cerrar modales
    closeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const targetId = btn.getAttribute('data-target');
            const targetModal = document.getElementById(targetId);
            targetModal.style.display = 'none';
        });
    });

    window.addEventListener('click', function(event) {
        if (event.target === modalFranjas) {
            modalFranjas.style.display = 'none';
        }
        if (event.target === modalConfirmacion) {
            modalConfirmacion.style.display = 'none';
        }
    });

    function cargarCalendario() {
        const municipio = municipioSelect.value;
        fetch(`getCalendario.php?municipio=${municipio}`)
            .then(response => response.json())
            .then(data => {
                //console.log('Calendario cargado:', data);
                calendarioDiv.innerHTML = '';
                for (let dia = 1; dia <= 31; dia++) {
                    const diaDiv = document.createElement('div');
                    diaDiv.classList.add('dia');
                    diaDiv.dataset.dia = dia;
                    diaDiv.dataset.mes = new Date().getMonth() + 1; // Asume el mes actual
                    diaDiv.textContent = dia;

                    if (!data.dias.includes(dia)) {
                        diaDiv.classList.add('inactivo');
                        diaDiv.title = 'No hay franjas horarias disponibles';
                    }

                    calendarioDiv.appendChild(diaDiv);
                }
            })
            .catch(error => console.error('Error al cargar el calendario:', error));
    }

    function cargarFranjasHorarias(dia, mes, municipio) {
        fetch(`getFranjasHorarias.php?dia=${dia}&mes=${mes}&municipio=${municipio}`)
            .then(response => response.json())
            .then(data => {
                //console.log('Franjas horarias cargadas:', data);
                franjasHorariasDiv.innerHTML = '';
                if (data.franjas.length === 0) {
                    franjasHorariasDiv.innerHTML = '<p>No hay franjas horarias disponibles.</p>';
                } else {
                    data.franjas.forEach(franja => {
                        const p = document.createElement('p');
                        p.textContent = `${franja.inicio} - ${franja.fin}`;
                        p.classList.add('franja');
                        p.addEventListener('click', () => seleccionarFranja(franja));
                        franjasHorariasDiv.appendChild(p);
                    });
                }
                modalFranjas.style.display = 'block';
            })
            .catch(error => console.error('Error al cargar franjas horarias:', error));
    }

    function seleccionarFranja(franja) {
        selectedFranja = `${franja.inicio} - ${franja.fin}`;
        //console.log('Franja seleccionada:', selectedFranja);
        document.getElementById('franja-seleccionada').value = selectedFranja;
        document.getElementById('dia-seleccionado').value = selectedDia;
        document.getElementById('mes-seleccionado').value = selectedMes;
        document.getElementById('municipio-seleccionado').value = selectedMunicipio;

        // Cerrar el modal de franjas horarias
        modalFranjas.style.display = 'none';

        // Mostrar el modal de confirmación
        modalConfirmacion.style.display = 'block';
    }

    formCita.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(formCita);

        fetch('confirmarCita.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok && response.headers.get('content-type')?.includes('application/json')) {
                return response.json();
            } else {
                return response.text().then(text => {
                    console.log("Texto de la respuesta:", text);
                    throw new Error(`Error: ${text}`);
                });
            }
        })
        .then(data => {
            //console.log('Confirmación de cita:', data);
            if (data.success) {
                Swal.fire({
                    title: '¡Hemos agendado tu cita!',
                    html: `
                        <p><strong>Hola:</strong> ${document.getElementById('nombre').value}</p>
                        <p>Queremos confirmar tu cita</p>
                        <p><strong>Fecha:</strong> ${document.getElementById('dia-seleccionado').value} ${obtenerNombreMes(Number(document.getElementById('mes-seleccionado').value))} a las <strong>${document.getElementById('franja-seleccionada').value} </strong></p>
                    `,
                    confirmButtonText: 'OK, gracias'
                });
                modalConfirmacion.style.display = 'none';
                formCita.reset();
            } else {
                Swal.fire({
                    title: 'Error',
                    text: data.message,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        })
        .catch(error => console.error('Error al confirmar la cita:', error));
    });

    function obtenerNombreMes(numeroMes) {
        const nombresMeses = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];
        return nombresMeses[numeroMes - 1] || 'Mes inválido';
    }
});
