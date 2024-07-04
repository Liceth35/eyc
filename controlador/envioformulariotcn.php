<?php
require_once './conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $departamento = $_POST['departamento'];
    $ciudad = $_POST['ciudad'];
    $profesion = $_POST['profesion'];
    $mensaje = $_POST['mensaje'];

    // Directorio donde se guardarán los archivos subidos
    $target_dir = "uploads/";

    // Verificar si el directorio existe, si no, crearlo
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Nombre original del archivo subido
    $file_name = $_FILES["hoja_vida"]["name"];
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
    if (move_uploaded_file($_FILES["hoja_vida"]["tmp_name"], $target_file)) {
        try {
            // Conexión a la base de datos
            $db = new PDODB();
            $db->conectar();

            // Consulta SQL para insertar en la base de datos
            $sql = "INSERT INTO hoja_de_vida (nombre, correo, celular, tipo_documento, numero_documento, departamento, ciudad, profesion, mensaje, archivo_adjunto) VALUES (:nombre, :correo, :celular, :tipo_documento, :numero_documento, :departamento, :ciudad, :profesion, :mensaje, :archivo_adjunto)";
            $stmt = $db->prepare($sql);

            // Vincular parámetros
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':celular', $celular);
            $stmt->bindParam(':tipo_documento', $tipo_documento);
            $stmt->bindParam(':numero_documento', $numero_documento);
            $stmt->bindParam(':departamento', $departamento);
            $stmt->bindParam(':ciudad', $ciudad);
            $stmt->bindParam(':profesion', $profesion);
            $stmt->bindParam(':mensaje', $mensaje);
            $stmt->bindParam(':archivo_adjunto', $target_file); // Almacenar la ruta completa del archivo

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Redirigir si la inserción fue exitosa
                header("location: ../trabaja-con-nosotros.php");
                exit;
                if ($resultado = true) {
                    echo "Formulario enviado exitosamente.";
                } 
            } else {
                echo "Error al enviar el formulario.";
            }

            // Cerrar conexión
            $db->close();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        if ($resultado = true) {
            echo "Formulario enviado exitosamente.";
        } 
    } else {
        echo "Error al subir el archivo PDF.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
