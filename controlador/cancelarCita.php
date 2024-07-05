<?php
// Verificar si se recibió el parámetro id
if (!isset($_GET['id'])) {
    die("No se proporcionó el ID de la cita.");
}

$cita_id = $_GET['id'];

include_once './conexion.php';
$db = new PDODB();
$db->conectar();

// Construir y ejecutar la consulta SQL para cancelar la cita
$sql = "DELETE FROM citas WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $cita_id, PDO::PARAM_INT);

$resultado = $stmt->execute();

if ($resultado) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se pudo cancelar la cita']);
}

$db->close();
?>
