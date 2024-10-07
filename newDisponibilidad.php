<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Calendario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- plugin select2 de jquery -->
    <!-- Incluir CSS y JS de Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <link rel="stylesheet" href="css/newDisponibilidad.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Gestión Calendario EYC </a>
            <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>

        </div>
    </nav>

    <div class="container mt-5">
        <form id="formulario">
            <div class="card mb-3">
                <div class="card-header">
                    Gestionar la disponibilidad
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Columna para Departamento -->
                        <div class="col-md-4 mb-3">
                            <label for="departamento" class="form-label">Departamento</label>
                            <select class="form-select" id="departamento">
                                <option value="">Selecciona un departamento</option>
                                <!-- Opciones dinámicas se llenarán por JavaScript -->
                            </select>
                        </div>

                        <!-- sin select2 plugin para selección multiple -->
                        <!-- Columna para Municipio -->
                        <!-- <div class="col-md-4 mb-3">
                            <label for="municipio" class="form-label">Municipio</label>
                            <select class="form-select" id="municipio" multiple="multiple" resi>
                                <option value="">Selecciona un municipio</option>
                                 Opciones dinámicas se llenarán por JavaScript
                            </select>
                        </div> -->

                        <div class="col-md-4 mb-3">
                            <label for="municipio" class="form-label">Municipio</label>
                            <select class="form-select" id="municipio">
                                <option value="">Selecciona un municipio</option>
                                <!-- Opciones dinámicas se llenarán por JavaScript -->
                            </select>
                        </div>



                        <!-- Columna para Mes -->
                        <div class="col-md-4 mb-3">
                            <label for="mes" class="form-label">Mes</label>
                            <select class="form-select" id="mes">
                                <option value="">Selecciona un mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                    </div>

                    <!-- Calendario de días -->
                    <div class="row">
                        <div class="col-md-8" id="calendario">
                            <div id="dias" class="mb-3"></div>
                        </div>

                        <!-- Franjas horarias -->
                        <div class="col-md-4 mb-3" id="agendas">
                            <label for="horas" class="form-label">Franja Horaria</label>
                            <select class="form-select" id="horas" multiple>
                                <option value="07:00-09:00">07:00 am - 09:00 am</option>
                                <option value="09:00-12:00">09:00 am - 12:00 pm</option>
                                <option value="01:00-12:00">01:00 pm - 03:00 pm</option>
                                <option value="03:00-05:00">03:00 pm - 05:00 pm</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="button" class="btn btn-success mt-3 mb-3" id="guardarBtn">
                    Guardar Cambios
                    <span class="spinner-border spinner-border-sm ms-2" id="spinner" style="display: none;"
                        role="status" aria-hidden="true"></span>
                </button>
            </div>

        </form>
    </div>

    <script src="js/newDisponibilidad.js"></script>
</body>

</html>