<?php
require_once './conexion.php';

// Verificar que se reciba una solicitud GET con la fecha
if ($_SERVER['REQUEST_METHOD'] !== 'GET' || !isset($_GET['fecha'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Solicitud incorrecta']);
    exit;
}

$fecha = $_GET['fecha'];

// Instanciar la clase de conexión a la base de datos
$db = new PDODB();
$db->conectar();

// Consultar disponibilidad desde la base de datos
$query = "SELECT hora_inicio, hora_fin FROM disponibilidad 
        WHERE fecha = :fecha AND disponible = 1 
        ORDER BY hora_inicio ASC";

$stmt = $db->getConexion()->prepare($query);

// Asignar parámetros y ejecutar la consulta
$stmt->bindParam(':fecha', $fecha);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verificar el resultado de la consulta
if ($resultado) {
    $horas = [];
    foreach ($resultado as $row) {
        if (!in_array($row['hora_inicio'], $horas)) {
            $horas[] = $row['hora_inicio'];
        }
        if (!in_array($row['hora_fin'], $horas)) {
            $horas[] = $row['hora_fin'];
        }
    }
    sort($horas); // Ordenar horas
    echo json_encode(['disponible' => true, 'horas' => $horas]);
} else {
    echo json_encode(['disponible' => false]);
}

// Cerrar la conexión a la base de datos
$db->close();
?>
