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

    public function agregarArticulo($titulo, $resumen, $contenido, $url_imagen)
    {
        try {
            $sql = "INSERT INTO admin_blog (titulo, resumen, contenido, url_imagen) VALUES (:titulo, :resumen, :contenido, :url_imagen)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':resumen', $resumen);
            $stmt->bindParam(':contenido', $contenido);
            $stmt->bindParam(':url_imagen', $url_imagen);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al agregar el artículo: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerArticuloPorId($id)
    {
        try {
            $sql = "SELECT * FROM admin_blog WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener el artículo: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarArticulo($id, $titulo, $resumen, $contenido, $url_imagen)
    {
        try {
            $sql = "UPDATE admin_blog SET titulo = :titulo, resumen = :resumen, contenido = :contenido, url_imagen = :url_imagen, fecha_actualizacion = CURRENT_TIMESTAMP WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':resumen', $resumen);
            $stmt->bindParam(':contenido', $contenido);
            $stmt->bindParam(':url_imagen', $url_imagen);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el artículo: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerTodosLosArticulos()
    {
        try {
            $sql = "SELECT * FROM admin_blog";
            return $this->db->getData($sql);
        } catch (PDOException $e) {
            echo "Error al obtener los artículos: " . $e->getMessage();
            return false;
        }
    }

    public function eliminarArticulo($id)
    {
        try {
            $sql = "DELETE FROM admin_blog WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el artículo: " . $e->getMessage();
            return false;
        }
    }
}
?>
