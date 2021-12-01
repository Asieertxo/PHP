<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>

    <?php

        function formulario_subir(){
            echo<<<EOD
                <form action="." method="POST" enctype="multipart/form-data">
                    <h1>Formulario de subida</h1>

                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" required/></br>

                    <label for="direccion">Apellido</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido" required/>

                    <input type="file" name="fichero">
                    
                    <input type="submit" name="subir" value="Subir datos"/>
                </form>
EOD;
        }




        function formulario_buscar(){
            echo<<<EOD
            <form action="." method="POST" enctype="multipart/form-data">
                <h1>Formulario de busqueda</h1>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" required/></br>

                <label for="direccion">Apellido</label>
                <input type="text" name="apellido" id="apellido" placeholder="Apellido" required/>
                
                <input type="submit" name="buscar" value="Buscar"/>
            </form>
EOD;
        }




        function nombre(){
            global $ruta;
            $ruta = '.\img\\';
            $id = date('Ymd');
            $nombre = strtolower($_POST['nombre'] . $_POST['apellido']);
            $nombre = str_replace(' ', '', $nombre);
            $extension= pathinfo($_FILES['fichero']['name'], PATHINFO_EXTENSION);

            $nombrecompleto = $ruta . $id . $nombre . '.' . $extension;

            return $nombrecompleto;
        }




        function esta(){
            $nombre = strtolower($_POST['nombre'] . $_POST['apellido']);
            $nombre = str_replace(' ', '', $nombre);

            $personas = scandir('./img');

            for($i=2; $i<(count($personas)); $i++){
                $pos = strripos($personas[$i], '.');
                $personas[$i] = substr($personas[$i], 0, $pos).'<br>';
                $personas[$i] = strtolower($personas[$i]);
                $personas[$i] = str_replace(' ', '',  $personas[$i]);
            }

            for($i=0; $i<(count($personas)); $i++){
                $igual = strcmp( $nombre, $personas[$i]);
                if($igual == -4){
                    return $nombre;
                    break;
                }
            }
            return false;
        }





        function salida($mensaje, $accion){
            if($accion == 'encontrado'){
                echo "<div class='caja'>";
                    echo "<h2>$mensaje</h2>";
                    echo "<img src='./img/$mensaje.jpg'>";
                echo "</div>";
            }elseif($accion == 'subido'){
                echo "<div class='caja'>";
                    echo "<h2>$mensaje</h2>";
                echo "</div>";
            }elseif($accion == 'error'){
                echo "<div class='error'>";
                echo "<p>$mensaje</p>";
                echo "</div>";
            }
            
        }
    ?>

</body>