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
        // local lizeth
        // $this->servidor = "localhost"; me tocó colgar la bd en la nuve porque el local se me estañando  ucho
        // $this->usuario = "root";
        // $this->contrasena = "";
        // $this->basededatos = "eyc_proyecto_pagina";

        // nube cris
         $this->servidor = "193.203.175.97";
         $this->usuario = "u417547970_eyc";
         $this->contrasena = "3Sc|QO11MPum";
         $this->basededatos = "u417547970_eyc";

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

    function prepare($query)
    {
        try {
            return $this->conexion->prepare($query);
        } catch (PDOException $e) {
            die("Error al preparar la consulta: " . $e->getMessage());
        }
    }

    function consulta($query, $params = array())
    {
        try {
            $statement = $this->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error en la consulta: " . $e->getMessage());
        }
    }

    function getData($sql)
    {
        try {
            $datos = [];
            $resultados = $this->conexion->query($sql);
            if ($resultados->rowCount() > 0) {
                while ($row = $resultados->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $row;
                }
            } else {
                $datos = false;
            }
            return $datos;
        } catch (Throwable $th) {
            die("¡Oh no!, hubo un error en la consulta de obtener resultados: " . $th->getMessage());
        }
    }

    function login($sql)
    {
        try {
            $datos = [];
            $resultados = $this->conexion->query($sql);
            if ($resultados->rowCount() > 0) {
                while ($row = $resultados->fetch(PDO::FETCH_ASSOC)) {
                    $datos[] = $row;
                }
            } else {
                $datos = false;
            }
            return $datos;
        } catch (Throwable $th) {
            die("¡Oh no!, hubo un error en la consulta de login: " . $th->getMessage());
        }
    }

    function ejecutarinstruccion($sql)
    {
        try {
            $resultados = $this->conexion->query($sql);
            return $resultados;
        } catch (Exception $e) {
            die("¡Oh no!, hubo un error en la consulta de ejecutar instrucción: " . $e->getMessage());
        }
    }

    function ejecutar($query, $params = [])
    {
        try {
            $statement = $this->prepare($query);
            return $statement->execute($params);
        } catch (PDOException $e) {
            die("Error al ejecutar la consulta: " . $e->getMessage());
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

    function lastInsertId()
    {
        if ($this->conexion) {
            return $this->conexion->lastInsertId();
        } else {
            throw new Exception("Conexión no está activa.");
        }
    }
}
?>
