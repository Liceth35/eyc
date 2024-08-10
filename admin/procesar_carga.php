<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación exitosa</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <!-- Libreria de php para alertas -->
</head>
<body>
    
</body>
</html>
<?php
require_once '../controlador/conexion.php'; // Asegúrate de que el archivo de conexión esté correctamente referenciado
include '../vendor/autoload.php';
// Función para generar código único alfanumérico
function generarCodigo($longitud = 10) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codigo = '';
    for ($i = 0; $i < $longitud; $i++) {
        $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $codigo;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $numero_cedula = $_POST['numero_cedula'];
    
    //Identificacion de correo
    $correo = $_POST['correo'];
    
    // Generar código de verificación único
    $codigo_verificacion = generarCodigo(10);

    // Directorio donde se guardarán los archivos subidos
    $target_dir = "uploads_certificado/";

    // Verificar si el directorio existe, si no, crearlo
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Nombre original del archivo subido
    $file_name = $_FILES["certificado"]["name"];
    // Ruta completa del archivo en el servidor
    $target_file = $target_dir . basename($file_name);
    // Extensión del archivo
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es un PDF
    if ($file_extension != "pdf") {
        echo "Solo se permiten archivos PDF.";
        exit; // Detener el script si no es un PDF
    }

    // Intentar mover el archivo al directorio de destino
    if (move_uploaded_file($_FILES["certificado"]["tmp_name"], $target_file)) {
        try {
            // Conexión a la base de datos
            $db = new PDODB();
            $db->conectar();

            // Consulta SQL para insertar en la base de datos
            $sql = "INSERT INTO certificados (numero_cedula,correo, codigo_verificacion, ubicacion_certificado) VALUES (:numero_cedula,:correo, :codigo_verificacion, :ubicacion_certificado)";
            $stmt = $db->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(':numero_cedula', $numero_cedula);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':codigo_verificacion', $codigo_verificacion);
            $stmt->bindParam(':ubicacion_certificado', $target_file); // Almacenar la ruta completa del archivo

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo '<script>
                     Swal.fire({
                        title: "¡Certificado cargado exitosamente!",
                        icon:"success",
                        confirmButtonText: "OK, gracias"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirigir a cargar_certificado.php después de hacer clic en OK, gracias
                            window.location.href = "cargar_certificado.php";
                        }
                    });

                </script>';
            } else {
                echo "Error al subir el certificado.";
            }

            // Cerrar conexión
            $db->close();
            // llamamos la funcion enviar correo y le enviamos el correo y el codigo del certificado
            enviarCorreo($correo, $codigo_verificacion);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error al subir el archivo PDF.";
    }
} else {
    echo "Método de solicitud no permitido.";
}

// enviamos el correo de confirmación de la cita utilizando las clases

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function enviarCorreo($correo, $codigo_verificacion )
{


    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();
        $mail->Host = 'smtp-mail.outlook.com'; // servidor de outllok
        $mail->SMTPAuth = true;
        $mail->Username = 'Liceth.Valderrama@eyc.com.co'; // Correo desde el que se enviará
        $mail->Password = 'Babi2024*'; // Contraseña del correo
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('Liceth.Valderrama@eyc.com.co', 'Confirmación de certificado E&C');
        $mail->addAddress($correo);
        $mail->isHTML(true);
        $mail->Subject = 'Tu certificado ya esta disponible';

        // Contenido del correo
        ob_start();
        include '../plantilla_email/email_cert.php'; // Incluye el contenido HTML del correo
        $body = ob_get_clean();
        $body = str_replace('%codigo certificado:%', $codigo_verificacion, $body);

        $mail->Body = $body;

        // Envío del correo
        $mail->send();
    } catch (Exception $e) {
        // Registrar el error
        error_log("Error al enviar el correo: {$mail->ErrorInfo}");
        exit("Estimado usuario, hubo un error al enviar el corre electrónico, reintenelo más tarde");
    }
}

?>
