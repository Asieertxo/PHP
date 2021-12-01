<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        include './php/funciones.php';

        global $ruta;
        global $nombre;


        if(!isset ($_POST['nombre']) || !isset ($_POST['apellido'])){
            echo formulario_subir();
            echo formulario_buscar();
        }else{
            if(isset ($_POST['subir'])){
                if(is_uploaded_file($_FILES['fichero']['tmp_name'])){

                    //creamos toda la ruta y nombre del archivo
                    $nombrecompleto = nombre();
    
                    //comprobamos si esta el directorio y lo subimos y añadimos el nombre al array
                    if (is_dir($ruta)){
                        move_uploaded_file($_FILES['fichero']['tmp_name'],$nombrecompleto);
                        echo salida('Perfil subido correctamente', 'subido');
                    }else{
                        echo salida("Directorio definido invalido", 'error');
                    }
                      
                }else{
                    echo salida("No se ha podido subir el archivo", 'error');
                }
                
            }else{
                if(esta() != false){
                    echo salida(esta(), 'encontrado');
                }else{
                    echo formulario_subir();
                    echo formulario_buscar();
                    echo salida('El usuario que a puesto no esta', 'error');
                }
            }

            
        }

        /*$name = trim($name)
          $name = str_replace(' ', '', $name)
          md5 : para codificar contraseña*/
    ?>


    
</body>