<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmar_password = $_POST["confirmar_password"];
$Fecha_nacimiento = $_POST["Fecha_nacimiento"];
$genero = $_POST["genero"];

//Tipo usuario
$tipo_usuario = "ESTANDAR";

//conexion a la base de datos
$usuario = 'root';
$contrasena = '';

try {
    $conexion = new PDO('mysql:host=localhost;dbname=multiple_services', $usuario, $contrasena);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para verificar las credenciales
    $sql = $conexion->query(
        "INSERT INTO
        users(id,
        nombre,
        email,
        password,
        confirmar_password,
        fecha_nacimiento,
        genero,
        tipo_usuario,
        fecha_registro)
        VALUES
        (id, '$nombre','$email','$password','$confirmar_password','$Fecha_nacimiento','$genero','$tipo_usuario',current_timestamp())"
    );

    // Verificar si se encontraron resultados
    if ($sql) {
        // Usuario autenticado, redirigir a la página de inicio
        echo '<script>
            Swal.fire({
                title: "Usuario Registrado",
                text: "Ya Puedes Iniciar Sesión",
                icon: "success",
                confirmButtonText: "Acceder"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../login.php";
                }
            });
        </script>';
    } else {
        // Usuario no autenticado, mostrar mensaje de error o redirigir al formulario de login
        echo '<script>
            Swal.fire({
                title: "Ups..!",
                text: "Algo Salió Mal",
                icon: "error",
                confirmButtonText: "Volver a Intentar"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../login.php";
                }
            });
        </script>';
    }
} catch (PDOException $e) {
    //echo "Error: " . $e->getMessage();
    echo "<script>
        Swal.fire({
            title: 'Algo Salió Mal',
            text: 'El Usuario: ($email) Ya Se Encuentra Registrado',
            icon: 'warning',
            confirmButtonText: 'Volver a Intentar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../index2.php';
            }
        });
    </script>";
}
?>
