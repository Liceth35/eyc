<?php
include_once 'conexion.php';

if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];

    $pdo = new PDODB();
    $pdo->conectar();

    $query = "SELECT hora_inicio, hora_fin FROM disponibilidad WHERE fecha = ? AND disponible = 1";
    $horarios = $pdo->consulta($query, [$fecha]);

    $horas = array();

    if ($horarios) {
        foreach ($horarios as $horario) {
            $horas[] = $horario['hora_inicio'];
            $horas[] = $horario['hora_fin'];
        }
    }

    $pdo->close();

    header('Content-Type: application/json');
    echo json_encode(array('disponible' => !empty($horas), 'horas' => $horas));
} else {
    http_response_code(400);
    echo json_encode(array('error' => 'Fecha no proporcionada'));
}
?>
