<?php
require_once './conexion.php';

if (isset($_POST['btn_login'])) {
    $conexion = new PDODB();
    $conexion->conectar();

    $usuario = $_POST['correo'];
    $contrasena = $_POST['contrasenna'];

    $instruccionSql = "SELECT * FROM usuarios WHERE correo = :correo AND contrasenna = :contrasenna";

    $resultados = $conexion->consulta($instruccionSql, [
        ':correo' => $usuario,
        ':contrasenna' => $contrasena
    ]);

    session_start();
    if ($resultados) {
        foreach ($resultados as $valor) {
            $_SESSION['correo_usuario'] = $valor['correo']; // Guardar el correo en la sesión
            header("Location: ../corporativo.php");
            exit();
        }
    } else {
        $_SESSION['error_login'] = "si";
        header("Location: ../login.php");
        exit();
    }
}
?>
