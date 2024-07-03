<?php
include './conexion.php';
$db = new PDODB();
$db->conectar();

$departamento_id = $_GET['departamento_id'];
$query = "SELECT * FROM municipios WHERE departamento_id = :departamento_id";
$params = array(':departamento_id' => $departamento_id);
$municipios = $db->consulta($query, $params);
echo json_encode($municipios);
$db->close();
?>
