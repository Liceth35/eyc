<?php
require_once './conexion.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['municipio']) && isset($data['fecha']) && isset($data['horario'])) {
    $municipio = $data['municipio'];
    $fecha = $data['fecha'];
    $horario = $data['horario'];

    $db = new PDODB();
    $db->conectar();

    $query = "INSERT INTO disponibilidad (municipio, fecha, horario) VALUES (?, ?, ?)";
    $params = [$municipio, $fecha, $horario];

    $result = $db->consulta($query, $params);

    if ($result) {
        echo json_encode(["message" => "Disponibilidad agregada correctamente."]);
    } else {
        echo json_encode(["message" => "Error al agregar la disponibilidad."]);
    }

    $db->close();
} else {
    echo json_encode(["message" => "Datos incompletos."]);
}
?>
