<?php
header('Content-Type: application/json');

$municipio = $_GET['municipio'];

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'eyc_proyecto_pagina');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT dia FROM calendario WHERE municipio_id = ? AND mes = MONTH(CURRENT_DATE())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $municipio);
$stmt->execute();
$result = $stmt->get_result();

$dias = [];
while ($row = $result->fetch_assoc()) {
    $dias[] = $row['dia'];
}

$stmt->close();
$conn->close();

echo json_encode(['dias' => $dias]);
?>
