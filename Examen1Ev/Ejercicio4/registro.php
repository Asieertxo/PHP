<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(!isset ($_POST['nombre']) || !isset ($_POST['posicion']) || !isset ($_POST['dep']) || !isset ($_POST['color'])){
    echo formulario();
}elseif(empty ($_POST['nombre']) || empty ($_POST['posicion']) || empty ($_POST['dep']) || empty ($_POST['color'])){
    echo formulario();
}else{
    $nombre = $_POST['nombre'];
    global $color;
    $color = $_POST['color'];
    //echo añadir();
    header("Location: ./crearimagen.php?nombre=$nombre");
}








function formulario(){
echo<<<EOD
   <h1>Registrate</h1>
    <form action="./registro.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="id" placeholder="ID">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="posicion" placeholder="Posicion">
        <input type="number" name="dep" placeholder="Departamento">
        <label>Color: </label>
        <input type="color" name="color"></br>

        <input type="submit" name="enviar" value="enviar"/>
    </form>
EOD;
}

function añadir(){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $posicion = $_POST['posicion'];
    $dep = $_POST['dep'];
    $empleado = "'".$id."'"."= array ("."'nombre'=> '".$nombre."', 'posicion'=> '".$posicion."', 'depno'=> '".$dep;

    $fichero = "./../JSON/empleados.json";
    $actual = file_get_contents($fichero);
    $actual .= $empleado;


    file_put_contents("./../JSON/empleados.json", $actual);
}
?>    
</body>
</html>