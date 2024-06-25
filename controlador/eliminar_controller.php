<?php
require_once './conexion.php';

class EliminarController
{
    private $db;

    public function __construct()
    {
        $this->db = new PDODB();
        $this->db->conectar();
    }

    public function eliminarArticulo($id)
    {
        $sql = "DELETE FROM admin_blog WHERE id = ?";
        $params = array($id);
        return $this->db->consulta($sql, $params);
    }
}
?>
