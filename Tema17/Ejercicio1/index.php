<?php
echo "<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>";
echo "<link rel='stylesheet' type='text/css' href='./css/estilos.css'>";

if (file_exists('./xml/movies.xml')){
    $xmlFile = simplexml_load_file("./xml/movies.xml");
}else{
    die ("Error al abrir el archivo XML");
}



echo "<div class='contenedor'>";

echo "<a class='añadir' href='./php/añadir.php'>Añadir +</a>";

echo "<table class='table table-striped'>";
echo "<thead class='thead-dark'><tr>";
    echo "<th><b>ID</b></td>";
    echo "<th>Titulo</td>";
    echo "<th>Genero</td>";
    echo "<th>Director</td>";
    echo "<th>Estreno</td>";
    echo "<th>Pais</td>";
    echo "<th colspan='2'>Opciones</td>";
echo "</tr></thead><tbody>";
    foreach($xmlFile as $movie){
        echo "<tr>";
            echo "<td><b>" . $movie['id'] . "</b></td>";
            echo "<td>" . $movie -> title . "</td>";
            echo "<td>" . $movie -> gender . "</td>";
            echo "<td>" . $movie -> director . "</td>";
            echo "<td>" . $movie -> release . "</td>";
            echo "<td>" . $movie -> country . "</td>";
            echo "<td><a class='mod' href='./php/modificar.php?id=$movie[id]&title=$movie->title&gender=$movie->gender&director=$movie->director&release=$movie->release&country=$movie->country'>Modificar</td>";
            echo "<td><a class='borrar' href='./php/borrar.php?id=$movie[id]&title=$movie->title'>Borrar</td>";
        echo "</tr>";
    }
echo "</tbody></table>";
echo "</div>";

?>