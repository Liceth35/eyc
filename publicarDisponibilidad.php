<?php
include './controlador/conexion.php';
$pdo = new PDODB();
$pdo->conectar();

$data = json_decode(file_get_contents("php://input"), true);
$departamento_id = $data['departamento_id'];
$municipio_id = $data['municipio_id'];
$fecha = $data['fecha'];
$horario = $data['horario'];
$disponible = $data['disponible'];

$query = "INSERT INTO disponibilidad (departamento_id, municipio_id, fecha, horario, disponible) VALUES (?, ?, ?, ?, ?)
          ON DUPLICATE KEY UPDATE disponible = ?";
$result = $pdo->consulta($query, array($departamento_id, $municipio_id, $fecha, $horario, $disponible, $disponible));

echo json_encode(['success' => $result]);
?>
