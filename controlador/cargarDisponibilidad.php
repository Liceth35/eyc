<?php
// Incluir archivo de conexión a la base de datos
require_once './conexion.php';

// Instanciar la clase de conexión a la base de datos
$db = new PDODB();
$db->conectar();

// Consultar disponibilidad desde la base de datos
$query = "SELECT municipio, fecha, hora_inicio, hora_fin, disponible FROM disponibilidad";
$stmt = $db->getConexion()->query($query);

// Verificar si se obtuvieron resultados
if ($stmt) {
    // Obtener resultados como un array asociativo
    $disponibilidades = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Crear array de eventos para el calendario
    $eventos = [];
    foreach ($disponibilidades as $disponibilidad) {
        $eventos[] = [
            'municipio' => $disponibilidad['municipio'],
            'fecha' => $disponibilidad['fecha'],
            'horario' => substr($disponibilidad['hora_inicio'], 0, 5) . ' - ' . substr($disponibilidad['hora_fin'], 0, 5),
            'disponible' => $disponibilidad['disponible']
        ];
    }

    // Devolver eventos como JSON
    echo json_encode($eventos);
} else {
    // Error al ejecutar la consulta
    http_response_code(500);
    echo json_encode(['error' => 'Error al cargar disponibilidad']);
}

// Cerrar la conexión a la base de datos
$db->close();
?>
