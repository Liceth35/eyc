<?php
// gestionCitas.php

// Incluir el archivo de conexión a la base de datos
include_once './controlador/conexion.php';

// Función para cargar las citas desde la base de datos
function cargarCitas() {
    global $pdo; // Asumiendo que $pdo está definido en conexion.php

    try {
        // Obtener la conexión PDO desde la clase PDODB
        $conexion = $pdo->getConexion();

        $stmt = $conexion->prepare("SELECT * FROM citas");
        $stmt->execute();
        $citas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $citas;
    } catch (PDOException $e) {
        // Manejo de errores - puedes personalizar según tus necesidades
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>
