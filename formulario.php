<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de Desempeño</title>
    <link rel="stylesheet" href="./css/formulario.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Calificar Inspectores</h1>

        <!-- Botón para agregar inspector -->
        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregarInspector">
            Agregar Inspector
        </button>

        <div class="row">
            <!-- Listado de Inspectores -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inspector 1</h5>
                        
                        <!-- Botón para calificar -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInspector1">
                            Calificar
                        </button>
                        
                        <!-- Botón para editar -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarInspector1">
                            Editar
                        </button>

                        <!-- Botón para eliminar -->
                        <form action="./controlador/controladorFormulario.php" method="GET" style="display: inline;">
                            <input type="hidden" name="eliminar_inspector" value="1">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este inspector?');">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal para Calificar Inspector 1 -->
            <div class="modal fade" id="modalInspector1" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="procesar_evaluacion.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Calificar Inspector 1</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulario de calificación -->
                                <h2>Productividad</h2>
                                <label for="inspections">Número de inspecciones realizadas (1-10):</label>
                                <input type="number" id="inspections" name="inspections" min="1" max="10" required>
                                
                                <label for="suspensions">Número de suspensiones realizadas (1-10):</label>
                                <input type="number" id="suspensions" name="suspensions" min="1" max="10" required>

                                <h2>Calidad</h2>
                                <label for="photoEvidence">Evidencias de registros fotográficos (1-10):</label>
                                <input type="number" id="photoEvidence" name="photoEvidence" min="1" max="10" required>

                                <label for="supervisionResults">Resultados de supervisiones (1-10):</label>
                                <input type="number" id="supervisionResults" name="supervisionResults" min="1" max="10" required>

                                <label for="complaints">Número de quejas:</label>
                                <select id="complaints" name="complaints" required>
                                    <option value="0">0 quejas (10 puntos)</option>
                                    <option value="1">1 queja (7 puntos)</option>
                                    <option value="2">2 quejas (5 puntos)</option>
                                    <option value="3">3 quejas (3 puntos)</option>
                                    <option value="4">4 quejas (2 puntos)</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary" value="Guardar Calificación">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal para Editar Inspector 1 -->
            <div class="modal fade" id="modalEditarInspector1" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="./controlador/controladorFormulario.php" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Editar Inspector 1</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="nombreInspector">Nombre del Inspector:</label>
                                <input type="text" id="nombreInspector" name="nombre" value="Inspector 1" required>
                                
                                <input type="hidden" name="editar_inspector" value="1">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar un nuevo inspector -->
    <div class="modal fade" id="modalAgregarInspector" tabindex="-1" aria-labelledby="modalLabelAgregar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="./controlador/controladorFormulario.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabelAgregar">Agregar Inspector</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="nombreNuevoInspector">Nombre del Inspector:</label>
                        <input type="text" id="nombreNuevoInspector" name="nombre" required>

                        <input type="hidden" name="crear_inspector" value="1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" class="btn btn-success" value="Agregar Inspector">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
