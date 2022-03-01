<?php
require "./conection.php";
$conection = conection();

session_start();

$tipo = $_SESSION['tipo'];
$zona = $_SESSION['zona'];
$dormitorios = $_SESSION['dormitorios'];
$precio = $_SESSION['precio'];
if(isset ($_POST['jardin'])){
    $jardin = "si";
}else{
    $jardin = "no";
}
if(isset ($_POST['piscina'])){
    $piscina = "si";
}else{
    $piscina = "no";
}
if(isset ($_POST['zonascomunes'])){
    $zonascomunes = "si";
}else{
    $zonascomunes = "no";
}
if(isset ($_POST['garage'])){
    $garage = "si";
}else{
    $garage = "no";
}
if(isset ($_POST['padel'])){
    $padel = "si";
}else{
    $padel = "no";
}

$sql= "SELECT * FROM `viviendas` WHERE tipo='$tipo' AND zona='$zona' AND dormitorios='$dormitorios' AND jardin='$jardin' AND piscina='$piscina' AND zonascomunes='$zonascomunes' AND garage='$garage' AND padel='$padel'";
$result = mysqli_query($conection, $sql);


echo "<table>";
echo "<tr>";
    echo "<td>Tipo</td>";
    echo "<td>Zona</td>";
    echo "<td>Dormitorios</td>";
    echo "<td>Precio</td>";
    echo "<td>Jardin</td>";
    echo "<td>Piscina</td>";
    echo "<td>Zonas Comunes</td>";
    echo "<td>Garaje</td>";
    echo "<td>Padel</td>";
    echo "<td>Foto</td>";
    echo "<td>Comprar</td>";
echo "</tr>";
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
        echo "<td>".$row['tipo']."</td>";
        echo "<td>".$row['zona']."</td>";
        echo "<td>".$row['dormitorios']."</td>";
        echo "<td>".$row['precio']."</td>";
        echo "<td>".$row['jardin']."</td>";
        echo "<td>".$row['piscina']."</td>";
        echo "<td>".$row['zonascomunes']."</td>";
        echo "<td>".$row['garage']."</td>";
        echo "<td>".$row['padel']."</td>";
        echo "<td><img src=".$row['imagen']."></td>";
        echo "<td><a href='./comprar.php'>Comprar</a></td>";
    echo "</tr>";
}

echo "</table>"

?>