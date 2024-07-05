<?php
// Archivo: controlador/administrarDisponibilidad.php
require_once './conexion.php';

// Función para guardar los cambios de disponibilidad en la base de datos
function guardarCambiosDisponibilidad($data) {
    $db = new PDODB();
    $db->conectar();

    // Limpiamos la tabla antes de insertar nuevos registros
    $queryLimpiar = "TRUNCATE TABLE disponibilidad";
    $db->consulta($queryLimpiar);

    // Preparamos la consulta para insertar los nuevos datos
    $queryInsertar = "INSERT INTO disponibilidad (dia_semana, manana, tarde) VALUES (?, ?, ?)";
    $stmt = $db->prepare($queryInsertar);

    foreach ($data as $disponibilidad) {
        $stmt->execute([$disponibilidad['dia_semana'], $disponibilidad['manana'], $disponibilidad['tarde']]);
    }

    $db->close();

    return true; // Indicamos éxito en la operación
}

// Manejo de la solicitud POST para guardar cambios de disponibilidad
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!empty($data)) {
        if (guardarCambiosDisponibilidad($data)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al guardar la disponibilidad']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos no recibidos']);
    }
    exit;
}

// Si la solicitud no es POST, respondemos con un mensaje de error
echo json_encode(['success' => false, 'message' => 'Solicitud inválida']);
?>
