<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cargar Certificado</title>
    <link rel="stylesheet" href="../css/cargar_certificado.css">
</head>
<body>
    <h2>Cargar Certificado</h2>
    <form action="procesar_carga.php" method="POST" enctype="multipart/form-data">
        <label for="numero_cedula">Número de Cédula:</label><br>
        <input type="text" id="numero_cedula" name="numero_cedula" required><br><br>

        <label for="codigo_verificacion">Código de Verificación:</label><br>
        <input type="text" id="codigo_verificacion" name="codigo_verificacion" required><br><br>

        <label for="certificado">Certificado PDF:</label><br>
        <input type="file" id="certificado" name="certificado" accept=".pdf" required><br><br>

        <button type="submit">Subir Certificado</button>
    </form>
</body>
</html>
