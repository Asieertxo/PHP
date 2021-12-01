 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

<?php

function calendario_mensual($año, $mes){
    $month=$mes-1;//restamos 1 para que en el caption salga bien al cogerlo del array
    $year=$año;
    
    $diaSemana=date("w",mktime(0,0,0,$month+1,1,$year))+7;//nos dice donde empieza la semana(sumamos 1 porque antes lo hemos restado)(sumamos 7 para que nos deje siempre la primera fila vacia)
    $ultimoDiaMes=date("d",(mktime(0,0,0,$month+2,1,$year)-1));//nos dice el ultimo dia(sumamos 2, para ajustar hay que sumar 1 y el 1 que hemos restado antes)
    $ultima_celda=$diaSemana+$ultimoDiaMes;
    
    $meses=array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    
    echo<<<EOD
        <table class='calendario'>
            <caption>$meses[$month]</caption>
            <tr>
                <th class='d'>Lu</th>
                <th class='d'>Ma</th>
                <th class='d'>Mi</th>
                <th class='d'>Ju</th>
                <th class='d'>Vi</th>
                <th class='d'>Sa</th>
                <th class='d'>Do</th>
            </tr>
EOD;
    
    echo "<tr class='plateado'>";
    for($i=1;$i<=42;$i++){//42 porque maximo son 6 filas x 7 columnas
        if($i == $diaSemana){
            $day=1;
        }
        if($i<$diaSemana || $i>=$ultima_celda){
            echo "<td>&nbsp;</td>";
        }else{
            echo "<td>$day</td>";
            $day++;
        }
        if($i%7 == 0){
            echo "</tr><tr>";
        }
    }
    echo "</tr>";
    echo "<table>";
}

?>
    
</body>