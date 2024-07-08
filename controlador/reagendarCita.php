<?php
header('Content-Type: application/json');

// Verificar si se recibieron los datos necesarios en la solicitud POST
$data = json_decode(file_get_contents('php://input'), true);
if (!$data || !isset($data['id']) || !isset($data['fecha']) || !isset($data['hora_inicio']) || !isset($data['hora_fin'])) {
    die(json_encode(['status' => 'error', 'message' => 'No se proporcionaron todos los datos necesarios.']));
}

$cita_id = $data['id'];
$nueva_fecha = $data['fecha'];
$nueva_hora_inicio = $data['hora_inicio'];
$nueva_hora_fin = $data['hora_fin'];

include_once './conexion.php';
$db = new PDODB();
$db->conectar();

// Verificar disponibilidad de la nueva fecha y hora en la tabla de disponibilidad
$sql_disponibilidad = "SELECT * FROM disponibilidad WHERE fecha = :fecha AND hora_inicio <= :hora_inicio AND hora_fin >= :hora_fin AND disponible = 'Disponible'";
$stmt_disponibilidad = $db->getConexion()->prepare($sql_disponibilidad);
$stmt_disponibilidad->bindParam(':fecha', $nueva_fecha, PDO::PARAM_STR);
$stmt_disponibilidad->bindParam(':hora_inicio', $nueva_hora_inicio, PDO::PARAM_STR);
$stmt_disponibilidad->bindParam(':hora_fin', $nueva_hora_fin, PDO::PARAM_STR);
$stmt_disponibilidad->execute();

if ($stmt_disponibilidad->rowCount() === 0) {
    die(json_encode(['status' => 'error', 'message' => 'La fecha y hora seleccionadas no están disponibles']));
}

// Actualizar la cita con la nueva fecha y hora
$sql_actualizar_cita = "UPDATE citas SET fecha = :fecha, horario = :hora_inicio WHERE id = :id";
$stmt_actualizar_cita = $db->getConexion()->prepare($sql_actualizar_cita);
$stmt_actualizar_cita->bindParam(':id', $cita_id, PDO::PARAM_INT);
$stmt_actualizar_cita->bindParam(':fecha', $nueva_fecha, PDO::PARAM_STR);
$stmt_actualizar_cita->bindParam(':hora_inicio', $nueva_hora_inicio, PDO::PARAM_STR);

if ($stmt_actualizar_cita->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se pudo reagendar la cita']);
}

$db->close();
?>
