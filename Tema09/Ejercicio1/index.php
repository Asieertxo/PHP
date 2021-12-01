<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        
        global $matriz;
        $matriz = array();

        for($i=0; $i<400; $i++){
            $num = rand(1, 999);
            if(!in_array($num, $matriz)){
                array_push($matriz, $num);
            }else{
                $i--;
            }
            
        }

        for($i=0; $i<count($matriz); $i++){
            echo "<div class='padre'>";
            for($j=0; $j<20; $j++){
                echo "<div class='hijo'>";
                echo $matriz[$i];
                echo "</div>";
                $i++;
            }
            echo "</div>";
            $i--;
        }
    ?>
    
</body>