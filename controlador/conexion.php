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
        $this->conexion = new PDO(
            'mysql:host=' . $this->servidor . ';dbname=' . $this->basededatos,
            $this->usuario,
            $this->contrasena,
            $opciones
        );
    }

    function prepare($sql)
    {
        return $this->conexion->prepare($sql);
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

    function consulta($query, $params = array())
    {
        try {
            $statement = $this->conexion->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            return false;
        }
    }

    function close()
    {
        $this->conexion = null;
    }
}
?>
