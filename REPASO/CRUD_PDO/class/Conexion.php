<?php



class Conexion{
    private $user;
    private $pass1;
    private $pass2;
    private $dbname;
    private $server;

    protected $conn;

    public function __construct(){
        $json = file_get_contents("./config.json");
        $json = json_decode($json, true);
        $this->user = $json['user'];
        $this->pass1 = $json['pass1'];
        $this->pass1 = $json['pass2'];
        $this->dbname = $json['dbname'];
        $this->server = $json['server'];

        try{
            $this->conn = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass1);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            if($e->getCode() == '1045'){
                /*--REPETCION POR CONTRASEÑA-------------------------------------------------------------------------*/
                try{
                    $this->conn = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass2);
                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->pass1 = $this->pass2;
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
                /*---------------------------------------------------------------------------------------------------*/
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

    
    public function createBBDD(){
        $conn = new PDO("mysql:host=$this->server", $this->user, $this->pass1);
        $stmt = $conn->prepare("CREATE DATABASE libros");//como pasar libros por parametro
            //$stmt->bindParam(':bbdd', $this->dbname);
        $stmt->execute();
        header("Refresh:3; url=index.php");
    }
}





?> 