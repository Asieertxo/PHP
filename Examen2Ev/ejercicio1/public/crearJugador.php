<?php
    require_once '../vendor/autoload.php';
    use Clases\Jugador;
    

    if(!empty($_POST)) {
        $jugador = new Jugador(
            
        );

        // Se comprueba que los datos son correctos
        if($jugador->getNombre() == null) {
            
        }
        else if($jugador->getApellidos() == null) {
            
        }
        else if($jugador->getDorsal() != null && Jugador::esDorsalRepetido($jugador->getDorsal())) {
           
        }
        else if($jugador->getCodigoBarras() == null) {
            
        }

        // En caso de error, se establece el mensaje y los datos actuales en sesión
        if(isset($_SESSION['error'])) {
            
            header("Location: fcrear.php");
        } 
        // Si está todo correcto, se almacena el jugador y se devuelve la vista al listado
        else {
            $_SESSION['mensaje'] = "Jugador creado con éxito";
            Jugador::insertarJugador($jugador);
            
        }
    } else {
        header("Location: fcrear.php");
    }
?>