<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos</title>
    <link rel="stylesheet" href="./css/contactos_pqrs.css">
    <link rel="shortcut icon" href="images/New_Logo_EyC2024_vertical-removebg-preview.png">
</head>
<body>
    <div class="container">
        <!-- Botón para descargar archivo Excel -->
       <form action="controlador/exportar_excel.php" method="post">
            <button type="submit" class="btn btn-success">Descargar PQRS en Excel</button>
        </form>
        <h1>Lista de Contactos</h1>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Mensaje</th>
                </tr>
            </thead>
            <tbody id="contactTableBody">
                <!-- Aquí se insertarán los datos -->
            </tbody>
        </table>
    </div>
    <script src="./js/contactos_pqrs.js"></script>
</body>
</html>
