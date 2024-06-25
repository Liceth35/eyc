<?php
require_once './conexion.php';

class EditarController
{
    private $db;

    public function __construct()
    {
        $this->db = new PDODB();
        $this->db->conectar();
    }

    public function obtenerArticuloPorId($id)
    {
        $sql = "SELECT * FROM admin_blog WHERE id = ?";
        $params = array($id);
        return $this->db->consulta($sql, $params);
    }

    public function editarArticulo($id, $titulo, $contenido, $autor, $fecha_publicacion, $categoria)
    {
        $sql = "UPDATE admin_blog SET titulo = ?, contenido = ?, autor = ?, fecha_publicacion = ?, categoria = ? WHERE id = ?";
        $params = array($titulo, $contenido, $autor, $fecha_publicacion, $categoria, $id);
        return $this->db->consulta($sql, $params);
    }
}
?>
