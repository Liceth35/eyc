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

    function getConexion()
    {
        return $this->conexion;
    }

    function close()
    {
        $this->conexion = null;
    }
}

// Instanciar la conexión
$pdo = new PDODB();
$pdo->conectar();
?>
