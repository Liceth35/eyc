<?php
include './conexion.php';
$db = new PDODB();
$db->conectar();

$query = "SELECT * FROM departamentos";
$departamentos = $db->getData($query);
echo json_encode($departamentos);
$db->close();
?>
