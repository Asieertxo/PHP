<?php
function autoload($clase){
    require "./" . $clase . ".php";
}
spl_autoload_register('autoload');

require "./../Cabezera.php";

$cabezera = new Cabezera("Repaso", "ejercicio 4", "conexion");
echo $cabezera;

$conexion = new Conexion();
$conexion->conectar();


if(isset($_GET['boton'])){
    if($_GET['boton'] == "select"){
        select($conexion);
    }elseif($_GET['boton'] == "insert"){
        insert($conexion);
    }elseif($_GET['boton'] == "delete"){
        delete($conexion);
    }
}else{
    echo "<a href='./index.php?boton=select'>Select</a> </br>";
    echo "<a href='./index.php?boton=insert'>Insert</a> </br>";
    echo "<a href='./index.php?boton=delete'>Delete</a> </br>";
}



function select($conexion){
    $sql = "SELECT id, isbn, title, author, stock, price FROM book";
    $result = $conexion->accion($sql);

    while($registro = $result->fetch(PDO::FETCH_ASSOC)){
        echo "isbn " . $registro['isbn'] . " --- title " . $registro['title'] .   "</br>";
    }
    $result->closeCursor();
}

function insert($conexion){
    $sql = "INSERT INTO `book` ( `isbn`, `title`, `author`, `stock`, `price`) VALUES ('4828475406254', 'Libro33', 'Pedro', 1, 30)";
    $result = $conexion->accion($sql);

    if($result){
        echo "Libro subido con exito";//asi podemos meter las variables mas facil que sacando el texto desde la clase conexion
    }//si falla ya da error el catch
}

function delete($conexion){
    $sql = "DELETE FROM `book` WHERE `id`= 37";
    $result = $conexion->accion($sql);

    if($result){
        echo "Libro borrado con exito";//da exito aun cuando borra un libro que no existia
    }
}
?>