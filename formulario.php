<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Evaluación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de Evaluación de Desempeño</h1>
        <form id="evaluation-form">
            <h2>Este formulario contendra los resultados finales de desempeño</h2>
            <!-- Productividad -->
            <div class="form-group">
                <h2>Productividad</h2>
                <label for="productividad1">Número de inspecciones realizadas:</label>
                <input type="number" id="productividad1" class="rating-input" min="1" max="10">

                <label for="productividad2">Número de suspensiones realizadas:</label>
                <input type="number" id="productividad2" class="rating-input" min="1" max="10">
                
                <p id="productividad-average">Promedio: 0</p>
            </div>

            <!-- Calidad -->
            <div class="form-group">
                <h2>Calidad</h2>
                <label for="calidad1">Evidencias de registros fotográficos:</label>
                <input type="number" id="calidad1" class="rating-input" min="1" max="10">

                <label for="calidad2">Resultados de supervisiones:</label>
                <input type="number" id="calidad2" class="rating-input" min="1" max="10">
                
                <label for="calidad3">Ausencia de apelaciones y quejas:</label>
                <input type="number" id="calidad3" class="rating-input" min="1" max="10">
                
                <p id="calidad-average">Promedio: 0</p>
            </div>

            <!-- Procesos disciplinarios -->
            <div class="form-group">
                <h2>Procesos disciplinarios</h2>
                <label for="disciplinarios1">0 Descargos:</label>
                <input type="number" id="disciplinarios1" class="rating-input" min="1" max="10">

                <label for="disciplinarios2">Cuidado de herramientas y equipos de medición:</label>
                <input type="number" id="disciplinarios2" class="rating-input" min="1" max="10">
                
                <p id="disciplinarios-average">Promedio: 0</p>
            </div>

            <!-- Puntualidad -->
            <div class="form-group">
                <h2>Puntualidad en inicios de jornada</h2>
                <label for="puntualidad1">Puntualidad:</label>
                <input type="number" id="puntualidad1" class="rating-input" min="1" max="10">
                
                <p id="puntualidad-average">Promedio: 0</p>
            </div>

            <!-- Servicio al cliente -->
            <div class="form-group">
                <h2>Servicio al cliente</h2>
                <label for="servicio1">Encuestas satisfactorias:</label>
                <input type="number" id="servicio1" class="rating-input" min="1" max="10">

                <label for="servicio2">Número de quejas:</label>
                <input type="number" id="servicio2" class="rating-input" min="1" max="10">
                
                <p id="servicio-average">Promedio: 0</p>
            </div>

            <!-- Calidad de inspecciones -->
            <div class="form-group">
                <h2>Calidad de inspecciones</h2>
                <label for="calidad_inspecciones1">Calidad de inspecciones:</label>
                <input type="number" id="calidad_inspecciones1" class="rating-input" min="1" max="10">

                <p id="calidad_inspecciones-average">Promedio: 0</p>
            </div>

            <!-- Interacción con miembros -->
            <div class="form-group">
                <h2>Interacción con los procesos</h2>
                <label for="interaccion1">Comunicación asertiva:</label>
                <input type="number" id="interaccion1" class="rating-input" min="1" max="10">
                
                <p id="interaccion-average">Promedio: 0</p>
            </div>

            <!-- Resultado General -->
            <div class="form-group">
                <h2>Resultado General</h2>
                <p id="general-average">Promedio General: 0</p>
            </div>

            <div class="form-group">
                <button type="button" onclick="calculateAverages()">Calcular Promedios</button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
