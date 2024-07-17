<?php
require_once './conexion.php';

// Verificar que se reciba una solicitud GET con los parámetros necesarios
if ($_SERVER['REQUEST_METHOD'] !== 'GET' || !isset($_GET['fecha']) || !isset($_GET['hora_inicio']) || !isset($_GET['hora_fin'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Solicitud incorrecta']);
    exit;
}

$fecha = $_GET['fecha'];
$hora_inicio = $_GET['hora_inicio'];
$hora_fin = $_GET['hora_fin'];

// Instanciar la clase de conexión a la base de datos
$db = new PDODB();
$db->conectar();

// Consultar disponibilidad desde la base de datos
$query = "SELECT COUNT(*) as count FROM disponibilidad 
        WHERE fecha = :fecha AND hora_inicio <= :hora_inicio AND hora_fin >= :hora_fin AND disponible = 1";

$stmt = $db->getConexion()->prepare($query);

// Asignar parámetros y ejecutar la consulta
$stmt->bindParam(':fecha', $fecha);
$stmt->bindParam(':hora_inicio', $hora_inicio);
$stmt->bindParam(':hora_fin', $hora_fin);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar el resultado de la consulta
if ($resultado['count'] > 0) {
    echo json_encode(['disponible' => true]);
} else {
    echo json_encode(['disponible' => false]);
}

// Cerrar la conexión a la base de datos
$db->close();
?>
