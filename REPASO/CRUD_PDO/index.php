<?php
echo "<link rel='stylesheet' type='text/css' href='./css/estilos.css'>";//importar css

function autocarga($clase){
    require "./class/" . $clase . ".php";
}
spl_autoload_register('autocarga');

require "./php/log.php";
require "./php/utils.php";

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
        header("Refresh:20; url=index.php");
    }elseif($_GET['boton'] == "update"){
        formUpdateBook();
    }
}else{
    if(!isset($_GET['order'])){
        $order = 'id';
    }else{
        $order = $_GET['order'];
    }
    $book->showBook($order);
}   



?>