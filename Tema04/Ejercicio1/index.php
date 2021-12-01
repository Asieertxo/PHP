<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="./css/estilos.css">
</head>
<body>

    <?php
        include './php/funciones.php';

        if(!isset ($_POST['cadena']) || !isset ($_POST['caracter'])){
            echo formulario();
        }else{
            $pos = (buscar($_POST['cadena'], $_POST['caracter']));
            if(empty($pos)){
                echo salida($pos, 'vacio');
            }else{
                echo salida($pos, 'lleno');
            }
            
        }
        
        
        
        /*preg_,atch mirar en internet
        
        preg_offset_capture
        
        preg_macth_all*/
    ?>
    
</body>