<?php
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


require('alumnos.php');

$busqueda = $_GET["busqueda"];

echo '<table class="table table-striped">';
foreach($alumnos as $nombre => $notas){
    $media = 0;
    $num_notas = 0;
    //var_dump($notas);
    foreach($notas as $nota){
        $media = $media + $nota;
        $num_notas = $num_notas + 1;
    }
    $media = $media / $num_notas;


    echo"<tr>";
    if ($busqueda == "A"){
        if($media >=5){
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
            echo"<td> $media </td>";
        }
    }elseif($busqueda == "S"){
        if($media < 5){
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
            echo"<td> $media </td>"; 
        }
    }
    echo"</tr>";
}
echo '</table>';


?>