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
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            if($e->getCode() == '1045'){
                echo "SU USUARIO O CONTRASEÑA INCORRECTO<br><br>" . $e->getMessage();
                die();
            }elseif($e->getCode() == '1049'){
                echo "BBDD NO EXISTE, creandola...<br><br>" . $e->getMessage();
                sleep(3);
                self::createBBDD();
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

    public function getConn(){
        return $this->conn;
    }

    public function createBBDD(){
        $conn = new PDO("mysql:host=$this->server", $this->user, $this->pass);
        $stmt = $conn->prepare("CREATE DATABASE libros");//como pasar libros por parametro
            //$stmt->bindParam(':bbdd', $this->dbname);
        $stmt->execute();
        header("Refresh:3; url=index.php");
    }
}





?> 