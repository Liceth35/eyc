<?php
require_once './conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    try {
        $db = new PDODB();
        $db->conectar();

        $sql = "INSERT INTO contactos (nombre, telefono, correo, mensaje) VALUES (:nombre, :telefono, :correo, :mensaje)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':mensaje', $mensaje);

        if ($stmt->execute()) {
            header("location: ../contactos.php");
        } else {
            echo "Error al enviar el formulario.";
        }

        $db->close();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
