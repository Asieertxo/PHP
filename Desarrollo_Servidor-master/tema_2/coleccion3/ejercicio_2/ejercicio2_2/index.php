<!--2.	Vamos realizar un juego para que los alumnos de primaria estudien los verbos irregulares de Inglés.
El programa mostrará el verbo en español y  tendremos tres caja de texto para teclear las tres formas verbales. 
Existirá un botón para finalizar cuando deseemos.
Cuando finaliza el juego te muestra una estadística de aciertos, fallos, cantidad de preguntas hechas, etc.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
</head>
<body>
    <h1>Irregular verbs</h1>
    <?php
    include ("php/functions.php");
    include ("php/variables.php");

    if(!isset($_POST['next_answer'])){
        printForm(0, 0, 0);
    } else if(isset($_POST['next_answer'])){
        echo count($verbs_array);
        if($_REQUEST['total']<count($verbs_array)){
            printForm($_REQUEST['right'], $_REQUEST['wrong'], $_REQUEST['total']);
        }else printStatistics($_REQUEST['right'], $_REQUEST['wrong'], $_REQUEST['total']);
    } else {
        printStatistics($_REQUEST['right'], $_REQUEST['wrong'], $_REQUEST['total']);
    }
    ?>
</body>
</html>