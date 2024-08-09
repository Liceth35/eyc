<?php
header('Content-Type: application/json');

include_once './controlador/conexion.php';

// Obtener parámetros de la solicitud
$dia = isset($_GET['dia']) ? (int)$_GET['dia'] : 0;
$mes = isset($_GET['mes']) ? (int)$_GET['mes'] : 0;
$municipio = isset($_GET['municipio']) ? (int)$_GET['municipio'] : 0;

try {
    // Crear instancia de la clase PDODB y conectar
    $pdo = new PDODB();
    $pdo->conectar();

    // Consulta para obtener franjas horarias
    $sql = "SELECT hora_inicio AS inicio, hora_fin AS fin 
            FROM franjas_horarias 
            WHERE dia = :dia AND mes = :mes AND municipio_id = :municipio";
    
    // Ejecutar la consulta y obtener los resultados
    $params = [
        ':dia' => $dia,
        ':mes' => $mes,
        ':municipio' => $municipio
    ];
    $resultados = $pdo->consulta($sql, $params);

    // Preparar las franjas para enviar como JSON
    $franjas = [];
    foreach ($resultados as $row) {
        $franjas[] = $row;
    }

    // Cerrar la conexión
    $pdo->close();

    // Enviar las franjas horarias en formato JSON
    echo json_encode(['franjas' => $franjas]);

} catch (Exception $e) {
    // Manejo de errores
    echo json_encode(['error' => $e->getMessage()]);
}
?>
