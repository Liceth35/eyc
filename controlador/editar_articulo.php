<?php
require_once '../conexion.php';

class EditarArticuloController {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDODB();
        $this->pdo->conectar();
    }

    public function obtenerArticuloPorId($id) {
        $sql = "SELECT * FROM posts WHERE id = ?";
        $params = array($id);
        return $this->pdo->consulta($sql, $params);
    }

    public function editarArticulo($id, $titulo, $contenido, $url_imagen) {
        $sql = "UPDATE posts SET titulo = ?, contenido = ?, url_imagen = ? WHERE id = ?";
        $params = array($titulo, $contenido, $url_imagen, $id);
        $this->pdo->consulta($sql, $params);
    }
}
?>
