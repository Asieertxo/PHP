<?php
echo "<link rel='stylesheet' type='text/css' href='./../css/estilos.css'>";

if (isset($_POST['insert'])){
    $xmlFile = simplexml_load_file("./../xml/movies.xml");
    
    $id= ultimoID();
    $movie = $xmlFile -> addChild('movie');

    $movie -> addAttribute('id', $id);

    $movie -> addChild('title', $_POST['title']);
    $movie -> addChild('gender', $_POST['gender']);
    $movie -> addChild('director', $_POST['director']);
    $movie -> addChild('release', $_POST['release']);
    $movie -> addChild('country', $_POST['country']);

    file_put_contents("./../xml/movies.xml", $xmlFile -> asXML());
    echo "Añadido...";
    header( "refresh:5; url=./../index.php" );
}else{
    echo formulario();
}




function formulario(){
    echo<<<EOD
    <div class='contenedor'>
        <form action="./añadir.php" method="POST" enctype="multipart/form-data">
            <p>Pon los datos de la pelicula a subir</p>
            <input type="text" name="title" placeholder="Titulo"/>
            <input type="text" name="gender" placeholder="Genero"/>
            <input type="text" name="director" placeholder="Director"/>
            <input type="number" name="release" placeholder="Estreno"/>
            <input type="text" name="country" placeholder="Pais"/>
            <input type="submit" name="insert" value="INSERT"/>
        </form>
        <a class='boton' href='./../index.php'>Atras</a>
    </div>
EOD;
}




function ultimoID(){
    $id=
    $xmlFile = simplexml_load_file("./../xml/movies.xml");
    foreach($xmlFile as $movie){
        $id = $id + 1;
    }
    $id = $id + 1;

    return $id;
}
?>