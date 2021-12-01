<?php
session_start();

if (isset($_GET['terminar_sesion'])){
    //Borramos todas las variables de la sesión
    $_SESSION=array();
    //Caducamos la cookie
    setcookie('PHPSESSID','',time()-3600);
    //destruimos los datos de la sesión en el script actual
    session_destroy();
    //redirigimos a la página de acreditación
    header('Location: acreditacion.php');
}

if (!isset($_SESSION['id'])){
    header('Location: acreditacion.php');
}

echo "Hola " . $_SESSION['id']['nombre'] . " " . $_SESSION['id']['apellido'];
echo "<br>";
echo '<a href="informacion.php?terminar_sesion=1">Terminar sesion</a><br />';
var_dump($_SESSION['id']);


?>
