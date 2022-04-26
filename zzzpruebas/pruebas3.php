<?php
/*
class Persona{//crear la clase
	//atributos de la clase
	public $nombre = array();
	public $apellido = array();

	//metodos como funciones
	public function guardar($nombre, $apellido){
		$this->nombre[] = $nombre;
		$this->apellido[] = $apellido;
	}
	public function mostrar(){
		for($i = 0; $i < count($this->nombre); $i++){
		$this->formato($this->nombre[$i], $this->apellido[$i]);
		}
	}
	public function formato($nombre, $apellido){
		echo "Nombre: " . $nombre . " | Apellido: " . $apellido . "</br>";
	}
}

$persona = new Persona();//llamada al constructor
$persona->guardar("carlos", "Fernandez");
$persona->guardar("Uriel", "Hernandez");
$persona->mostrar();
*/





class Loteria{
	public $numero;
	public $intentos;
	public $resultado = false;


	public function __construct($numero, $intentos){
		$this->numero = $numero;
		$this->intentos = $intentos;
	}
	public function sortear(){
		$minimo = $this->numero / 2;
		$maximo = $this->numero * 2;
		for($i = 0; $i < $this->intentos; $i++){
			$int = rand($minimo, $maximo);
			self::intentos($int);
		}
	}
	public function intentos($int){
		if($int == $this->numero){
			echo "<b>" . $int . " == " . $this->numero . "</b></br>";
			$this->resultado = true;
		}else{
			echo $int . " != " . $this->numero . "</br>";
		}
	}
	public function __destruct(){
		if($this->resultado){
			echo "Felicidades, has ganado en " . $this->intentos . " intentos";
		}else{
			echo "Que lastima, has perdido en " . $this->intentos . " intentos";
		}
	}
}

$loteria = new Loteria(10,10);
$loteria->sortear();
?>