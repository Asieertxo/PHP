<?php
require_once __DIR__."./../cabezera.php";


echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"></head>';
echo<<<EOD
<head>
<style>
	.table {
        width:60%;
        margin:0 auto;
	}
</style>
</head>
EOD;

$cabezera = new Cabezera('Repaso', 'Ejercicio 1', 'Alumnos');
echo $cabezera;



if(!isset($_GET['busqueda'])){
    echo "<a href='calculo.php?busqueda=A'>Aprobados</a><br>";
    echo "<a href='calculo.php?busqueda=S'>Suspensos</a><br>";
    echo "<a href='index.php?busqueda=L'>Listado</a><br>";
    echo "<a href='verAlumnos.php'>Nota Media</a><br>";
}else{
    $busqueda = $_GET["busqueda"];
    if ($busqueda == "L"){
        Listado();
    }
}





function Listado(){
    require('alumnos.php');
    foreach($alumnos as $nombre => $notas){
        $media = 0;
        $num_notas = 0;
        foreach($notas as $nota){
            $media = $media + $nota;
            $num_notas = $num_notas + 1;
        }
        $media = $media / $num_notas;
        $alumnos[$nombre]['media'] = $media;
        
    }


    function sort_by_orden ($a, $b){
        if ($a['media'] == $b['media']) {
            return 0;
        }
        return ($a['media'] < $b['media']) ? -1 : 1;
    }
    uasort($alumnos, 'sort_by_orden');

    echo '<table class="table table-striped">';
    foreach($alumnos as $nombre => $notas){
        echo"<tr>";
            echo"<td> $nombre </td>";
            echo"<td> Notas : </td>";
            echo"<td>";
            foreach($notas as $n => $nota){
                if($n != 'media'){
                    echo $nota . " ";
                } 
            }
            echo"</td>";
            echo"<td> Nota Media : </td>";
            echo"<td> $notas[media] </td>";
        echo"</tr>";
    }
    echo '</table>';
}



?>