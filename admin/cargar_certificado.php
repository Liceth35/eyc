<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cargar Certificado</title>
    <link rel="stylesheet" href="../css/cargar_certificado.css">
    <link rel="shortcut icon" href="../images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
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

    <!-- Función PHP para generar código único -->
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
</body>
</html>
