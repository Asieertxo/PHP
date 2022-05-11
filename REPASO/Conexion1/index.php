<?php
function autoload($clase){
    require "./" . $clase . ".php";
}
spl_autoload_register('autoload');

require "./../Cabezera.php";
require "./php/operacionesCRUD.php";

echo "<link rel='stylesheet' type='text/css' href='./css/estilos.css'>";//importar css


$cabezera = new Cabezera("Repaso", "ejercicio 4", "conexion");
echo $cabezera;

$conexion = new Conexion('config.json');
//$conexion->conectar();




if(isset($_GET['boton'])){
    if($_GET['boton'] == "insert"){
        insertBook($conexion);
    }elseif($_GET['boton'] == "delete"){
        deleteBook($conexion);
    }elseif($_GET['boton'] == "modify"){
        modifyBook($conexion);
    }
}else{
    selectBook($conexion);
}


?>