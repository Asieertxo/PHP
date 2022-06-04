<?php

class Login extends Conexion{
    private $user;
    private $email;
    private $sex;
    private $birthday;
    private $pass;

    public function __construct($user = null, $email = null, $sex = null, $birthday = null, $pass = null){
        $this->user = $user;
        $this->email = $email;
        $this->sex = $sex;
        $this->birthday = $birthday;
        $this->pass = $pass;

        parent::__construct();
    }

    public function check(){
        if(isset($_POST['user']) && isset($_POST['pass'])){
            if(isset($_POST['invitado'])){//comprobar boton de invitado
                $_SESSION['name'] = 'invitado';
            }else{
                $this->user = $_POST['user'];
                $this->pass = $_POST['pass'];
                if(self::userExists()){
                    $_SESSION['name'] = $this->user;
                }else{
                    self::errorUser();
                }
            }
        }else{
            loginform();
            die();//para que no muestre la tabla de libros
        }
    }

    public function userExists(){
        $this->pass = md5($this->pass);//la enciptamos para comparar con la BBDD que esta encriptada
        $this->pass = base64_encode($this->pass);
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
        session_destroy();
        echo "Cerrando Sesion...";
        header("Refresh:3; url=index.php");
    }

    public function errorUser(){
        echo "El usuario o contraseña es incorrecto<br>";
        echo "Puede entrar como invitado si prefiere";
        header("Refresh:3; url=index.php");
        die();//para que no muestre la tabla de libros
    }

    public function insertUser(){
        try{
            $this->pass = md5($this->pass);//encriptamos la contraseña
            $this->pass = base64_encode($this->pass);
            $stmt = $this->conn->prepare("INSERT INTO users (user, email, sex, birthday, pass) VALUES (:user, :email, :sex, :birthday, :pass)");
                $stmt->bindParam(':user', $this->user);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':sex', $this->sex);
                $stmt->bindParam(':birthday', $this->birthday);
                $stmt->bindParam(':pass', $this->pass);
            $stmt->execute();
            echo "Se ha registrado con exito";
        }catch(PDOException $error){
            echo "No se subio" . $error->getMessage();
        }
    }

}

?>