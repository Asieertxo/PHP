<?php
function autocarga($clase){
    require "./../class/" . $clase . ".php";
}
spl_autoload_register('autocarga');


session_start();
$productos = new Carrito();

if(isset($_GET['borrar'])){
    $prod = $_SESSION['productos'];
    $productos = new Carrito($prod);
    $productos->borrar($_GET['borrar']);
    header("Refresh:0; url=./view_cart.php?comprar=anadir");
}elseif(isset($_GET['generarxml'])){
    $prod = $_SESSION['productos'];
    $productos = new Carrito($prod);
    $productos->generarXML();
}elseif(isset($_GET['comprar'])){
    if(!empty($_POST['codigo']) && !empty($_POST['cant']) && !empty($_POST['price'])){
        $productos->añadir($_POST['codigo'], $_POST['cant'], $_POST['price'], $_POST['name'], $_POST['description']);
        $productos->visualizar_carrito();
    }else{
        $productos->visualizar_carrito();
    }
}



?>