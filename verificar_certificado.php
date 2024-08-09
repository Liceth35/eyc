<?php
require_once('./controlador/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_cedula = $_POST['identificacion'];
    $codigo_verificacion = $_POST['codigo'];

    $db = new PDODB();
    $db->conectar();

    $sql = "SELECT * FROM certificados WHERE numero_cedula = :numero_cedula AND codigo_verificacion = :codigo_verificacion";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':numero_cedula', $numero_cedula, PDO::PARAM_STR);
    $stmt->bindParam(':codigo_verificacion', $codigo_verificacion, PDO::PARAM_STR);
    $stmt->execute();

    $certificado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($certificado) {
        $ubicacion_certificado = $certificado['ubicacion_certificado'];
        echo "Certificado encontrado. <a href='http://localhost/eyc/admin/{$ubicacion_certificado}' target='_blank'>Descargar Certificado</a>";
    } else {
        echo "No se encontró ningún certificado con los datos proporcionados.";
    }

    $db->close();
}
?>
