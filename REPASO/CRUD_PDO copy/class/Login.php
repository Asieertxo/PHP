<?php

class Login extends Conexion{
    public $user;
    public $pass;

    public function __construct($pcuser = null, $pcpass = null){
        $this->pcuser = $pcuser;
        $this->pcpass = $pcpass;

        parent::__construct();
    }

    public function check(){
        if(isset($_POST['user']) && isset($_POST['pass'])){
            $this->user = $_POST['user'];
            $this->pass = $_POST['pass'];
            if(self::userExists()){
                $_SESSION['name'] = $this->user;
            }else{
                $_SESSION['name'] = "invitado";
            }
        }else{
            self::loginform();
            die();
        }
    }

    public function userExists(){
        $stmt = $this->conn->prepare("SELECT * FROM users where user = :user and pass = :pass");
            $stmt->bindParam(':user', $this->user);
            $stmt->bindParam(':pass', $this->pass);
        $stmt->execute();
        if($stmt->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function logout(){
        if(isset($_GET['sdestroy'])){
            session_destroy();
            echo "Cerrando Sesion...";
            header("Refresh:3; url=index.php");
        }
    }

    public function loginform(){
        echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./index.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="user" placeholder="usuario"/>
                    <input type="pass" name="pass" placeholder="contraseña"/>
                    <input type="submit" name="enter" value="enter"/><br><br>
                    <input type="submit" name="enter" value="Entrar como invitado"/>
                </form>
            </div>
        EOD;
    }
}

?>