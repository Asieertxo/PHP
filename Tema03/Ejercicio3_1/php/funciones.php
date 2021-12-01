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
                <form action="./index.php" method="POST" enctype="multipart/form-data">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" required/>

                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido" required/>

                    <label for="edad">Edad</label>
                    <input type="number" name="edad" id="edad" placeholder="Edad" required/>

                    <label for="email" />Email</label>
                    <input type="email" name="email" id="email" placeholder="email" required />

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

                    <p>Nivel de Español:</p>
                    <input type="checkbox" name="idioma[]" value="español-bajo">Bajo
                    <input type="checkbox" name="idioma[]" value="español-medio">Medio
                    <input type="checkbox" name="idioma[]" value="español-alto">Alto</br>

                    <p>Nivel de Aleman:</p>
                    <input type="checkbox" name="idioma[]" value="aleman-bajo">Bajo
                    <input type="checkbox" name="idioma[]" value="aleman-medio">Medio
                    <input type="checkbox" name="idioma[]" value="aleman-alto">Alto</br>
                                
                    <input type="submit" name="enviar" value="enviar datos"/>
                </form>
EOD;
        }


        function salida(){
            echo "<div class='padre'><div class='hijo'>";
            echo "&nbsp;- Nombre: " . $_POST['nombre']."</br>";
            echo "&nbsp;- Apellido: " . $_POST['apellido']."</br>";
            echo "&nbsp;- Email: " . $_POST['email']."</br>";
            echo "&nbsp;- Edad: " . $_POST['edad']."</br>";
            echo "&nbsp;- Fecha de Nacimiento: " . $_POST['fecha']."</br>";
            echo "&nbsp;- Idiomas: "."</br>";
            for($i=0; $i<count($_POST['idioma']); $i++){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $_POST['idioma'][$i]."</br>";
            }
            echo "</div></div>";
        }


        function error($op){ /*faltaria arreglar que salga debajo del div sea cual sea el tamaño*/
            if($op == 1){
                echo "<div class='error'>";
                echo "<p>No ha puesto ningun numero, por favor escriba alguno</p>";
                echo "</div>";
            }elseif($op == 2){
                echo "<div class='error'>";
                echo "<p style='color:red'>Debes ser mayor de edad</p>";
                echo "</div>";
            }
            
        }

        ?>
</body>