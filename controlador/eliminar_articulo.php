<?php
require_once './conexion.php';

class EliminarArticuloController {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDODB();
        $this->pdo->conectar();
    }

    public function eliminarArticulo($id) {
        $sql = "DELETE FROM posts WHERE id = ?";
        $params = array($id);
        $this->pdo->consulta($sql, $params);
    }
}
?>
