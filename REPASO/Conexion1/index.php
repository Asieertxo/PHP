<?php
function autoload($clase){
    require "./" . $clase . ".php";
}
spl_autoload_register('autoload');

require "./../Cabezera.php";
require "./php/select.php";
require "./php/delete.php";
require "./php/insert.php";
require "./php/modify.php";

echo "<link rel='stylesheet' type='text/css' href='./css/estilos.css'>";//importar css


$cabezera = new Cabezera("Repaso", "ejercicio 4", "conexion");
echo $cabezera;

$conexion = new Conexion('config.json');
//$conexion->conectar();




if(isset($_GET['boton'])){
    if($_GET['boton'] == "insert"){
        insert($conexion);
    }elseif($_GET['boton'] == "delete"){
        delete($conexion);
    }elseif($_GET['boton'] == "modify"){
        modify($conexion);
    }
}else{
    select($conexion);
}


?>