<?php

$pcuser = 'asier';
$pcpass = '1234';


if(isset($_POST['user']) && isset($_POST['pass'])){
    session_start();
    if($_POST['user'] == $pcuser && $_POST['pass'] == $pcpass){
        $_SESSION['name'] = "asier";
    }else{
        $_SESSION['name'] = "invitado";
    }   



    echo "odifugiuhg</br>";
    if($_SESSION['name'] = 'asier'){
        echo "hola";
    }else{
        echo "adios";
    }
    session_destroy();

}else{
    formulario();
}





function formulario(){
    echo<<<EOD
        <div class='contenedor'>
            <h2>Elije Opciones</h2></br>
            <form action="./index.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="user" placeholder="usuario"/>
                <input type="pass" name="pass" placeholder="contraseña"/>
                <input type="submit" name="enter" value="enter"/>
            </form>
        </div>
    EOD;
}

?>