<?php
// Incluye el archivo de conexión a la base de datos
include_once './controlador/conexion.php'; // Asegúrate de que la ruta es correcta

// Configura el encabezado para JSON
header('Content-Type: application/json');

// Conecta a la base de datos
$mysqli = new mysqli('localhost', 'root', '', 'eyc_proyecto_pagina');

// Verifica la conexión
if ($mysqli->connect_error) {
    $response = [
        'status' => 'error',
        'message' => 'Conexión fallida: ' . $mysqli->connect_error
    ];
    echo json_encode($response);
    exit;
}

// Obtén el ID de la cita desde la solicitud POST
$citaId = isset($_POST['id']) ? $_POST['id'] : null;

$response = [];

if ($citaId) {
    // Consulta para cancelar la cita
    $query = "DELETE FROM citas WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('i', $citaId);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $response['status'] = 'success';
            $response['message'] = 'La cita ha sido cancelada.';
        } else {
            // No se encontró ninguna fila afectada (cita no existe)
            $response['status'] = 'error';
            $response['message'] = 'No se encontró la cita con el ID proporcionado.';
        }
    } else {
        error_log('Error al cancelar la cita. ID: ' . $citaId . ' - ' . $stmt->error); // Agrega esta línea para depurar
        $response['status'] = 'error';
        $response['message'] = 'Hubo un problema al cancelar la cita.';
    }

    $stmt->close();
} else {
    error_log('ID de cita no proporcionado'); // Agrega esta línea para depurar
    $response['status'] = 'error';
    $response['message'] = 'ID de cita no proporcionado.';
}

// Cierra la conexión
$mysqli->close();

// Envía la respuesta JSON
echo json_encode($response);
?>
