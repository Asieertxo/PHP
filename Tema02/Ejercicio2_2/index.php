<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        $alumnos = array(1234 => 'Asier Garcia', 2345 => 'Juan Perez', 3456 => 'Emilio Segundo', 4567 => 'Carlos Martinez', 5678 => 'Maria Fernandez', 6789 => 'Lucia Gomez');
        $print = false;

        function main(){
            echo<<<EOD
                <div class='padre'>
                <form class="hijo" action="./index.php" method="POST" enctype="multipart/form-data">
                    <h1>Dime tu numero de expediente</h1>
                    <input type="number" id="exp" name="exp">
                    <input type="submit" value="Enviar">
                    <h1></h1>
                </form>
            </div>
EOD;
        }

        function error($op){
            if($op == 1){
                echo "<div class='error'>";
                echo "<p>No ha puesto ningun expediente, por favor escriba alguno</p>";
                echo "</div>";
            }elseif($op == 2){
                echo "<div class='error'>";
                echo "<p>Ese expediente no se encuentra registrado</p>";
                echo "</div>";
            }elseif($op == 3){
                echo "<div class='padre'><div class='hijo'>";
                echo "Este expedientre no existe, por favor pruebe con otro";
                echo "<a href='./index.php'>Volver</a>";
                echo "</div></div>";
            }
            
        }

        if(!isset($_POST['exp'])){
            echo main();
        }elseif(empty ($_POST['exp'])){
            echo main();
            echo error(1);
        }else{
            foreach($alumnos as $exp => $nombre){
                if($exp == ($_POST['exp'])){
                    echo "<div class='padre'><div class='hijo'>";
                    echo "El anumno es $nombre con expediente $exp";
                    echo "</div></div>";
                    $print = true;
                    break;
                }
            }
            if($print == false){
                echo error(3);
            }
        }

    ?>

</body>