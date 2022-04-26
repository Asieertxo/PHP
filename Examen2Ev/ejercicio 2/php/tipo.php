<?php
require "./conection.php";
$conection = conection();

$sql= "SELECT * FROM `tipos`";
$result = mysqli_query($conection, $sql);


echo <<<EOD
    <h2>Elije tipo:</h2>
    <form action="./zona.php" method="POST" enctype="multipart/form-data">
        <select id="tipo" name="tipo">
EOD;
        while($row = mysqli_fetch_assoc($result)){
            echo "<option value=".$row['tipo'].">".$row['tipo']."</option>";
        }
echo <<<EOD
        </select>
        <input type="submit" name"Siguinete" value="Siguinete" />
    </form>
EOD;

?>