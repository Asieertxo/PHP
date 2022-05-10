<?php



class Conexion{
    private $user;
    private $pass;
    private $dbname;
    private $server;

    private $pdo;
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
            $this->pdo = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass);
        }catch(PDOException $error){
            echo "No se conecto" . $error->getMessage();
        }
    }

    function accion($sql){
        try{
            $this->sql = $sql;
            $this->resultado = $this->pdo->prepare($this->sql);
            $this->resultado->execute();

            return $this->resultado;
        }catch(PDOException $error){
            die("Error en la accion ---- " . $error->getMessage());
        }
    }
}





?> 