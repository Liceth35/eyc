<?php
require_once 'conexion.php';

$pdo = new PDODB();
$pdo->conectar();

$query = "SELECT id, municipio, fecha, hora_inicio, hora_fin, disponible FROM disponibilidad";
$resultado = $pdo->consulta($query);

$disponibilidades = array();

foreach ($resultado as $fila) {
    $disponibilidades[] = array(
        'municipio' => $fila['municipio'],
        'fecha' => $fila['fecha'],
        'horario' => $fila['hora_inicio'] . ' - ' . $fila['hora_fin'],
        'disponible' => $fila['disponible']
    );
}

$pdo->close();

header('Content-Type: application/json');
echo json_encode($disponibilidades);
?>
