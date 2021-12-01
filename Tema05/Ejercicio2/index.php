<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        include './php/funciones.php';

        if(!isset ($_POST['nombre']) || !isset ($_POST['apellido'])){
            echo formulario();
        }elseif($_FILES['fichero']['type'] == "image/gif" or $_FILES['fichero']['type'] == 'image/jpeg'){
            if(is_uploaded_file($_FILES['fichero']['tmp_name'])){
                $nombreDirectorio='.\..\ficheros\\';
                $nombreFichero= $_FILES['fichero']['name'];
                $nombreCompleto= $nombreDirectorio.$nombreFichero;
                if (is_dir($nombreDirectorio)){
                    $idUnico= date('Y-m-d');
                    $nombreFichero= $idUnico."-".$nombreFichero;
                    $nombreCompleto=$nombreDirectorio.$nombreFichero;
                    move_uploaded_file ($_FILES['fichero']['tmp_name'],$nombreCompleto);
                    
                    echo salida($nombreFichero);

                }else{
                    echo error(1);
                }
            }else{
                echo error(2);            }
        }else{
            echo formulario();
            echo error(3);  
        }
    ?>

    
</body>

