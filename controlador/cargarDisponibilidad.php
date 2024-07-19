<?php
include_once 'conexion.php';

$pdo = new PDODB();
$pdo->conectar();

// Obtener municipio de la solicitud
$municipio = isset($_GET['municipio']) ? $_GET['municipio'] : '';

$query = "SELECT * FROM disponibilidad WHERE disponible = 1";
$params = array();

if ($municipio) {
    $query .= " AND municipio = ?";
    $params[] = $municipio;
}

$disponibilidad = $pdo->consulta($query, $params);

$events = array();

if ($disponibilidad) {
    foreach ($disponibilidad as $slot) {
        $events[] = array(
            'id' => $slot['id'],
            'title' => 'Disponible',
            'start' => $slot['fecha'] . 'T' . $slot['hora_inicio'],
            'end' => $slot['fecha'] . 'T' . $slot['hora_fin']
        );
    }
}

$pdo->close();

header('Content-Type: application/json');
echo json_encode($events);
?>
