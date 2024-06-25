<?php
require_once './conexion.php';

class BlogController
{
    private $db;

    public function __construct()
    {
        $this->db = new PDODB();
        $this->db->conectar();
    }

    public function obtenerArticulos()
    {
        $sql = "SELECT * FROM admin_blog ORDER BY fecha_publicacion DESC";
        return $this->db->getData($sql);
    }
}
?>
