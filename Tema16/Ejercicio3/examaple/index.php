<?php
include __DIR__ .  "/../vendor/autoload.php";
echo "<link rel='stylesheet' type='text/css' href='./estilos.css'>";//importar css
include "./../src/Connection.php";

$conection = conection();

//comprobamos que no se esta realizando ninguna accion con los datos, si no se esta haciendo nada mostramos el formulario inicial
if (!isset ($_POST['subir']) && !isset ($_POST['ver']) && !isset ($_POST['mod']) && !isset ($_POST['del']) &&
    !isset ($_GET['pag']) && !isset ($_POST['insert']) && !isset ($_POST['update']) && !isset ($_POST['delete']) && !isset ($_GET['update']) && !isset ($_GET['delete'])){

    echo formulario(); 
    
}else{
    //sino vemos si se ha dado a algun boton principal
    if(isset ($_POST['ver']) || (isset($_GET['pag']))){
        $ver_libros = new \lic\VerLibros\VerLibros();
        $ver_libros->verlibros($conection);

    }elseif(isset ($_POST['subir']) || (isset ($_POST['insert']))){
        $subir_libros = new \lic\SubirLibros\SubirLibros();
        $subir_libros->subirlibros($conection);

    }elseif(isset ($_POST['mod']) || (isset ($_POST['update'])) || (isset ($_GET['update']))){
        $mod_libros = new \lic\ModLibros\ModLibros();
        $mod_libros->modlibros($conection);
        
    }elseif(isset ($_POST['del']) || (isset ($_POST['delete'])) || (isset ($_GET['delete']))){
        $delete_libros = new \lic\DeleteLibros\DeleteLibros();
        $delete_libros->deletelibros($conection);
    }
}

closeconection($conection);







function formulario(){
    echo<<<EOD
    <div class='contenedor'>
        <h2>Elije Opciones</h2></br>
        <form action="." method="POST" enctype="multipart/form-data">
            <input type="submit" name="subir" value="Subir Libro"/>
            <input type="submit" name="ver" value="Ver Libros"/>
            <input type="submit" name="mod" value="Modificar Libro"/>
            <input type="submit" name="del" value="Borrar Libro"/>
        </form>
    </div>
EOD;
}

?>