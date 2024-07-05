<?php
// Verificar si se recibieron los parámetros id, fecha y hora
if (!isset($_POST['id']) || !isset($_POST['fecha']) || !isset($_POST['hora'])) {
    die("No se proporcionaron todos los datos necesarios.");
}

$cita_id = $_POST['id'];
$nueva_fecha = $_POST['fecha'];
$nueva_hora = $_POST['hora'];

include_once './conexion.php';
$db = new PDODB();
$db->conectar();

// Construir y ejecutar la consulta SQL para reagendar la cita
$sql = "UPDATE citas SET fecha = :fecha, hora = :hora WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $cita_id, PDO::PARAM_INT);
$stmt->bindParam(':fecha', $nueva_fecha, PDO::PARAM_STR);
$stmt->bindParam(':hora', $nueva_hora, PDO::PARAM_STR);

$resultado = $stmt->execute();

if ($resultado) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se pudo reagendar la cita']);
}

$db->close();
?>
