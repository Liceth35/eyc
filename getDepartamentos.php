<?php
header('Content-Type: application/json');
include_once './controlador/conexion.php';

try {
    $pdo = new PDODB();
    $pdo->conectar();

    // Consulta para obtener departamentos
    $sql = "SELECT id, nombre FROM departamentos";
    $resultados = $pdo->getData($sql);

    if ($resultados === false) {
        throw new Exception('No se encontraron departamentos');
    }

    echo json_encode(['departamentos' => $resultados]);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
} finally {
    $pdo->close();
}
?>
