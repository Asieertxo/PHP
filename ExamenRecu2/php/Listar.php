<?php
function autocarga($clase){
    require "./../class/" . $clase . ".php";
}
spl_autoload_register('autocarga');

if(isset($_GET['origen'])){
    if($_GET['origen'] = 'index'){
    $conn = new Comercio();
    $conn->showProducts();
    }
}

?>