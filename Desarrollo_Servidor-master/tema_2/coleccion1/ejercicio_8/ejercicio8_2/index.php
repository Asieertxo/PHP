<!--Realizar un pequeño programa en el que nos pida un DNI y nos visualiza la letra correspondiente.
Segunda versión:
2)	Un formulario en un html o php y un php que lo procesa-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../../../css/index.css">
</head>

<body>
    <h1>Comprobación DNI</h1>
    <div class="form_div">
        <form action="php/dni.php" method="POST" enctype="application/x-www-form-urlencoded">
            <label for="dni">Introduzca su DNI: </label>
            <input type="text" id="dni" name="dni">
            <input type="submit" name="save">
        </form>
    </div>
    <br><br>
    <button class='bottom-btn'><a href="..">Atrás</a></button>
</body>

</html>