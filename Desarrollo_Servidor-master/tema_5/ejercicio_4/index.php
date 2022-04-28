<!--4. Vamos a realizar un formulario que nos permite incluir el nombre y
apellidos de una persona y nos visualiza su imagen. Para ello habremos
guardado las imágenes con el nombre y apellidos de la persona , junto con
la fecha-->

<?php

include ("php/general_functions.php");
include ("php/specific_functions.php");

if(!isset($_POST['register']) and !isset($_POST['search'])){
    printForm();
} else if(isset($_POST['register']) and empty($_POST['user_name']) or isset($_POST['search']) and empty($_POST['search_user_name'])){
    printError("Introduzca su nombre por favor");
} else if(isset($_POST['search'])){
    searchImg();
} else {
    uploadFile();
}

?>


