<?php
// Incluir el archivo de conexión a la base de datos
require_once './conexion.php';

// Verificar que se reciba una solicitud POST con datos JSON
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST)) {
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

// Preparar la consulta SQL para insertar disponibilidad
$query = "INSERT INTO disponibilidad (municipio, fecha, horario) 
          VALUES (:municipio, :fecha, :rango_horario)";

$stmt = $db->getConexion()->prepare($query);

// Asignar parámetros y ejecutar la consulta
$stmt->bindParam(':municipio', $data['municipio']);
$stmt->bindParam(':fecha', $data['fecha']);
$stmt->bindParam(':rango_horario', $data['rango_horario']);

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
