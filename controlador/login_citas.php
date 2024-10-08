<?php
require_once './conexion.php';
session_start(); // Mover session_start() al inicio

if (isset($_POST['btn_login'])) {
    $conexion = new PDODB();
    $conexion->conectar();

    $cedula = $_POST['cedula'];
    $contrasena = $_POST['contrasenna'];

    $instruccionSql = "SELECT * FROM usuarios_rh WHERE cedula = :cedula AND contrasenna = :contrasenna";

    $resultados = $conexion->consulta($instruccionSql, [
        ':cedula' => $cedula,
        ':contrasenna' => $contrasena
    ]);

    if ($resultados) {
        foreach ($resultados as $valor) {
            $_SESSION['cedula_usuarios'] = $valor['cedula']; // Cambiar clave a 'cedula_usuarios'
            $_SESSION['nombre_usuario'] = $valor['nombre'];
        }

        header("Location: ../admin_gestion.php");
        exit();
    } else {
        $_SESSION['error_login'] = "si";
        header("Location: ../login_citas.php");
        exit();
    }
} else {
    echo "No se enviaron los datos esperados.";
}
?>
