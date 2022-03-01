<?php
namespace Clases;


class Conexion {
    private static $host = "localhost";
    private static $db = "Ejercicio1";
    private static $user = "root";
    private static $pass = " ";
    private $conexion;

    public function __construct(){
        // Establecer conexión con base de datos
        $this->conexion=new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass);
        // Permitir capturar las excepciones
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Aqui debemos añadir todo el control de excepciones necesario
    }

    public function getConexion(){
        return $this->conexion;
    }
}
?>