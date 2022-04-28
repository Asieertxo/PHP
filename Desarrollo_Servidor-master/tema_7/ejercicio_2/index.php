<!--2.Escribir la función calendario_mensual en calendario_ funciones.php, que reciba el año y el mes
como argumentos, y cree una tabla con la representación de ese mes, como si fuera una página
de un almanaque. En la primera fila aparecerá el nombre del mes, en la segunda los nombres de
los días de la semana abreviados (L, M, X, J, V, S y D) y, en las siguientes, los números de los
días-->

<?php

include("php/general_functions.php");
include("php/specific_functions.php");
include("php/variables.php");

if(!isset($_POST['send'])){
    printForm();
} else if($_POST['userMonth'] <= 0 or $_POST['userMonth'] > 12){
    printError("El mes no puede ser menor de uno ni mayor que doce");
} else printMonth($_POST['userMonth'], $_POST['userYear']);


?>