<?php
echo "<link rel='stylesheet' type='text/css' href='./css/estilos.css'>";//importar css

function autocarga($clase){
    require "./class/" . $clase . ".php";
}
spl_autoload_register('autocarga');




if(isset($_GET['boton'])){
    if($_GET['boton'] == "insert"){
        dataBook();
    }elseif($_GET['boton'] == "delete"){
        deleteBook($conexion);
    }elseif($_GET['boton'] == "modify"){
        modifyBook($conexion);
    }
}else{
    $book = new Book(null, null, null, null, null);
    $book->showBook();
}




function dataBook(){
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






?>