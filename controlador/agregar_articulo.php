<?php
require_once '../controlador/conexion.php';

class AgregarArticuloController {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDODB();
        $this->pdo->conectar();
    }

    public function agregarArticulo($titulo, $resumen, $contenido, $url_imagen, $fecha_creacion, $fecha_actualizacion) {
        $sql = "INSERT INTO posts (titulo, resumen, contenido, url_imagen, fecha_creacion, fecha_actualizacion) VALUES (?, ?, ?, ?, ?, ?)";
        $params = array($titulo, $resumen, $contenido, $url_imagen, $fecha_creacion, $fecha_actualizacion);
        $this->pdo->consulta($sql, $params);
    }
}
?>
