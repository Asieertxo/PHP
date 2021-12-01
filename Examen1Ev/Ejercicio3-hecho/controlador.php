<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if($_GET['enviar'] == "login"){
        header("Location: ./login.php");
    }elseif($_GET['enviar'] == "registro"){
        header("Location: ./registro.php");
    }else{
        header("Location: ./error.php");
        var_dump($_POST['enviar']);
    }

?>
</body>
</html>