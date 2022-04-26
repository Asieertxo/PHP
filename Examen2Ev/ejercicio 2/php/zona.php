<?php
require "./conection.php";
$conection = conection();

$sql= "SELECT * FROM `zonas`";
$result = mysqli_query($conection, $sql);

session_start();
$_SESSION['tipo'] = $_POST['tipo'];

echo <<<EOD
    <h2>Elije zona:</h2>
    <form action="./dormitorios.php" method="POST" enctype="multipart/form-data">
        <select id="zona" name="zona">
EOD;
        while($row = mysqli_fetch_assoc($result)){
            echo "<option value=".$row['zona'].">".$row['zona']."</option>";
        }
echo <<<EOD
        </select>
        <input type="submit" name"Siguinete" value="Siguinete" />
    </form>
EOD;

?>