<?php
session_start();

$pcuser = 'asier';
$pcpass = '1234';

if(!isset($_SESSION['name'])){
    if(isset($_POST['user']) && isset($_POST['pass'])){
        if($_POST['user'] == $pcuser && $_POST['pass'] == $pcpass){
            $_SESSION['name'] = "asier";
        }else{
            $_SESSION['name'] = "invitado";
        }   
    }else{
        formulario();
    } 
}




echo "odifugiuhg</br>";
if($_SESSION['name'] == 'asier'){
    echo "hola";
    echo "<a href='index.php'>recarga</a>";
}else{
    echo "adios";
}
echo "</br><a href='./index.php'>atras</a>";
session_destroy();



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