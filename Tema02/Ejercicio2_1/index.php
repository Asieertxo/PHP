<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php

        function main(){
            echo<<<EOD
                <div class="padre">
                <form class="hijo" action="./index.php" method="POST" enctype="multipart/form-data">
                    <h1>Dime el nombre de un mes</h1>
                    <input type="text" id="mes" name="mes">
                    <input type="submit" value="Enviar">
                    <h1></h1>
                </form>
                </div>
EOD;
        }

        function pintarMes(){
            $mes = $_POST['mes'];

            switch ($mes){
                case 'enero': 
                case 'marzo': 
                case 'mayo':
                case 'julio':
                case 'agosto':
                case 'octubre':
                case 'diciembre':
                    $dias = 31;
                    break;
                case 'abril': 
                case 'junio':
                case 'septiembre':
                case 'noviembre':
                    $dias = 30;
                    break;
                case 'febrero':
                    $dias = 28;
                    break;
                default:
                    echo error(2);
                    break;
            }

            echo<<<EOD
            <table class="tabla";
            <thead>
                <caption>$mes</caption>
                <tr>
                    <th>Lu</th>
                    <th>Ma</th>
                    <th>Mi</th>
                    <th>Ju</th>
                    <th>Vi</th>
                    <th>Sa</th>
                    <th>Do</th>
                </tr>
            </thead>

EOD;
            echo "<tbody>";
            for($i=1; $i<=$dias; $i++){
                echo "<tr>";
                for($j=0; $j<7; $j++){
                    echo "<th>$i</th>";
                    $i++;
                    if($i==$dias+1){
                        break;
                    }
                }
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } 
        
        function error($op){ 
            if($op == 1){
                echo "<div class='error'>";
                echo "<p>No ha puesto ningun expediente, por favor escriba alguno</p>";
                echo "</div>";
            }elseif($op == 2){
                echo "<div class='padre'><div class='hijo'>";
                echo "Esto no es un mes ";
                echo "<a href='./index.php'>Volver</a>";
                echo "</div></div>";
            }
        }








        
        if(!isset ($_POST['mes'])){
            echo main();
        }elseif(empty ($_POST['mes'])){
            echo main();
            echo error(1);
        }else{
            echo pintarMes();
        }

    ?>

</body>