<?php
// Incluir el archivo de conexión a la base de datos
require_once './conexion.php';

// Verificar si se han proporcionado los parámetros cedula y password en la URL
if (isset($_GET['cedula']) && isset($_GET['password'])) {
    // Obtener los valores de cedula y password desde la URL
    $cedula = $_GET['cedula'];
    $contrasenna = $_GET['password'];

    // Conectar a la base de datos
    $conexion = new PDODB();
    $conexion->conectar();

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM usuarios_rh WHERE cedula = :cedula AND contrasenna = :contrasenna";

    // Ejecutar la consulta con parámetros
    $resultados = $conexion->consulta($sql, [
        ':cedula' => $cedula,
        ':contrasenna' => $contrasenna
    ]);

    // Verificar si se encontraron resultados
    if ($resultados) {
        // Iniciar sesión para almacenar variables de sesión
        session_start();

        // Guardar datos del usuario en variables de sesión (ajustar según tu estructura de datos)
        foreach ($resultados as $valor) {
            $_SESSION['cedula'] = $valor['cedula']; // Suponiendo que 'cedula' es el nombre de la columna en la tabla
            $_SESSION['nombre_usuario'] = $valor['nombre']; // Suponiendo que 'nombre' es el nombre de la columna en la tabla
            // Puedes guardar otros datos de usuario según sea necesario
        }

        // Redirigir al usuario a la página de recursos_humanos.php después del login exitoso
        header("Location: ../recursos_humanos.php");
        exit();
    } else {
        // Si las credenciales no son válidas, redirigir de vuelta al formulario de login con un mensaje de error
        header("Location: ../login.php?error=true");
        exit();
    }
} else {
    // Si no se proporcionaron los parámetros esperados en la URL, redirigir al formulario de login
    header("Location: ../login.php");
    exit();
}
?>
