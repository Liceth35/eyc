<?php
// cargarDisponibilidad.php

require_once './conexion.php';

$db = new PDODB();
$db->conectar();

$query = "SELECT id, municipio, fecha, horario, disponible FROM disponibilidad";
$result = $db->consulta($query);

$disponibilidad = [];

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $disponibilidad[] = $row;
}

echo json_encode($disponibilidad);

$db->close();
?>
