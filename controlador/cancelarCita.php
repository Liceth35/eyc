<?php
header('Content-Type: application/json');

// Supongamos que ya tienes la lógica para conectar a la base de datos

try {
    // Lógica para cancelar la cita
    // ...

    // Respuesta exitosa
    echo json_encode(['status' => 'success']);
} catch (Exception $e) {
    // Captura de errores
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
?>
