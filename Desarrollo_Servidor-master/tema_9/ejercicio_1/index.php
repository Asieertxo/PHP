<!--1. Realizar una función para generar una matriz de 20*20 con 400 números
aleatorios que no estén repetidos. Utilizar dicha función en un programa
principal-->

<?php

include("php/functions.php");

if(isset($_POST['save'])){
    $new_array = createRandomArray(400, 0, 400);
    printArray($new_array, 20, 20);
} else printForm();

?>