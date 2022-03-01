<?php
    require_once '../vendor/autoload.php';
    

    
    use Clases\Jugador;

   
    
    $jugadores = Jugador::getJugadores();

    // Se comprueba si existe un mensaje de retorno
    if(isset($_SESSION['mensaje'])) {
        $mensaje = $_SESSION['mensaje'];
        unset($_SESSION['mensaje']);
    } else {
        $mensaje = null;
    }

    // Se pinta la vista del listado de jugadores
    ?>