<!--2. Obtener una función que baraja una baraja española
El array de la baraja debe ser global.
También creamos la función seleccionaCartas, que le pasamos cuantas cartas
queremos ver.
Debemos tener dos botones, uno que nos permita verBaraja y otro que nos permite
teclear cuantas cartas queremos ver-->

<?php

include("php/functions.php");
include("php/variables.php");

if(!isset($_POST['view']) and !isset($_POST['select'])){
    printForm();
} else if (isset($_POST['shuffle'])){
    shuffle();
} else if(isset($_POST['view'])){
    viewDeck($deck);
} else if (isset($_POST['select']) and !isset($_POST['cardsToView'])){
    printForm();
} else if (isset($_POST['select']) and isset($_POST['cardsToView'])){
    printForm();
}

?>