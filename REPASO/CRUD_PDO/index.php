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
        header("Refresh:3; url=index.php");
    }elseif($_GET['boton'] == "update"){
        formUpdateBook();
    }
}else{
    $book->showBook();
}   



?>