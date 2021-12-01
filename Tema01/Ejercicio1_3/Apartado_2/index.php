<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Tablas de Multiplicar</h1>

    <?php
        $NUMTABLAS = 10;

        for($i=1; $i<=$NUMTABLAS; $i++){
            echo<<<EOD
            <div class='caja'>
            <table class='tabla'>
            <tr><th>Tabla del $i</b></th></tr>
EOD;
            for($j=0; $j<=10; $j++){
                $resul = $i*$j;
                echo<<<EOD
                <tr>
                <td>$i</td>
                <td>x</td>
                <td>$j</td>
                <td>=</td>
                <td>$resul</td>
                </tr>
EOD;
            }

            echo<<<EOD
            </table>
            </div>
EOD;
        }
    ?>
</body>