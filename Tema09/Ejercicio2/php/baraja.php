<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        global $baraja;

        $oros = array('1oros', '2oros', '3oros', '4oros', '5oros', '6oros', '7oros', '8oros', '9oros', '10oros', '11oros', '12oros');
        $copas = array('1copas', '2copas', '3copas', '4copas', '5copas', '6copas', '7copas', '8copas', '9copas', '10copas', '11copas', '12copas');
        $bastos = array('1bastos', '2bastos', '3bastos', '4bastos', '5bastos', '6bastos', '7bastos', '8bastos', '9bastos', '10bastos', '11bastos', '12bastos');
        $espadas = array('1espadas', '2espadas', '3espadas', '4espadas', '5espadas', '6espadas', '7espadas', '8espadas', '9espadas', '10espadas', '11espadas', '12espadas');

        $baraja = array_merge($oros, $copas, $bastos, $espadas);

    ?>
    
</body>