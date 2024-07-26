<?php
require_once './conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validación de campos obligatorios
    $requiredFields = ["departamento", "municipio", "fecha", "horario", "numero-documento", "tipo-documento", "politica", "numero-contrato", "direccion"];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "El campo $field es obligatorio.";
        }
    }

    // Si hay errores, los mostramos
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        // Recuperamos los datos del formulario
        $departamento = $_POST["departamento"];
        $municipio = $_POST["municipio"];
        $direccion = $_POST["direccion"];
        $fecha = $_POST["fecha"];
        $horario = $_POST["horario"];
        $numeroDocumento = $_POST["numero-documento"];
        $tipoDocumento = $_POST["tipo-documento"];
        $numeroContrato = $_POST["numero-contrato"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $movil = $_POST["movil"];
        $aceptoPolitica = $_POST["politica"];

        // Conectamos a la base de datos
        $db = new PDODB();
        $db->conectar();

        // Preparamos la consulta SQL para insertar los datos en la tabla citas
        $query = "INSERT INTO citas (departamento, municipio, fecha, horario, numero_documento, tipo_documento, nombre, correo, movil, acepto_politica, numero_contrato, direccion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$departamento, $municipio, $fecha, $horario, $numeroDocumento, $tipoDocumento, $nombre, $correo, $movil, $aceptoPolitica, $numeroContrato, $direccion];

        // Ejecutamos la consulta
        $result = $db->consulta($query, $params);

        // Verificamos si la consulta se ejecutó correctamente
        if ($result) {
            echo "<p>Cita agendada correctamente.</p>";
        } else {
            echo "<p>Error al agendar la cita.</p>";
        }

        // Cerramos la conexión a la base de datos
        $db->close();
    }
} else {
    echo "<p>Solicitud inválida.</p>";
}
?>
