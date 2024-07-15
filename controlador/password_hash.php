<?php
require_once './conexion.php';

$nombre = 'Admin';
$correo = 'admin@ejemplo.com';
$contrasenna = password_hash('tu_contrasena_segura', PASSWORD_BCRYPT);
$rol = 'admin';

$db = new PDODB();
$db->conectar();

$query = "INSERT INTO usuarios (nombre, correo, contrasenna, rol) VALUES (?, ?, ?, ?)";
$params = [$nombre, $correo, $contrasenna, $rol];

$result = $db->consulta($query, $params);

if ($result) {
    echo "Administrador creado correctamente.";
} else {
    echo "Error al crear el administrador.";
}

$db->close();
?>
