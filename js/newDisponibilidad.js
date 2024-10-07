$(document).ready(function () {
    // Función para cargar el calendario de días del mes
    function cargarCalendario() {
        const dias = new Array(31).fill(null).map((_, i) => i + 1);
        let calendar = '';
        dias.forEach(dia => {
            calendar += `
                <div class="col-2 col-sm-1 mb-2">
                    <div class="calendar-day" data-dia="${dia}">
                        <input class="form-check-input d-none" type="checkbox" id="dia_${dia}" name="dia" value="${dia}">
                        <label class="form-check-label" for="dia_${dia}">${dia}</label>
                    </div>
                </div>
            `;
        });
        $('#dias').html(`
            <div class="card mb-3">
                <div class="card-header">
                    Días del Mes
                </div>
                <div class="card-body text-center">
                    <button type="button" class="btn btn-primary mb-2" id="selectAllDays">Seleccionar Todos</button>
                    <button type="button" class="btn btn-danger mb-2" id="deselectAllDays">Deseleccionar Todos</button>
                    <div class="row g-2">
                        ${calendar}
                    </div>
                </div>
            </div>
        `);
    }

    // Cargar calendario al iniciar
    cargarCalendario();

    // Mostrar calendario y franjas horarias solo cuando se seleccione un mes
    $('#mes').change(function () {
        if ($(this).val() !== "") {
            $('#calendario').show();
            $('#agendas').show();
        } else {
            $('#calendario').hide();
            $('#agendas').hide();
        }
    });

    // Seleccionar/deseleccionar todos los días
    $('#dias').on('click', '#selectAllDays', function () {
        $('input[name="dia"]').prop('checked', true);
        $('.calendar-day').addClass('selected');
    });

    $('#dias').on('click', '#deselectAllDays', function () {
        $('input[name="dia"]').prop('checked', false);
        $('.calendar-day').removeClass('selected');
    });

    // Seleccionar el recuadro completo y cambiar el color
    $('#dias').on('click', '.calendar-day', function () {
        const checkbox = $(this).find('input[type="checkbox"]');
        checkbox.prop('checked', !checkbox.prop('checked'));
        $(this).toggleClass('selected');
    });

    // Guardar calendario
    $('#guardarBtn').on('click', function () {
        const diasSeleccionados = $('input[name="dia"]:checked').map(function () {
            return $(this).val();
        }).get();

        const mesSeleccionado = $('#mes').val();
        const municipioId = $('#municipio').val();
        const franjasHorarias = $('#horas').val();

        // Validar que se hayan seleccionado todos los campos necesarios
        if (municipioId === "" || mesSeleccionado === "" || diasSeleccionados.length === 0 || !franjasHorarias.length) {
            alert('Por favor, completa todos los campos antes de guardar.');
            return;
        }

        // Deshabilitar el botón y mostrar el spinner
        $('#guardarBtn').prop('disabled', true);
        $('#spinner').show();


        // Datos a enviar
        const data = {
            municipio_id: municipioId,
            mes: mesSeleccionado,
            dias: diasSeleccionados,
            franjas: franjasHorarias
        };

        // Enviar datos al servidor
        $.ajax({
            url: './cargardisponibilidadBackendNew.php', // Cambia esto a la URL de tu endpoint
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function (response) {
                alert('La agenda se asignó correctamente');
                window.location.reload();            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error al guardar los datos:', textStatus, errorThrown);
                console.error('Respuesta del servidor:', jqXHR.responseText);
                alert('Error al guardar los datos. Verifica la consola para más detalles.');
            }
        });
    });

// $(document).ready(function () {
//     // Inicializar Select2 en el campo de municipios
//     $('#municipio').select2({
//         placeholder: 'Selecciona un municipio',
//         allowClear: true
//     });

    // Función para cargar departamentos
    function cargarDepartamentos() {
        $.ajax({
            url: 'getDepartamentos.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.departamentos) {
                    $('#departamento').empty().append('<option value="">Selecciona un departamento</option>');
                    $.each(data.departamentos, function (index, departamento) {
                        $('#departamento').append(`<option value="${departamento.id}">${departamento.nombre}</option>`);
                    });
                } else {
                    alert('Error: ' + data.error);
                }
            },
            error: function () {
                alert('Error al cargar los departamentos.');
            }
        });
    }

    // Función para cargar municipios
    function cargarMunicipios(departamentoId) {
        $.ajax({
            url: 'getMunicipios.php',
            method: 'GET',
            data: { departamento: departamentoId },
            dataType: 'json',
            success: function (data) {
                if (data.municipios) {
                    $('#municipio').empty().append('<option value="">Selecciona un municipio</option>');
                    $.each(data.municipios, function (index, municipio) {
                        $('#municipio').append(`<option value="${municipio.id}">${municipio.nombre}</option>`);
                    });
                } else {
                    alert('Error: ' + data.error);
                }
            },
            error: function () {
                alert('Error al cargar los municipios.');
            }
        });
    }

    // Inicialmente cargar departamento
    cargarDepartamentos();

    // Evento cuando se cambia el departamento
    $('#departamento').change(function () {
        var departamentoId = $(this).val();
        if (departamentoId) {
            cargarMunicipios(departamentoId);
        } else {
            $('#municipio').empty().append('<option value="">Selecciona un municipio</option>');
        }
    });
});
