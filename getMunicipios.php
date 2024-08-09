<?php
header('Content-Type: application/json');

include_once './controlador/conexion.php';

try {
    // Crear instancia de la clase PDODB y conectar
    $pdo = new PDODB();
    $pdo->conectar();

    // Consulta para obtener municipios
    $sql = "SELECT id, nombre FROM municipios";
    
    // Ejecutar la consulta y obtener los resultados
    $resultados = $pdo->getData($sql);

    // Verificar si se obtienen resultados
    if ($resultados === false) {
        throw new Exception('No se encontraron municipios');
    }
    
    // Preparar los municipios para enviar como JSON
    $municipios = [];
    foreach ($resultados as $row) {
        $municipios[] = $row;
    }

    // Cerrar la conexión
    $pdo->close();

    // Enviar los municipios en formato JSON
    echo json_encode(['municipios' => $municipios]);

} catch (Exception $e) {
    // Manejo de errores
    echo json_encode(['error' => $e->getMessage()]);
}
?>
