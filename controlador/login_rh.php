<?php
require_once './conexion.php';

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

    session_start();
    if ($resultados) {
        foreach ($resultados as $valor) {
            $_SESSION['cedula'] = $valor['cedula'];
            $_SESSION['nombre_usuario'] = $valor['nombre'];
        }

        header("Location: ../recursos_humanos.php");
        exit();
    } else {
        $_SESSION['error_login'] = "si";
        header("Location: ../loginrh.php");
        exit();
    }
} else {
    echo "No se enviaron los datos esperados.";
}
?>
