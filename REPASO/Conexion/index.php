<?php

function autocarga($clase){
    require "./class/" . $clase . ".php";
}
spl_autoload_register('autocarga');

$conexion = new Conexion("./config.json");
$book = new Book("Lirbo234");

echo $book->selectBook();

?>