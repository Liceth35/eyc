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
