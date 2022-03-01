<?php
require "./conection.php";
$conection = conection();

$sql= "SELECT * FROM `usuarios`";
$result = mysqli_query($conection, $sql);

while($row = mysqli_fetch_assoc($result)){
    if($row['nombreUser'] == $_POST['user']  &&  $row['pass'] == $_POST['pass']){
        echo "Validado";
        header("refresh:2; url=./tipo.php");
    }
}


?>