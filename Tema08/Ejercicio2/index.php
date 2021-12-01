<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php

        if(!isset ($_POST['nombre']) || !isset ($_POST['contraseña'])){
            echo formulario();
        }elseif(empty ($_POST['nombre']) || empty ($_POST['nombre'])){
            echo formulario();
        }else{
            if($_POST['nombre'] == "admin" && $_POST['contraseña'] == 123456){
                $nombre = $_POST["nombre"];
                header("Location: ./php/verdatos.php?nombre=$nombre");
            }else{
                header("Location: ./php/error.php?nombre=$nombre");
            }
        }











        function formulario(){
            echo<<<EOD
                    <form action="." method="POST" enctype="multipart/form-data">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required/>

                        <label for="Contraseña">Contraseña</label>
                        <input type="text" name="contraseña" id="contraseña" placeholder="Contraseña" required/>
                        
                        <input type="submit" name="submit" value="Iniciar Sesion"/>
                    </form>
EOD;
        }
    ?>
    
</body>