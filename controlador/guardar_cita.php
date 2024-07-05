<?php
require_once './conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

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

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        $departamento = $_POST["departamento"];
        $municipio = $_POST["municipio"];
        $fecha = $_POST["fecha"];
        $horario = $_POST["horario"];
        $numeroDocumento = $_POST["numero-documento"];
        $tipoDocumento = $_POST["tipo-documento"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $movil = $_POST["movil"];
        $aceptoPolitica = $_POST["politica"];

        $db = new PDODB();
        $db->conectar();

        $query = "INSERT INTO citas (departamento, municipio, fecha, horario, numero_documento, tipo_documento, nombre, correo, movil, acepto_politica) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$departamento, $municipio, $fecha, $horario, $numeroDocumento, $tipoDocumento, $nombre, $correo, $movil, $aceptoPolitica];

        $result = $db->consulta($query, $params);

        if ($result = true) {
            echo "<p>Cita agendada correctamente.</p>";
        } else {
            echo "<p>Error al agendar la cita.</p>";
        }

        $db->close();
    }
} else {
    echo "<p>Solicitud inválida.</p>";
}
?>
