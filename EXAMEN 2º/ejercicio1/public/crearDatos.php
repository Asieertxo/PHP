<?php 
    require_once '../vendor/autoload.php';
    include '../src/Conexion.php';
    
    use Clases\Jugador;

    // Se meten todos los insert . 
    /*insert into jugadores(nombre, apellidos, dorsal, posicion) values('Antonio','Gil Gil', 1, 1);
insert into jugadores(nombre, apellidos, dorsal, posicion) values('Ana','Hernandez Perez', 2, 2);
 insert into jugadores(nombre, apellidos, dorsal, posicion) values('Juan','Valdemoro Gil', 3, 2);
 insert into jugadores(nombre, apellidos, dorsal, posicion) values('Maria','Ruano Perez', 4, 2);*/

    // En los insert yo he puesto un dorsal, pero habria que generarlo.

    // Función auxiliar que genera un número de dorsal aleatorio
    

    // Redirigimos al index
    header("Location: index.php");
?>