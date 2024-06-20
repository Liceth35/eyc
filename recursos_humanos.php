<?php
require_once './PDODB.php';

$db = new PDODB();
$db->conectar();

// Consultar la base de datos
$sql = "SELECT * FROM hoja_de_vida";
$result = $db->getData($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Subir Archivos</h1>
        <form id="uploadForm" action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombre">Nombre y apellidos *</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo electrónico *</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular *</label>
                <input type="tel" id="celular" name="celular" required>
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de documento *</label>
                <select id="tipo_documento" name="tipo_documento" required>
                    <option value="">Seleccionar</option>
                    <option value="cc">Cédula de ciudadanía</option>
                    <option value="ti">Tarjeta de identidad</option>
                    <option value="ce">Cédula de extranjería</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numero_documento">Número del documento *</label>
                <input type="text" id="numero_documento" name="numero_documento" required>
            </div>
            <div class="form-group">
                <label for="departamento">¿En qué departamento te encuentras? *</label>
                <input type="text" id="departamento" name="departamento" required>
            </div>
            <div class="form-group">
                <label for="ciudad">¿En qué ciudad vives? *</label>
                <input type="text" id="ciudad" name="ciudad" required>
            </div>
            <div class="form-group">
                <label for="profesion">Profesión</label>
                <input type="text" id="profesion" name="profesion">
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje"></textarea>
            </div>
            <div class="form-group">
                <label for="archivo_adjunto">Archivo adjunto</label>
                <input type="file" id="archivo_adjunto" name="archivo_adjunto" required>
            </div>
            <button type="submit">Enviar</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Tipo Documento</th>
                    <th>Número Documento</th>
                    <th>Departamento</th>
                    <th>Ciudad</th>
                    <th>Profesión</th>
                    <th>Mensaje</th>
                    <th>Archivo Adjunto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    foreach ($result as $row) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nombre']}</td>
                            <td>{$row['correo']}</td>
                            <td>{$row['celular']}</td>
                            <td>{$row['tipo_documento']}</td>
                            <td>{$row['numero_documento']}</td>
                            <td>{$row['departamento']}</td>
                            <td>{$row['ciudad']}</td>
                            <td>{$row['profesion']}</td>
                            <td>{$row['mensaje']}</td>
                            <td><a href='uploads/{$row['archivo_adjunto']}'>Ver Archivo</a></td>
                            <td>
                                <button>Ver Archivo Modal</button>
                                <button>Ver Archivo página</button>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No hay datos disponibles</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$db->close();
?>
