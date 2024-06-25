<?php
require_once './conexion.php';

class PublicarController
{
    private $db;

    public function __construct()
    {
        $this->db = new PDODB();
        $this->db->conectar();
    }

    public function publicarArticulo($titulo, $contenido, $autor, $fecha_publicacion, $categoria)
    {
        $sql = "INSERT INTO admin_blog (titulo, contenido, autor, fecha_publicacion, categoria) VALUES (?, ?, ?, ?, ?)";
        $params = array($titulo, $contenido, $autor, $fecha_publicacion, $categoria);
        return $this->db->consulta($sql, $params);
    }
}
?>
