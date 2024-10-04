<?php
header('Content-Type: application/json');

include_once './controlador/conexion.php';
include 'vendor/autoload.php';

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
        // Llamar a la función para enviar el correo después de guardar la cita
        enviarCorreo($nombre, $email, $numero_contrato, $dia, $mes, $franja);
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

// enviamos el correo de confirmación de la cita utilizando las clases

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarCorreo($nombre, $email, $numero_contrato, $dia, $mes, $franja)
{

    // Convertir el mes numérico a nombre
    function obtenerNombreMes($numeroMes)
    {
        $meses = [
            1 => 'enero',
            2 => 'febrero',
            3 => 'marzo',
            4 => 'abril',
            5 => 'mayo',
            6 => 'junio',
            7 => 'julio',
            8 => 'agosto',
            9 => 'septiembre',
            10 => 'octubre',
            11 => 'noviembre',
            12 => 'diciembre'
        ];
        return $meses[$numeroMes];
    }

    // Crear la fecha en el formato deseado
    $nombreMes = obtenerNombreMes($mes);
    $fecha = "$dia-$nombreMes - 2024 entre las $franja";

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp-mail.outlook.com'; // servidor de outllok
        $mail->SMTPAuth = true;
        $mail->Username = 'citasycertificados@EyC.com.co'; // Correo desde el que se enviará
        $mail->Password = 'EYC.2024*'; // Contraseña del correo
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('citasycertificados@EyC.com.co', 'Confirmacion Cita');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Confirmación de cita';

        // Contenido del correo
        ob_start();
        include 'plantilla_email/email.php'; // Incluye el contenido HTML del correo
        $body = ob_get_clean();
        $body = str_replace('%Nombre%', $nombre, $body);
        $body = str_replace('%N° Contrato:%', $numero_contrato, $body);
        $body = str_replace('%Fecha:%', $fecha, $body);

        $mail->Body = $body;

        // Envío del correo
        $mail->send();
    } catch (Exception $e) {
        // Registrar el error
        error_log("Error al enviar el correo: {$mail->ErrorInfo}");
        exit("Estimado usuario, hubo un error al enviar el corre electrónico, reintenelo más tarde");
    }
}
