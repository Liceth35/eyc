<?php
header('Content-Type: application/json');
include_once './controlador/conexion.php';

try {
    $pdo = new PDODB();
    $pdo->conectar();

    // Obtener el ID del departamento desde el parámetro GET
    $departamentoId = isset($_GET['departamento']) ? intval($_GET['departamento']) : 0;

    // Consulta para obtener municipios
    $sql = "SELECT id, nombre FROM municipios WHERE departamento_id = :departamento_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':departamento_id', $departamentoId, PDO::PARAM_INT);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($resultados === false) {
        throw new Exception('No se encontraron municipios');
    }

    echo json_encode(['municipios' => $resultados]);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    $pdo->close();
}
?>
