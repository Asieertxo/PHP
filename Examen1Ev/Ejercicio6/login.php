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
    $nombres = array('Raul Ayuso', 'Ana Romeu', 'Carlos Diaz', 'Ricardo Ruiz','Jaime Mantilla','Monica Garcia','Belen Diaz', 'Esther Abad');
    $departs = array('10', '20', '30');
    
    if(!isset ($_POST['dep'])){
        echo login();
    }elseif(empty ($_POST['dep'])){
        echo login();
    }else{
        foreach($nombres as $n){
            foreach($departs as $d){
                if($_POST['empleado'] == $n && $_POST['dep'] == $d){
                    header("Location: ./listado.php");
                }
            }
        }
    }
        /*($_POST['empleado'] == 'empleado' && $_POST['dep'] == 4){
        if(isset($_COOKIE['visor'])){
            header("Location: ./listado.php");
        }else{
            header("Location: ./listado.php");
        }
        
    }*/

?>
</body>
</html>