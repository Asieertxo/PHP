<?php
namespace Clases;



class Jugador {
    private $nombre;
    private $apellidos;
    private $posicion;
    private $dorsal;
    private $codigoBarras;

    const POSICIONES = array('Portero', 'Defensa', 'Lateral Izquierdo', 'Lateral Derecho', 'Central', 'Delantero');

    // Constructor
    public function __construct($n, $a, $p, $d, $c){
        $this->nombre=$n;
        $this->apellidos=$a;
        $this->posicion=$p;
        $this->dorsal=$d;
        $this->codigoBarras=$c;
    }
    // Cada metodo crea su conexion  su conexion
    // Obtener todos los jugadores
    public static function getJugadores() {
        /* Debes incluir las lineas necesarias para que devuelva todos los jugadores*/
        return $jugadores;
    }

    // Insertar un nuevo jugador
    public static function insertarJugador($jugador) {
        // Cada metodo tendrá su conexion
        //Nos pasan un obejto jugador `para insertar
        
    }

    // Comprobar si el dorsal ya existe en BD
    public static function esDorsalRepetido($dorsal) {
        
        $resultado = $stmt->fetch();
        return $resultado != null;
    }

    // Comprobar si el códio de barras ya existe en BD
    

    /* GETTERS */
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getPosicion() {
        return $this->posicion;
    }

    public function getDorsal() {
        if($this->dorsal == 0) {
            return "Sin asignar";
        }
        return $this->dorsal;
    }

    public function getCodigoBarras() {
        return $this->codigoBarras;
    }

   

    /* SETTERS */
    public function setNombre($n) {
        $this->nombre=$n;
    }
    
    public function setApellidos($a) {
        $this->apellidos=$a;
    }

    public function setPosicion($p) {
        $this->posicion=$p;
    }

    public function setDorsal($d){
        $this->dorsal=$d;
    }

    
}
?>