<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <title>Document</title>
</head>
<body>
<?php
    include './funciones.php';

    if(!isset ($_POST['dep'])){
        echo formulario();
    }elseif(empty ($_POST['dep'])){
        echo formulario();
    }else{
        if(isset($_COOKIE['visor'])){
            echo salida();
        }else{
            echo salida();
        }
        
    }

?>
</body>
</html>