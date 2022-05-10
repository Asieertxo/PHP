<?php

function insert($conexion){
    if(!isset($_GET['insert'])){
        echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./index.php?boton=insert&insert=yes" method="POST" enctype="multipart/form-data">
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
        $sql = "INSERT INTO `book` ( `isbn`, `title`, `author`, `stock`, `price`) VALUES ('{$_POST['isbn']}', '{$_POST['title']}', '{$_POST['author']}', {$_POST['stock']}, {$_POST['price']})";
        $result = $conexion->accion($sql);

        if($result){
            echo "Libro subido con exito";//asi podemos meter las variables mas facil que sacando el texto desde la clase conexion
            header("Refresh:3; url=index.php");
        }//si falla ya da error el catch
    }
}

?>