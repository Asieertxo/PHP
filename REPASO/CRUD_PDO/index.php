<?php
echo "<link rel='stylesheet' type='text/css' href='./css/estilos.css'>";//importar css

function autocarga($clase){
    require "./class/" . $clase . ".php";
}
spl_autoload_register('autocarga');

require "./php/log.php";
require "./php/utils.php";

$book = new Book();


/*$pcuser = 'asier';
$pcpass = '1234';
if(isset($_POST['user']) && isset($_POST['pass'])){
    session_start();
    if($_POST['user'] == $pcuser && $_POST['pass'] == $pcpass){
        $_SESSION['name'] = "asier";
    }else{
        $_SESSION['name'] = "invitado";
    }
}else{
    loginForm();
    die();
}*/



if(isset($_GET['boton'])){
    if($_GET['boton'] == "insert"){
        formInsertBook();
    }elseif($_GET['boton'] == "delete"){
        $id = $_GET['id'];
        $isbn = $_GET['isbn'];
        $book->deleteBook($id, $isbn);
        header("Refresh:3; url=index.php");
    }elseif($_GET['boton'] == "update"){
        formUpdateBook();
    }
}else{
    $book->showBook();
}   




/*function loginForm(){
    echo<<<EOD
    <div class='contenedor'>
        <h2>Inicia Sesion(asier - 1234)</h2></br>
        <form action="./index.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="user" placeholder="usuario"/>
            <input type="pass" name="pass" placeholder="contraseña"/>
            <input type="submit" name="enter" value="enter"/>
        </form>
    </div>
    EOD;
}*/


?>