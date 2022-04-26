<?php
require "./conection.php";
$conection = conection();

session_start();
$_SESSION['dormitorios'] = $_POST['dormitorios'];
$_SESSION['precio'] = $_POST['precio'];

echo <<<EOD
    <h2>Elije extras:</h2>
    <form action="./resultado.php" method="POST" enctype="multipart/form-data">
        <input type="checkbox" id="extras" name="jardin" value="jardin" /><label>jardin</label>
        <input type="checkbox" id="extras" name="piscina" value="piscina" /><label>piscina</label>
        <input type="checkbox" id="extras" name="zonascomunes" value="zonascomunes" /><label>zonascomunes</label>
        <input type="checkbox" id="extras" name="garage" value="garage" /><label>garaje</label>
        <input type="checkbox" id="extras" name="padel" value="padel" /><label>padel</label>

        </br>
        <input type="submit" name"Siguinete" value="Siguinete" />
    </form>
EOD;

?>