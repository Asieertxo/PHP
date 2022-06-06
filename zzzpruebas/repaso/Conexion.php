<?php

class Conexion{
    private $user;
    private $pass;
    private $dbname;
    private $server;
    protected $conn;

    public function __construct(){
        $this->user = 'root';
        $this->pass = 'root';
        $this->dbname = 'empleados';
        $this->server = 'localhost';
    
        try{
            $this->conn = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "fallo";
        }
    
    }
}

?>