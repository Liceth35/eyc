<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de Desempeño</title>
    <link rel="stylesheet" href="./formulario.css">
</head>
<body>
    <div class="container">
        <h1>Evaluación de Desempeño</h1>
        <form id="evaluationForm" method="POST">
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

            <h2>Enviar Evaluación</h2>
            <input type="submit" value="Calcular Puntuación">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $inspections = intval($_POST['inspections']);
            $suspensions = intval($_POST['suspensions']);
            $photoEvidence = intval($_POST['photoEvidence']);
            $supervisionResults = intval($_POST['supervisionResults']);
            $complaints = intval($_POST['complaints']);

            // Calcular promedios
            $productivityAverage = ($inspections + $suspensions) / 2;
            $qualityAverage = ($photoEvidence + $supervisionResults + (10 - $complaints)) / 3;

            // Sumar promedios
            $totalScore = ($productivityAverage + $qualityAverage) / 2 * 10;

            echo "<h2>Puntuación Total: " . round($totalScore, 2) . " sobre 100</h2>";

            // Clasificación
            if ($totalScore >= 90) {
                $classification = "1er lugar";
            } elseif ($totalScore >= 80) {
                $classification = "2do lugar";
            } elseif ($totalScore >= 70) {
                $classification = "3er lugar";
            } elseif ($totalScore >= 60) {
                $classification = "4to lugar";
            } elseif ($totalScore >= 50) {
                $classification = "5to lugar";
            } elseif ($totalScore >= 40) {
                $classification = "6to lugar";
            } elseif ($totalScore >= 30) {
                $classification = "7mo lugar";
            } elseif ($totalScore >= 20) {
                $classification = "8vo lugar";
            } elseif ($totalScore >= 10) {
                $classification = "9no lugar";
            } else {
                $classification = "10mo lugar";
            }

            echo "<h2>Clasificación: " . $classification . "</h2>";
        }
        ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
