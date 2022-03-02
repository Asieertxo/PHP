<?php
require "./conection.php";
$conection = conection();

session_start();
$userID = $_SESSION['userID'];
$casaID = $_GET['casaID'];


$fecha = getdate();
$fecha = $fecha['mday'] ."-". $fecha['mon'] ."-". $fecha['year'] ."(". rand() .")";

$sql = "INSERT INTO `compras` (`usuario_id`, `casa_id`, `fecha`) VALUES ('{$userID}', '{$casaID}', '{$fecha}')";
if(mysqli_query($conection, $sql)){
    echo "Se ha guardado la compra de su casa";
    header("refresh:2; url=./tipo.php");
}else{
    echo "ERROR: no se ha podido guardar la compra";
}



?>