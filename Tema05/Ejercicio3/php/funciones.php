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

                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Apellido" required/>
                        
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" id="correo" placeholder="correo" required/>

                        <label for="fecha">Fecha de Nacimiento</label>
                        <input type="date" name="fecha" id="fecha" placeholder="fecha"/>


                        <p>Titulos Academicos<p>
                        <input type="checkbox" name="titulo[]" value="ESO">ESO
                        <input type="checkbox" name="titulo[]" value="Bachillerato">Bachillerato
                        <input type="checkbox" name="titulo[]" value="Universitario">Universitario
                        <input type="checkbox" name="titulo[]" value="Grado Medio">Grado Medio
                        <input type="checkbox" name="titulo[]" value="Grado Superior">Grado Superior
                        <input type="text" name="ntitulo" id="ntitulo" placeholder="Nombre del Titulo"/>


                        <p> Experiencia Profesional<p>
                        <input type="checkbox" name="noexperiencia" value="ninguna">Ninguna
                        <input type="text" name="experiencia[]" placeholder="Ultimo puesto"/>
                        <input type="text" name="experiencia[]" placeholder="Anterior puesto"/>
                        <input type="text" name="experiencia[]" placeholder="Anterior puesto"/>


                        <input type="file" name="fichero" accept=".jpg">
                        
                        <input type="submit" name="enviar" value="enviar datos"/>
                    </form>
EOD;
        }

        function salida($nombreFichero){

            echo "<div class='padre'><div class='hijo'>";
            echo "<img src='./img/imagen.jpg'>";

            echo "&nbsp;<p class='txt'>- Nombre: " . $_POST['nombre']."</p></br>";
            echo "&nbsp;<p class='txt'>- Apellido: " . $_POST['apellido']."</p></br>";
            echo "&nbsp;<p class='txt'>- Correo: " . $_POST['correo']."</p></br>";
            echo "&nbsp;<p class='txt'>- Fecha de Nacimiento: " . $_POST['fecha']."</p></br>";

            echo "<p style='color:blue'>Titulos Academicos</p>";
            for($i=0; $i<count($_POST['titulo']); $i++){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;<p class='txt'>- " . $_POST['titulo'][$i]."</p><br>";
            }

            echo "<p style='color:blue'>Experiencia Laboral</p>";
            if (!empty($_POST['noexperiencia'])){
                echo "<p>Sin experiencia laboral</p>";
            }else{
                for($i=0; $i<count($_POST['experiencia']); $i++){
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;<p class='txt'>- " . $_POST['experiencia'][$i]."</p><br>";
                }
            }

            

            echo "</div></div>";
        }
        
        function error($op){
            if($op == 1){
                echo "<div class='error'>";
                echo "<p>Hay algun dato sin completar, revisalo</p>";
                echo "</div>";
            }
            
        }
    ?>

</body>