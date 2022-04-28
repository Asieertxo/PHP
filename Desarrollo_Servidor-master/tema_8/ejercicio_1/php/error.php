<?php

header("Refresh: 10; url=../index.php");
echo utf8_decode("El usuario ". $_GET['id'] .  " no ha podido registrarse, serás redireccionado en 10 segundos. Si no, pulsa <a href='../index.php'>aquí</a>.");

?>