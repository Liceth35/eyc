<?php
include './controlador/conexion.php';
$pdo = new PDODB();
$pdo->conectar();

$data = json_decode(file_get_contents("php://input"), true);
$cita_id = $data['cita_id'];
$nueva_fecha = $data['nueva_fecha'];
$nueva_hora = $data['nueva_hora'];

$query = "UPDATE citas SET fecha = ?, horario = ? WHERE id = ?";
$result = $pdo->consulta($query, array($nueva_fecha, $nueva_hora, $cita_id));

echo json_encode(['success' => $result]);
?>
