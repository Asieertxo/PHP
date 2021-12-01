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
                <div class='padre'>
                    <form class="hijo" action="./index.php" method="POST" enctype="multipart/form-data">
                        <h1>Dime un numero y calculo su factorial</h1>
                        <input type="number" id="numero" name="numero">
                        <input type="submit" value="Enviar">
                        <h1></h1>
                    </form>
                </div>
EOD;
        }
        function factorial($numero){
            $factor = 1;
            for($i=1; $i<=$numero; $i++){
                $factor=$factor*$i;
            }
            return $factor;
        }
        function error($op){ /*faltaria arreglar que salga debajo del div sea cual sea el tamaño*/
            if($op == 1){
                echo "<div class='error'>";
                echo "<p>No ha puesto ningun numero, por favor escriba alguno</p>";
                echo "</div>";
            }elseif($op == 2){
                echo "<div class='error'>";
                echo "<p>No se aceptan numeros negativos</p>";
                echo "</div>";
            }
            
        }



        if(!isset ($_POST['numero'])){
            echo main();
        }elseif(empty ($_POST['numero'])){
            echo main();
            echo error(1);
        }elseif($_POST['numero'] < 0){
        echo main();
        echo error(2);
        }else{
            $num = $_POST['numero'];
            echo "<div class='padre'><div class='hijo'>";
            echo "El factorial de $num es " . factorial($num);
            echo "</div></div>";
        }
    ?>
    
</body>