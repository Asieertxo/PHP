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
        }else{
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
                    echo "Directorio definido invalido";
                }
            }else{
                echo "No se ha podido subir el fichero";
            }
        }
    ?>
    
</body>