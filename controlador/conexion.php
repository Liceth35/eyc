<?php
class PDODB
{
    private $servidor;
    private $usuario;
    private $contrasena;
    private $basededatos;
    private $conexion;

    function __construct()
    {
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->contrasena = "";
        $this->basededatos = "eyc_proyecto_pagina";
    }

    function conectar()
    {
        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::MYSQL_ATTR_FOUND_ROWS => TRUE
        );
        try {
            $this->conexion = new PDO(
                'mysql:host=' . $this->servidor . ';dbname=' . $this->basededatos,
                $this->usuario,
                $this->contrasena,
                $opciones
            );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error en la conexión: " . $e->getMessage());
        }
    }

    function consulta($query, $params = array())
    {
        try {
            $statement = $this->conexion->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    function getData($sql)
    {
        try {
            $datos = array();
            $resultados = $this->conexion->query($sql);
            if ($resultados->rowCount() > 0) {
                while ($row = $resultados->fetch(PDO::FETCH_ASSOC)) {
                    array_push($datos, $row);
                }
            } else {
                $datos = false;
            }
            return $datos;
        } catch (Throwable $th) {
            die("¡oh no!, hubo un error en la consulta de obtener resultados");
        }
    }

    function login($sql)
    {
        try {
            $datos = array();
            $resultados = $this->conexion->query($sql);
            if ($resultados->rowCount() > 0) {
                while ($row = $resultados->fetch(PDO::FETCH_ASSOC)) {
                    array_push($datos, $row);
                }
            } else {
                $datos = false;
            }
            return $datos;
        } catch (Throwable $th) {
            die("¡oh no!, hubo un error en la consulta de login");
        }
    }

    function ejecutarinstruccion($sql)
    {
        try {
            $resultados = $this->conexion->query($sql);
            return $resultados;
        } catch (exception $e) {
            die("¡oh no!, hubo un error en la consulta de ejecutar instruccion");
        }
    }

    function getConexion()
    {
        return $this->conexion;
    }

    function close()
    {
        $this->conexion = null;
    }
}

// Ejemplo de uso:
// Instanciar la conexión
$pdo = new PDODB();
$pdo->conectar();

// Ejemplo de consulta
$query = "SELECT * FROM tabla_ejemplo WHERE columna = :valor";
$params = array(':valor' => 'ejemplo');
$resultado = $pdo->consulta($query, $params);

// Procesar $resultado según necesites

$pdo->close();
?>
