<?php
require_once './conexion.php';
session_start(); // Iniciar la sesión aquí

if (isset($_POST['btn_login'])) {
    $conexion = new PDODB();
    $conexion->conectar();

    $cedula = $_POST['cedula'];
    $contrasena = $_POST['contrasenna'];

    $instruccionSql = "SELECT * FROM usuarios_cert WHERE cedula = :cedula AND contrasenna = :contrasenna";

    $resultados = $conexion->consulta($instruccionSql, [
        ':cedula' => $cedula,
        ':contrasenna' => $contrasena
    ]);

    if ($resultados) {
        foreach ($resultados as $valor) {
            $_SESSION['cedula'] = $valor['cedula'];
            $_SESSION['nombre_usuario'] = $valor['nombre'];
        }

        header("Location: ../admin/cargar_certificado.php"); // Redirigir a cargar_certificado.php
        exit();
    } else {
        $_SESSION['error_login'] = "si";
        header("Location: ../login_certificados.php"); // Redirigir a login si hay error
        exit();
    }
} else {
    echo "No se enviaron los datos esperados.";
}
?>
