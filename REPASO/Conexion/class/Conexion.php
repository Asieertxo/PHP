<?php



class Conexion{
    private $user;
    private $pass;
    private $dbname;
    private $server;

    private $conn;
    private $sql;
    private $resultado;

    public function __construct($ruta){
        $json = file_get_contents($ruta);
        $json = json_decode($json, true);
        $this->user = $json['user'];
        $this->pass = $json['pass'];
        $this->dbname = $json['dbname'];
        $this->server = $json['server'];

        try{
            $this->conn = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass);
        }catch(PDOException $error){
            echo "No se conecto" . $error->getMessage();
        }
    }

    public function getConn(){
        return $this->conn;
    }
}





?> 