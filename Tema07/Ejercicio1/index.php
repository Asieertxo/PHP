<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        date_default_timezone_set('Europe/madrid');
        echo "<h4>Formas sencillas con funciones</h4>";
        echo "Fecha de hoy: " . date("d-m-Y");
        echo "<br>";

        echo "Fecha de mañana: " . date("d-m-Y", strtotime("+1 day"));
        echo "<br>";

        echo "Hora actual: " . date("h:i:s");
        echo "<br>";

        $date = new DateTime();
        $date->modify('next monday');
        echo "Prosimo lunes: " . $date->format("d-m-Y");




        echo "<br><hr><br>";

        echo "<h4>Formas sencillas con strtotime</h4>";
        $fechaHoy = strtotime("today");
        echo "La fecha de hoy es: " . date("d-m-Y", $fechaHoy) . "<br>";
        echo "La hora es: " . date("h:i:sa") . "<br>";
        $fechaMañana = strtotime("tomorrow");
        echo "La fecha de mañana es: " . date("d-m-Y", $fechaMañana) . "<br>";
        $fechaLunes = strtotime("next Monday");
        echo "La fecha del proximo Lunes es: " . date("d-m-Y", $fechaLunes) . "<br>";






        echo "<br><hr><br>";

        echo "<h4>Formas complicada inventada(no esta todo bien como los cambios de mes en fechas limite)</h4>";

        $fecha = getdate();
        $dias = array(' ', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo', 'lunes');
        $meses = array(' ', 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        var_dump($fecha);

        echo "Hoy estamos a " . $dias[$fecha['wday']] . " " . $fecha['mday'] . " del mes " . $meses[$fecha['mon']] . " del año $fecha[year]";
        echo "</br>";
        echo "Ayer estabamos a " . $dias[$fecha['wday']-1] . " " . (($fecha['mday'])-1) . " del mes " . $meses[$fecha['mon']] . " del año $fecha[year]";
        echo "</br>";
        echo "Hora actual => " . $fecha['hours'] .":". $fecha['minutes'] .":". $fecha['seconds'];
        echo "</br>";

        $diaactual = $fecha['wday'];
        $ps=0;
        if($diaactual == '1'){
            echo "Hoy estamos a " . $dias[$fecha['mday']] . " " . $fecha['mday'] . " del mes " . $meses[$fecha['mon']] . " del año $fecha[year]";
        }else{
            do{
                $diaactual++;
                $ps++;
                if($diaactual == '7'){
                    $diaactual = 0;
                }
                if($diaactual == '1'){
                    echo "El " . (($fecha['mday'])+$ps). " de " . $meses[$fecha['mon']] . " sera el proximo lunes";
                }
            }while($diaactual != '1');
        }

    ?>
    
</body>