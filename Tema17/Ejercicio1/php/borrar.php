<?php
echo "<link rel='stylesheet' type='text/css' href='./../css/estilos.css'>";

if (isset($_POST['delete'])){
    $xmlFile = simplexml_load_file("./../xml/movies.xml");

    $id = $_POST['id'];

    $position = 0;
    $i = 0;

    foreach($xmlFile as $movie){
        if($movie['id'] == $id){
            $position = $i;
            break;
        }
        $i++;
    }

    unset($xmlFile->movie[$position]);
    file_put_contents("./../xml/movies.xml", $xmlFile -> asXML());

    echo "Borrado...";
    header( "refresh:5; url=./../index.php" );

}elseif(isset($_POST['nodelete'])){
    header( "refresh:0.1; url=./../index.php" );
}else{
    echo fomulario();
}



function fomulario(){
    $id = $_GET['id'];
    $title = $_GET['title'];

    echo<<<EOD
    <div class='contenedor'>
        Seguro que quiere borrar la pelicula $title ?
        <form action="./borrar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value={$id}>
            <input type="submit" name="delete" value="SI"/>
            <input type="submit" name="nodelete" value="NO"/>
        </form>
    </div>
EOD;
}

?>