<?php
header('Content-Type: application/json');

include_once './controlador/conexion.php';

// Crear instancia de la clase PDODB y conectar
$pdo = new PDODB();
$pdo->conectar();

// Recibir los datos del formulario
$tipo_documento = $_POST['tipo-documento'] ?? '';
$numero_documento = $_POST['numero-documento'] ?? '';
$numero_contrato = $_POST['numero-contrato'] ?? '';
$nombre = $_POST['nombre'] ?? '';
$email = $_POST['correo'] ?? '';
$telefono = $_POST['movil'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$franja = $_POST['franja'] ?? '';
$dia = $_POST['dia'] ?? '';
$mes = $_POST['mes'] ?? '';
$municipio_id = $_POST['municipio'] ?? ''; // Asegúrate de que esta sea la clave primaria de la tabla municipios

// Validar datos (opcional, pero recomendable)
if (empty($tipo_documento) || empty($numero_documento) || empty($numero_contrato) || empty($nombre) || empty($email) || empty($telefono) || empty($direccion) || empty($franja) || empty($dia) || empty($mes) || empty($municipio_id)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son requeridos.']);
    $pdo->close();
    exit();
}

// Preparar la consulta SQL para insertar los datos
$sql = "INSERT INTO citas (tipo_documento, numero_documento, numero_contrato, nombre, email, telefono, direccion, franja, dia, mes, municipio_id) 
        VALUES (:tipo_documento, :numero_documento, :numero_contrato, :nombre, :email, :telefono, :direccion, :franja, :dia, :mes, :municipio_id)";

// Ejecutar la consulta
$params = [
    ':tipo_documento' => $tipo_documento,
    ':numero_documento' => $numero_documento,
    ':numero_contrato' => $numero_contrato,
    ':nombre' => $nombre,
    ':email' => $email,
    ':telefono' => $telefono,
    ':direccion' => $direccion,
    ':franja' => $franja,
    ':dia' => $dia,
    ':mes' => $mes,
    ':municipio_id' => $municipio_id
];

try {
    $result = $pdo->ejecutar($sql, $params);

    if ($result) {
        $response = [
            'success' => true,
            'message' => 'Cita guardada exitosamente.'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Error al guardar la cita.'
        ];
    }

} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => 'Error al guardar la cita: ' . $e->getMessage()
    ];
}

// Cerrar la conexión
$pdo->close();

// Enviar la respuesta como JSON
echo json_encode($response);
?>
