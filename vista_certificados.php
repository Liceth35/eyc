<?php
require_once './controlador/conexion.php';
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['cedula'])) {
    header("Location: vista_certificados.php");
    exit();
}

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

$db = new PDODB();
$db->conectar();

// Consultar la base de datos
$sql = "SELECT c.id, c.numero_cedula, c.codigo_verificacion,a.nombre, a.correo, a.movil 
        FROM certificados c
        LEFT JOIN citas a ON c.numero_cedula = a.numero_documento";
$result = $db->getData($sql);

$db->close(); // Cerrar la conexión después de obtener los datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificados | E&C Ingeniería S.A.S</title>
    <link rel="stylesheet" href="./css/vista_certificados.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
    
</head>
<body>
   <form action="controlador/certificados_excel.php" method="post" class="btn-descargar">
        <button type="submit" class="btn btn-success">Descargar certificados Excel</button>
    </form>
     <button type="button" class="btn btn-warning btn-cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
    
    <div class="contenedor_padre">
        <h1>Certificados</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número de Cédula</th>
                    <th>Código de Verificación</th>
                    <th>Nombre</th>
                    <th>Celular</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($result)) { ?>
                    <?php foreach ($result as $row) { ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['numero_cedula'] ?></td>
                            <td><?php echo $row['codigo_verificacion'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['movil'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7" class="text-center">No se encontraron registros.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script>
        function cerrarSesion() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.href = "./index.php";
                }
            };
            xhttp.open("GET", "./controlador/logaout.php", true);
            xhttp.send();
        }
    </script>
</body>
</html>
