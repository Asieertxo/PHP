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
foreach($alumnos as $nombre => $alumno){
    $media = 0;
    $num_notas = 0;
    //var_dump($alumno);
    foreach($alumno as $nota){
        $media = $media + $nota;
        $num_notas = $num_notas + 1;
    }
$media = $media / $num_notas;
    echo $nombre . ": ";
    echo $media;
    echo "<br>";
}

?>