<?php
require_once './conexion.php';

try {
    $conexion = new PDODB();
    $conexion->conectar();

    $instruccionSql = "SELECT * FROM contactos";
    $resultados = $conexion->consulta($instruccionSql);

    if ($resultados === false) {
        throw new Exception('Error al ejecutar la consulta.');
    }

    header('Content-Type: application/json');
    echo json_encode($resultados);
} catch (Exception $e) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $e->getMessage()]);
}
?>
