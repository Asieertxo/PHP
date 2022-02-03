<?php
echo "<link rel='stylesheet' type='text/css' href='./../css/estilos.css'>";

if (isset($_POST['update'])){
    $xmlFile = simplexml_load_file("./../xml/movies.xml");

    foreach($xmlFile as $movie){
		if($movie['id'] == $_POST['id']){
			$movie->title = $_POST['title'];
            $movie->gender = $_POST['gender'];
            $movie->director = $_POST['director'];
            $movie->release = $_POST['release'];
            $movie->country = $_POST['country'];
			break;
        }
    }

    file_put_contents("./../xml/movies.xml", $xmlFile -> asXML());
    echo "Cambiado...";
    header( "refresh:5; url=./../index.php" );
}else{
    echo formulario();
}




function formulario(){

    $id = $_GET['id'];
    $title = $_GET['title'];
    $gender = $_GET['gender'];
    $director = $_GET['director'];
    $release = $_GET['release'];
    $country = $_GET['country'];

    echo<<<EOD
    <div class='contenedor'>
        <form action="./modificar.php" method="POST" enctype="multipart/form-data">
            <p>Pon los datos de la pelicula a cambiar con ID: $id</p>

            <input type="hidden" name="id" value={$id}>
            <input type="text" name="title" value={$title} placeholder={$title}>
            <input type="text" name="gender" value={$gender} placeholder={$gender}>
            <input type="text" name="director" value={$director} placeholder={$director}>
            <input type="number" name="release" value={$release} placeholder={$release}>
            <input type="text" name="country" value={$country} placeholder={$country}>
            <input type="submit" name="update" value="UPDATE"/>
        </form>
        <a class='boton' href='./../index.php'>Atras</a>
    </div>
EOD;
}

?>