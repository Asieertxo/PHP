<?php
include __DIR__ .  "/../vendor/autoload.php";
echo "<link rel='stylesheet' type='text/css' href='./estilos.css'>";//importar css


//comprobamos que no se esta realizando ninguna accion con los datos, si no se esta haciendo nada mostramos el formulario inicial
if (!isset ($_POST['subir']) && !isset ($_POST['ver']) && !isset ($_POST['mod']) && !isset ($_POST['del']) &&
    !isset ($_GET['pag']) && !isset ($_POST['insert']) && !isset ($_POST['update']) && !isset ($_POST['delete'])){

    echo formulario();
}else{
    //sino vemos si se ha dado a algun boton principal
    if(isset ($_POST['ver'])){
        $ver_libros = new \lic\VerLibros\VerLibros();
        $ver_libros->verlibros();

    }elseif(isset ($_POST['subir'])){
        $subir_libros = new \lic\SubirLibros\SubirLibros();
        $subir_libros->subirlibros();

    }elseif(isset ($_POST['mod'])){
        $mod_libros = new \lic\ModLibros\ModLibros();
        $mod_libros->modlibros();
    }elseif(isset ($_POST['del'])){
        $delete_libros = new \lic\DeleteLibros\DeleteLibros();
        $delete_libros->deletelibros();
    }
}




//hacer SELECT en la base de datos
if(isset($_GET['pag'])){
    $ver_libros = new \lic\VerLibros\VerLibros();
    $ver_libros->verlibros();
}
//hacer INSERT en la base de datos
if(isset ($_POST['insert'])){
    $subir_libros = new \lic\SubirLibros\SubirLibros();
    $subir_libros->subirlibros();
}
//hacer UPDATE en la base de datos
if(isset ($_POST['update'])){
    $mod_libros = new \lic\ModLibros\ModLibros();
    $mod_libros->modlibros();
}
//hacer DELETE en la base de datos
if(isset ($_POST['delete'])){
    $delete_libros = new \lic\DeleteLibros\DeleteLibros();
    $delete_libros->deletelibros();
}












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