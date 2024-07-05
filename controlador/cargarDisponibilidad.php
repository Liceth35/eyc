<?php
// cargarDisponibilidad.php

require_once './conexion.php';

$db = new PDODB();
$db->conectar();

$query = "SELECT id, municipio, fecha, horario, disponible FROM disponibilidad";
$resultados = $db->consulta($query);

$disponibilidad = $resultados ? $resultados : [];

echo json_encode($disponibilidad);

$db->close();
?>
