<?php
header('Content-Type: application/json');
include_once './controlador/conexion.php';

try {
    $pdo = new PDODB();
    $pdo->conectar();

    // Obtener el ID del departamento desde el parámetro GET
    $citaId = isset($_POST['id']) ? intval($_POST['id']) : 0;

    // Consulta para eliminar la cita
    $sql = "DELETE FROM citas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $citaId, PDO::PARAM_INT);
    $stmt->execute();

    // Verificar si se eliminó la cita
    if ($stmt->rowCount() > 0) {
        $response = ['status' => 'success', 'id' => $citaId];
    } else {
        $response = ['status' => 'error', 'message' => 'No se eliminó la cita ' . $citaId];
    }

    echo json_encode($response);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    $pdo->close();
}
?>
