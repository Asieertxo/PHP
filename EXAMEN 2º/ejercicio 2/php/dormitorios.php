<?php
require "./conection.php";
$conection = conection();

session_start();
$_SESSION['zona'] = $_POST['zona'];


echo <<<EOD
    <h2>Elije zona:</h2>
    <form action="./extras.php" method="POST" enctype="multipart/form-data">
        <p>Dormitorios:</p>
            <input type="radio" id="dormitorios" name="dormitorios" value="1" /><label>1</label>
            <input type="radio" id="dormitorios" name="dormitorios" value="2" /><label>2</label>
            <input type="radio" id="dormitorios" name="dormitorios" value="3" /><label>3</label>
            <input type="radio" id="dormitorios" name="dormitorios" value="4" /><label>4</label>
            <input type="radio" id="dormitorios" name="dormitorios" value="5" /><label>5</label>
        <p>Precio:</p>
            <input type="radio" id="precio" name="precio" value="<100.000" /><label><100.000</label>
            <input type="radio" id="precio" name="precio" value="100.000-200.000" /><label>100.000-200.000</label>
            <input type="radio" id="precio" name="precio" value="200.000-300.000" /><label>200.000-300.000</label>
            <input type="radio" id="precio" name="precio" value=">300.000" /><label>300.000</label>

        </br>
        <input type="submit" name"Siguinete" value="Siguinete" />
    </form>
EOD;

?>