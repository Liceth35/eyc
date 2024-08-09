<?php
header('Content-Type: application/json');

include_once './controlador/conexion.php';

// Crear instancia de la clase PDODB y conectar
$pdo = new PDODB();
$pdo->conectar();

// Recuperar los datos del formulario
$idCita = $_POST['id-cita'] ?? '';
$tipoDocumento = $_POST['tipo-documento'] ?? '';
$numeroDocumento = $_POST['numero-documento'] ?? '';
$numeroContrato = $_POST['numero-contrato'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['correo'] ?? ''; // Cambiado a email
$telefono = $_POST['celular'] ?? ''; // Cambiado a telefono
$direccion = $_POST['direccion'] ?? '';
$franja = $_POST['franja'] ?? '';
$dia = $_POST['dia'] ?? '';
$mes = $_POST['mes'] ?? '';
$municipio_id = $_POST['municipio'] ?? ''; // Cambiado a municipio_id

// Validar datos (opcional, pero recomendable)
if (empty($idCita) || empty($tipoDocumento) || empty($numeroDocumento) || empty($numeroContrato) || empty($nombre) || empty($email) || empty($telefono) || empty($direccion) || empty($franja) || empty($dia) || empty($mes) || empty($municipio_id)) {
    echo json_encode(['status' => 'error', 'message' => 'Todos los campos son requeridos.']);
    $pdo->close();
    exit();
}

// Preparar la consulta SQL para actualizar los datos
$sql = "UPDATE citas SET tipo_documento = :tipo_documento, numero_documento = :numero_documento, numero_contrato = :numero_contrato, nombre = :nombre, email = :email, telefono = :telefono, direccion = :direccion, franja = :franja, dia = :dia, mes = :mes, municipio_id = :municipio_id WHERE id = :id_cita";

// Ejecutar la consulta
$params = [
    ':tipo_documento' => $tipoDocumento,
    ':numero_documento' => $numeroDocumento,
    ':numero_contrato' => $numeroContrato,
    ':nombre' => $nombre,
    ':email' => $email,
    ':telefono' => $telefono,
    ':direccion' => $direccion,
    ':franja' => $franja,
    ':dia' => $dia,
    ':mes' => $mes,
    ':municipio_id' => $municipio_id,
    ':id_cita' => $idCita
];

try {
    $result = $pdo->ejecutar($sql, $params);

    if ($result) {
        $response = [
            'status' => 'success',
            'message' => 'Cita actualizada exitosamente.'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Error al actualizar la cita.'
        ];
    }

} catch (Exception $e) {
    $response = [
        'status' => 'error',
        'message' => 'Error al actualizar la cita: ' . $e->getMessage()
    ];
}

// Cerrar la conexión
$pdo->close();

// Enviar la respuesta como JSON
echo json_encode($response);
?>
