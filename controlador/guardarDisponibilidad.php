<?php
// guardarDisponibilidad.php

header('Content-Type: application/json');

// Verificar que se reciba una solicitud POST con datos JSON
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST)) {
    http_response_code(400);
    echo json_encode(['error' => 'Solicitud incorrecta']);
    exit;
}

// Decodificar datos JSON recibidos
$data = json_decode(file_get_contents('php://input'), true);

if (!$data || !isset($data['municipio'], $data['fecha'], $data['rango_horario'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Datos incompletos']);
    exit;
}

require_once './conexion.php';

$db = new PDODB();
$db->conectar();

// Preparar la consulta para insertar datos de disponibilidad
$query = "INSERT INTO disponibilidad (municipio, fecha, horario, disponible) 
          VALUES (:municipio, :fecha, :horario, 'Disponible')";

$stmt = $db->getConexion()->prepare($query);

// Asignar parámetros y ejecutar la consulta
$stmt->bindParam(':municipio', $data['municipio']);
$stmt->bindParam(':fecha', $data['fecha']);
$stmt->bindParam(':horario', $data['rango_horario']);

$resultado = $stmt->execute();

if ($resultado) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Error al guardar la disponibilidad']);
}

$db->close();
?>
