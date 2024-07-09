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

// Dividir el rango horario en inicio y fin
list($hora_inicio, $hora_fin) = explode('-', $data['rango_horario']);
$hora_inicio = $hora_inicio . ':00:00';
$hora_fin = $hora_fin . ':00:00';

// Instanciar la clase de conexión a la base de datos
$db = new PDODB();
$db->conectar();

// Consultar disponibilidad desde la base de datos
$query = "SELECT id FROM disponibilidad 
          WHERE municipio = :municipio 
          AND fecha = :fecha 
          AND hora_inicio = :hora_inicio 
          AND hora_fin = :hora_fin 
          AND disponible = 1";

$stmt = $db->getConexion()->prepare($query);

// Asignar parámetros y ejecutar la consulta
$stmt->bindParam(':municipio', $data['municipio']);
$stmt->bindParam(':fecha', $data['fecha']);
$stmt->bindParam(':hora_inicio', $hora_inicio);
$stmt->bindParam(':hora_fin', $hora_fin);

$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar el resultado de la consulta
if ($resultado) {
    echo json_encode(['disponible' => true]);
} else {
    echo json_encode(['disponible' => false]);
}

// Cerrar la conexión a la base de datos
$db->close();
?>
