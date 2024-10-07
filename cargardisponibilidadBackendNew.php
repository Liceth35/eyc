<?php
header('Content-Type: application/json');

include_once './controlador/conexion.php';
include 'vendor/autoload.php';

// Crear instancia de la clase PDODB y conectar
$pdo = new PDODB();
$pdo->conectar();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
    exit();
}


// Recibir los datos del formulario
$data = json_decode(file_get_contents("php://input"), true); // Decodificar JSON

$municipio_id = $data['municipio_id'] ?? '';
$mes = $data['mes'] ?? '';
$dias = $data['dias'] ?? [];
$franjas = $data['franjas'] ?? [];

// Validar datos
if (empty($municipio_id) || empty($mes) || empty($dias) || empty($franjas)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son requeridos.']);
    $pdo->close();
    exit();
}

// Preparar la consulta SQL para insertar los datos en la tabla calendario
$sqlCalendario = "INSERT INTO calendario (municipio_id, dia, mes) VALUES (:municipio_id, :dia, :mes)";

// Insertar días seleccionados en la tabla calendario
foreach ($dias as $dia) {
    $paramsCalendario = [
        ':municipio_id' => $municipio_id,
        ':dia' => $dia,
        ':mes' => $mes
    ];

    try {
        $pdo->ejecutar($sqlCalendario, $paramsCalendario);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error al guardar los días en calendario: ' . $e->getMessage()]);
        $pdo->close();
        exit();
    }
}

// Preparar la consulta SQL para insertar los datos en la tabla franjas horarias
$sqlFranja = "INSERT INTO franjas_horarias (municipio_id, dia, mes, hora_inicio, hora_fin) VALUES (:municipio_id, :dia, :mes, :hora_inicio, :hora_fin)";

// Insertar franjas horarias
foreach ($franjas as $franja) {
    list($horaInicio, $horaFin) = explode('-', $franja);
    
    // Aquí necesitas asegurarte de que estás insertando franjas para cada día seleccionado
    foreach ($dias as $dia) {
        $paramsFranja = [
            ':municipio_id' => $municipio_id,
            ':dia' => $dia, // Ahora se usa el día del bucle
            ':mes' => $mes,
            ':hora_inicio' => $horaInicio,
            ':hora_fin' => $horaFin
        ];

        try {
            $pdo->ejecutar($sqlFranja, $paramsFranja);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error al guardar franjas horarias: ' . $e->getMessage()]);
            $pdo->close();
            exit();
        }
    }
}


// Cerrar la conexión
$pdo->close();

// Enviar respuesta de éxito
echo json_encode(['success' => true, 'message' => 'Datos guardados exitosamente.']);
