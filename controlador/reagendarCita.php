<?php
include_once 'conexion.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'], $data['fecha'], $data['hora_inicio'], $data['hora_fin'])) {
    $id = $data['id'];
    $fecha = $data['fecha'];
    $hora_inicio = $data['hora_inicio'];
    $hora_fin = $data['hora_fin'];

    $pdo = new PDODB();
    $pdo->conectar();

    $query = "UPDATE citas SET fecha = ?, horario = ? WHERE id = ?";
    $horario = $hora_inicio . ' - ' . $hora_fin;
    $params = [$fecha, $horario, $id];

    $result = $pdo->ejecutar($query, $params);

    if ($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Error al actualizar la cita.'));
    }

    $pdo->close();
} else {
    http_response_code(400);
    echo json_encode(array('error' => 'Datos incompletos'));
}
?>
