<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['cedula'])) {
    header("Location: ../login_certificados.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cargar Certificado</title>
    <link rel="stylesheet" href="../css/cargar_certificado.css">
    <link rel="shortcut icon" href="../images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <div class="header-buttons">
        <a href="../vista_certificados.php" class="btn btn-primary certificados">Certificados</a>
        <button type="button" class="btn btn-warning cerrar" onclick="cerrarSesion()">Cerrar Sesión</button>
    </div>
    <h2>Cargar Certificado</h2>
    <form action="procesar_carga.php" method="POST" enctype="multipart/form-data">
        <label for="numero_cedula">Número de Cédula:</label><br>
        <input type="text" id="numero_cedula" name="numero_cedula" required><br><br>

        <label for="codigo_verificacion">Código de Verificación:</label><br>
        <input type="text" id="codigo_verificacion" name="codigo_verificacion" value="<?php echo generarCodigo(10); ?>" readonly required><br><br>

        <label for="certificado">Certificado PDF:</label><br>
        <input type="file" id="certificado" name="certificado" accept=".pdf" required><br><br>

        <button type="submit">Subir Certificado</button>
    </form>

    <?php
    function generarCodigo($longitud = 10) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codigo = '';
        for ($i = 0; $i < $longitud; $i++) {
            $codigo .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $codigo;
    }
    ?>
    
    <script>
        function cerrarSesion() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        console.log("Sesión cerrada");
                        window.location.replace("../login_certificados.php");
                    } else {
                        console.log("Error al cerrar sesión");
                    }
                }
            };
            xhttp.open("GET", "../controlador/logaout.php", true);
            xhttp.send();
        }

        function irACertificados() {
            window.location.href = "../certificados.php";
        }

        window.onload = function() {
            if (window.history.length > 1) {
                window.history.forward();
            }
        }
    </script>
</body>
</html>
