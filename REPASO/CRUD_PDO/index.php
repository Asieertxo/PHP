<?php
echo "<link rel='stylesheet' type='text/css' href='./css/estilos.css'>";//importar css

function autocarga($clase){
    require "./class/" . $clase . ".php";
}
spl_autoload_register('autocarga');

require "./php/log.php";


$book = new Book();
$pcuser = 'asier';
$pcpass = '1234';


/*if(isset($_POST['user']) && isset($_POST['pass'])){
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


function formInsertBook(){
    if(!isset($_POST['isbn']) || !isset($_POST['title']) || !isset($_POST['author']) || !isset($_POST['stock']) || !isset($_POST['price'])){
        echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./index.php?boton=insert" method="POST" enctype="multipart/form-data">
                    <p>Pon los datos del libro para subir</p>
                    <input type="number" name="isbn" placeholder="Isbn"/>
                    <input type="text" name="title" placeholder="Title"/>
                    <input type="text" name="author" placeholder="Author"/>
                    <input type="number" name="stock" placeholder="Strock"/>
                    <input type="number" name="price" placeholder="Price"/>
                    <input type="submit" name="insert" value="INSERT"/>
                </form>
            </div>
        EOD;
    }else{
        $book = new Book($_POST['isbn'], $_POST['title'], $_POST['author'], $_POST['stock'], $_POST['price']);
        $book->insertBook();
        header("Refresh:3; url=index.php");
    }
}

function formUpdateBook(){
    $book = new Book(null, null, null, null, null);
    if(!isset($_GET['update'])){
        $id = $_GET['id'];
        $result = $book->selectByID($id);
        $result = $result->fetch(PDO::FETCH_ASSOC);

        echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./index.php?boton=update&update=$result[id]" method="POST" enctype="multipart/form-data">
                    <p>Pon los datos del libro para modificar</p>
                    <input type="hidden" name="id" value="$result[id]"/>
                    <input type="number" name="isbn" value="$result[isbn]"/>
                    <input type="text" name="title" value="$result[title]"/>
                    <input type="text" name="author" value="$result[author]"/>
                    <input type="number" name="stock" value="$result[stock]"/>
                    <input type="number" name="price" value="$result[price]"/>
                    <input type="submit" name="update" value="UPDATE"/>
                </form>
            </div>
        EOD;
    }else{
        $id = $_GET['update'];
        $book = new Book($_POST['isbn'], $_POST['title'], $_POST['author'], $_POST['stock'], $_POST['price']);
        $book->updateBook($id);
        header("Refresh:3; url=index.php");
    }
}






?>