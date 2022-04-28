<!-- 1. Devolver la posición de todas las ocurrencias de una cadena
dentro de otra
Escribir una función personalizada llamada buscar($aguja,$pajar)
que devuelva un array con la posición de todas las ocurrencias de
aguja en pajar, o el valor FALSE en caso de que no haya ninguna.
Probarla con la llamada buscar ('Ana', 'Ana Irene Palma'). -->

<?php

include("php/functions.php");

if(!isset($_POST['save'])){
    printForm();
} else search($_POST['word_to_search'], $_POST['text_to_search']);

?>