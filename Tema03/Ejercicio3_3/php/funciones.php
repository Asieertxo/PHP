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

                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion" placeholder="Direccion" required/>

                        <label for="fecha">Fecha</label>
                        <input type ="date" name="fecha" id="fecha" placeholder="Fecha de Nacimiento"/>

                        <label for="idiomas">Idiomas: </label>

                        <p>Nivel de Ingles:</p>
                        <input type="checkbox" name="idioma[]" value="ingles-bajo">Bajo
                        <input type="checkbox" name="idioma[]" value="ingles-medio">Medio
                        <input type="checkbox" name="idioma[]" value="ingles-alto">Alto

                        <p>Nivel de Frances:</p>
                        <input type="checkbox" name="idioma[]" value="frances-bajo">Bajo
                        <input type="checkbox" name="idioma[]" value="frances-medio">Medio
                        <input type="checkbox" name="idioma[]" value="frances-alto">Alto

                        <p>Nivel de Italiano:</p>
                        <input type="checkbox" name="idioma[]" value="italiano-bajo">Bajo
                        <input type="checkbox" name="idioma[]" value="italiano-medio">Medio
                        <input type="checkbox" name="idioma[]" value="italiano-alto">Alto</br>

                        <p>Dime tu genero: </p>
                        <input type="radio" id="hombre" name="genero" value="hombre">Hombre
                        <input type="radio" id="mujer" name="genero" value="mujer">Mujer</br>

                        <p>Dime tus aficiones</p>
                        <select name="aficiones[]" id="aficiones" multiple>
                            <option value="futbol">Futbol</option>
                            <option value="peliculas">Peliculas</option>
                            <option value="informatica">Informatica</option>
                            <option value="diesta">Fiesta</option>
                            <option value="dormir">Dormir</option>
                        </select></br>

                        <label>Color de fondo: </label>
                            <input type="color" name="color_fondo"></br>
                        <label>Color de letra: </label>
                            <input type="color" name="color_letra"></br>

                        
                        <input type="submit" name="enviar" value="enviar datos"/>
                    </form>
EOD;
        }

        function salida(){
            $colorFondo = $_POST['color_fondo'];
            $colorLetra = $_POST['color_letra'];

            echo <<<COLR
                <style>
                    body{
                        background-color: $colorFondo;
                        color: $colorLetra;
                    }
                </style>
COLR;
            echo "<div class='padre'><div class='hijo'>";
            echo "&nbsp;<p class='txt'>- Nombre: " . $_POST['nombre']."</p></br>";
            echo "&nbsp;<p class='txt'>- Direccion: " . $_POST['direccion']."</p></br>";
            echo "&nbsp;<p class='txt'>- Fecha de Nacimiento: " . $_POST['fecha']."</p></br>";
            echo "&nbsp;<p class='txt'>- Genero: " . $_POST['genero']."</p></br>";
            echo "&nbsp;<p class='txt'>- Aficiones: </p>";
            for($i=0; $i<count($_POST['aficiones']); $i++){
                echo "&nbsp;<p class='txt'>" . $_POST['aficiones'][$i]."</p>&nbsp;";
            }
            echo "</br>";
            echo "&nbsp;<p class='txt'>- Idiomas: </p></br>";
            for($i=0; $i<count($_POST['idioma']); $i++){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p class='txt'>" . $_POST['idioma'][$i]."</p></br>";
            }
            echo "</div></div>";
        }
        
        function error($op){ /*faltaria arreglar que salga debajo del div sea cual sea el tamaño*/
            if($op == 1){
                echo "<div class='error'>";
                echo "<p>Hay algun dato sim completar, revisalo</p>";
                echo "</div>";
            }
            
        }
    ?>

</body>