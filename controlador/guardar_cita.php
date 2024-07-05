<?php
require_once './conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validación de campos obligatorios
    if (empty($_POST["departamento"])) {
        $errors[] = "El campo departamento es obligatorio.";
    }
    if (empty($_POST["municipio"])) {
        $errors[] = "El campo municipio es obligatorio.";
    }
    if (empty($_POST["fecha"])) {
        $errors[] = "El campo fecha es obligatorio.";
    }
    if (empty($_POST["horario"])) {
        $errors[] = "El campo horario es obligatorio.";
    }
    if (empty($_POST["numero-documento"])) {
        $errors[] = "El campo número de documento es obligatorio.";
    }
    if (empty($_POST["tipo-documento"])) {
        $errors[] = "El campo tipo de documento es obligatorio.";
    }
    if (empty($_POST["politica"])) {
        $errors[] = "El campo acepto política es obligatorio.";
    }
    if (empty($_POST["numero-contrato"])) {
        $errors[] = "El campo número de contrato es obligatorio.";
    }
    if (empty($_POST["direccion"])) {
        $errors[] = "El campo dirección es obligatorio.";
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
        if ($result = true) {
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
