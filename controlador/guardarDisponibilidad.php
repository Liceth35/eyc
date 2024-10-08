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
if (!$data || empty($data['municipio']) || empty($data['fecha']) || empty($data['rango_horario'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Datos incompletos']);
    exit;
}

// Instanciar la clase de conexión a la base de datos
$db = new PDODB();
$db->conectar();

// Dividir el rango horario en inicio y fin
list($hora_inicio, $hora_fin) = explode('-', $data['rango_horario']);
$hora_inicio = $hora_inicio . ':00:00';
$hora_fin = $hora_fin . ':00:00';

// Preparar la consulta SQL para insertar disponibilidad
$query = "INSERT INTO disponibilidad (municipio, fecha, hora_inicio, hora_fin, disponible) 
          VALUES (:municipio, :fecha, :hora_inicio, :hora_fin, 1)";

$stmt = $db->getConexion()->prepare($query);

// Asignar parámetros y ejecutar la consulta
$stmt->bindParam(':municipio', $data['municipio']);
$stmt->bindParam(':fecha', $data['fecha']);
$stmt->bindParam(':hora_inicio', $hora_inicio);
$stmt->bindParam(':hora_fin', $hora_fin);

$resultado = $stmt->execute();

// Verificar el resultado de la inserción
if ($resultado) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error al guardar la disponibilidad']);
}

// Cerrar la conexión a la base de datos
$db->close();
?>
