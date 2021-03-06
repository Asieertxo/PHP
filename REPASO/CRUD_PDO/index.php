<?php
echo "<link rel='stylesheet' type='text/css' href='./css/estilos.css'>";//importar css

function autocarga($clase){
    require "./class/" . $clase . ".php";
}
spl_autoload_register('autocarga');

require "./php/log.php";
require "./php/formularios.php";
require "./php/cookies.php";



//Parte de Cookies------------------------------------------------
if(isset($_GET['cookies'])){
    if($_GET['cookies'] == 'getcookies'){
        formcookies();
    }elseif($_GET['cookies'] == 'putcookies'){
        cookies();
    }
}
setColor();
//si queremos que que la parte de loogin no se afecte, ponerlo despues





//Parte de Logueo-------------------------------------------------
session_start();
$login = new Login();
if(isset($_POST['register']) || isset($_GET['register'])){
    registerform();
    die();
}
if(!isset($_SESSION['name'])){
    $login->check();
}
if(isset($_GET['sdestroy'])){
    $login->logout();
}





//Parte de visualizacion y CRUD de Libros-------------------------
$book = new Book();

if(isset($_GET['boton'])){
    if($_GET['boton'] == "insert"){
        formInsertBook();
    }elseif($_GET['boton'] == "delete"){
        $id = $_GET['id'];
        $isbn = $_GET['isbn'];
        $title = $_GET['title'];
        $author = $_GET['author'];
        $book->deleteBook($id, $isbn, $title, $author);
        header("Refresh:3; url=index.php");
    }elseif($_GET['boton'] == "update"){
        formUpdateBook();
    }elseif($_GET['boton'] == "search"){
        header("Refresh:0; url=./php/search.php?boton=search");
    }
}else{//parte de ordenacion o de acotar la busqueda
    if(isset($_GET['option']) && isset($_GET['select'])){
        if(isset($_GET['signo'])){
            $book->showBook('id', $_GET['option'], $_GET['select'], $_GET['signo']);
        }else{
            $book->showBook('id', $_GET['option'], $_GET['select']);
        }
    }else{
        if(!isset($_GET['order'])){
            $order = 'id';
        }else{
            $order = $_GET['order'];
        }
        $book->showBook($order);
    }
    
}



?>