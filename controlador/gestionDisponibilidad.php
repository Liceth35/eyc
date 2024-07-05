<?php
include_once './conexion.php';

$db = new PDODB();
$db->conectar();

// Función para guardar disponibilidad
function guardarDisponibilidad($disponibilidad) {
    global $db;
    // Borrar la disponibilidad actual (ejemplo)
    $sqlDelete = "DELETE FROM disponibilidad";
    $db->ejecutarInstruccion($sqlDelete);
    
    // Insertar nueva disponibilidad
    foreach ($disponibilidad as $fecha) {
        $sqlInsert = "INSERT INTO disponibilidad (fecha) VALUES (:fecha)";
        $stmt = $db->prepare($sqlInsert);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->execute();
    }
}
?>
