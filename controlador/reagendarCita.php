<?php
require_once './conexion.php';

// Obtener los datos de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Verificar que los datos necesarios estén presentes
if (!isset($data['id'], $data['fecha'], $data['hora_inicio'], $data['hora_fin'])) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Datos incompletos']);
    exit;
}

$id = $data['id'];
$fecha = $data['fecha'];
$hora_inicio = $data['hora_inicio'];
$hora_fin = $data['hora_fin'];

// Instanciar la clase de conexión a la base de datos
$db = new PDODB();
$db->conectar();

// Verificar si el nuevo horario está disponible
$query = "SELECT COUNT(*) FROM disponibilidad WHERE fecha = :fecha AND hora_inicio = :hora_inicio AND hora_fin = :hora_fin AND disponible = 1";
$stmt = $db->getConexion()->prepare($query);
$stmt->bindParam(':fecha', $fecha);
$stmt->bindParam(':hora_inicio', $hora_inicio);
$stmt->bindParam(':hora_fin', $hora_fin);
$stmt->execute();
$disponible = $stmt->fetchColumn();

if ($disponible) {
    // Actualizar la cita
    $query = "UPDATE citas SET fecha = :fecha, hora_inicio = :hora_inicio, hora_fin = :hora_fin WHERE id = :id";
    $stmt = $db->getConexion()->prepare($query);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':hora_inicio', $hora_inicio);
    $stmt->bindParam(':hora_fin', $hora_fin);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'La fecha y hora seleccionadas no están disponibles']);
}

// Cerrar la conexión a la base de datos
$db->close();
?>
