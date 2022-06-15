<?php



class Conexion{
    private $user;
    private $pass;
    private $dbname;
    private $server;

    protected $conn;

    public function __construct(){
        $json = file_get_contents("./../json/config.json");
        $json = json_decode($json, true);
        $this->user = $json['user'];
        $this->pass = $json['pass'];
        $this->dbname = $json['dbname'];
        $this->server = $json['server'];

        try{
            $this->conn = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            if($e->getCode() == '1045'){
            }elseif($e->getCode() == '1049'){
                echo "BBDD NO EXISTE<br><br>" . $e->getMessage();
                /*sleep(3);
                self::createBBDD();*/
                die();
            }elseif($e->getCode() == '2002'){
                echo "SERVIDOR NO ENCONTRADO<br><br>" . $e->getMessage();
                die();
            }else{
               echo $e->getCode();
               die();
            }
        }
    }

    
    /*public function createBBDD(){
        $conn = new PDO("mysql:host=$this->server", $this->user, $this->pass1);
        $stmt = $conn->prepare("CREATE DATABASE comercio");
        $stmt->execute();
        header("Refresh:3; url=index.php");
    }*/
}





?> 