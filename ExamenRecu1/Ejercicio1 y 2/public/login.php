<?php

require "./../class/conection.php";

if(!isset($_POST['user']) && !isset($_POST['pass'])){
    echo formulario();
}else{
    $conection = crearConexion();

    $sql= "SELECT * FROM `usuarios`";
    $result = mysqli_query($conection, $sql);

    while($row = mysqli_fetch_assoc($result)){
        $pass =  hash('sha256',$_POST['pass']);

        if($row['usuario'] == $_POST['user']  &&  $row['pass'] == $pass){
            echo "Validado";
            session_start();
            $_SESSION['user'] = $_POST['user'];
            header("refresh:2; url=./listado.php");
            die();
        }
    }
    echo "credenciales incorrectas";
}






function formulario(){
    echo <<<EOD
        <form action="./login.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="user" placeholder="usuario" required/></br>
            <input type="password" name="pass" placeholder="contraseña" required/></br>
            <input type="submit" name"login" value="login" />
        </form>
    EOD;
    }
?>
