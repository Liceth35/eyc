<?php
require_once './conexion.php';

if (isset($_POST['btn_register'])) {
    $conexion = new PDODB();

    $conexion->conectar();

    $nombre = $_POST['nombre'];
    $cedula = $_POST['cedula'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

        $CrearUsuario = "INSERT INTO `admin` (`nombre`, `cedula`, `usuario`, `contrasena`) 
        VALUES ( '".$nombre."' , '".$cedula."' , '".$usuario."' , '".$contrasena."' );";
        $ResultadoCrearUsuario = $conexion->ejecutarinstruccion($CrearUsuario);
        
        if ($ResultadoCrearUsuario == true){
                header("Location: ../index.php");
        }
            else {
            echo "no se pudo crear el registro, intentelo nuevamente";
        }
    }
?>
