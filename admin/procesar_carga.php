<?php
require_once '../controlador/conexion.php'; // Asegúrate de que el archivo de conexión esté correctamente referenciado

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $numero_cedula = $_POST['numero_cedula'];
    $codigo_verificacion = $_POST['codigo_verificacion'];

    // Directorio donde se guardarán los archivos subidos
    $target_dir = "./admin/uploads_certificado/";

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
            $sql = "INSERT INTO certificados (numero_cedula, codigo_verificacion, ubicacion_certificado) VALUES (:numero_cedula, :codigo_verificacion, :ubicacion_certificado)";
            $stmt = $db->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(':numero_cedula', $numero_cedula);
            $stmt->bindParam(':codigo_verificacion', $codigo_verificacion);
            $stmt->bindParam(':ubicacion_certificado', $target_file); // Almacenar la ruta completa del archivo

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Certificado subido correctamente.";
            } else {
                echo "Error al subir el certificado.";
            }

            // Cerrar conexión
            $db->close();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error al subir el archivo PDF.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
