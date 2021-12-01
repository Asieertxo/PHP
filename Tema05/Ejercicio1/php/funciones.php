<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>

    <?php

        function formulario(){
            echo<<<EOD
                    <form action="." method="POST" enctype="multipart/form-data">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required/>

                        <label for="direccion">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Apellido" required/>

                        <input type="file" name="fichero">
                        
                        <input type="submit" name="enviar" value="enviar datos"/>
                    </form>
EOD;
        }

        function salida($nombreFichero){
            echo "<div class='padre'><div class='hijo'>";
            echo "&nbsp;<p class='txt'>- Nombre: " . $_POST['nombre']."</p></br>";
            echo "&nbsp;<p class='txt'>- Apellido: " . $_POST['apellido']."</p></br>";
            echo "Fichero subido con el nombre:<br>&nbsp; $nombreFichero<br>";
            echo "</div></div>";
        }
        
        function error($op){ /*faltaria arreglar que salga debajo del div sea cual sea el tamaño*/
            if($op == 1){
                echo "<div class='error'>";
                echo "<p>Hay algun dato sin completar, revisalo</p>";
                echo "</div>";
            }
            
        }
    ?>

</body>