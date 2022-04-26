<?php
    require_once '../vendor/autoload.php';

    
    use Clases\Conexion;

   
    // Se comprueba si existen registros en la tabla "jugadores"
    $conexion = new Conexion();
    
    

    // Si no existe base de datos , mostrar página de instalación
    if() {
        header("Location: instalacion.php");
    } 
    // En caso contrario, mostrar el listado de jugadores
    else {
        header("Location: jugadores.php");
    }
?>