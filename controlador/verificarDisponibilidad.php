<?php
// Incluir el archivo de conexión a la base de datos
require_once './conexion.php';

// Verificar que se reciba una solicitud POST con datos JSON
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(400);
    echo json_encode(['error' => 'Solicitud incorrecta']);
    exit;
}

// Decodificar datos JSON recibidos
$data = json_decode(file_get_contents('php://input'), true);

// Verificar que los datos requeridos estén presentes y no estén vacíos
if (!$data || empty($data['id']) || empty($data['fecha']) || empty($data['hora_inicio']) || empty($data['hora_fin'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Datos incompletos']);
    exit;
}

// Instanciar la clase de conexión a la base de datos
$db = new PDODB();
$db->conectar();

// Actualizar la cita en la base de datos
$query = "UPDATE citas SET fecha = :fecha, hora_inicio = :hora_inicio, hora_fin = :hora_fin 
        WHERE id = :id";

$stmt = $db->getConexion()->prepare($query);

// Asignar parámetros y ejecutar la consulta
$stmt->bindParam(':fecha', $data['fecha']);
$stmt->bindParam(':hora_inicio', $data['hora_inicio']);
$stmt->bindParam(':hora_fin', $data['hora_fin']);
$stmt->bindParam(':id', $data['id']);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Error al reagendar la cita']);
}

// Cerrar la conexión a la base de datos
$db->close();
?>
