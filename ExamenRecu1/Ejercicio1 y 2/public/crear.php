<?php

require "./../class/conection.php";
$conection = crearConexion();

if(!isset($_POST['insert'])){
    echo formulario($conection);
}else{
    $sql= "SELECT * FROM `productos`";
    $result = mysqli_query($conection, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        if($row['nombre_corto'] == $_POST['nombre_corto']){
            echo "El articulo ya esta en la bbdd";
            echo "<br><a href='./listado.php'>Atras</a>";
            die();
        }
    }
    $sql=   "INSERT INTO `productos` (`nombre`, `nombre_corto`, `descripcion`, `pvp`, `familia`) VALUES ('{$_POST['nombre']}','{$_POST['nombre_corto']}','{$_POST['descripcion']}','{$_POST['pvp']}','{$_POST['familia']}')";
    if (mysqli_query($conection, $sql)) {
        echo "Se ha subido correctamente el prodcuto con nombre: " . $_POST['nombre'];
        echo "<br><a href='./listado.php'>Atras</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conection);
        echo "<br><a href='./listado.php'>Atras</a>";
    }
}





function formulario($conection){
    $sql= "SELECT * FROM `productos`";
    $tipo = mysqli_query($conection, $sql);

    echo<<<EOD
    <div>
        <h2>Sube un producto</h2></br>
        <form action="./crear.php?insert=yes" method="POST" enctype="multipart/form-data">
            <p>Pon los datos del producto para subir</p>
            <input type="text" name="nombre" placeholder="nombre"/>
            <input type="text" name="nombre_corto" placeholder="nombre_corto"/>
            <input type="text" name="descripcion" placeholder="descripcion"/>
            <input type="number" name="pvp" placeholder="pvp"/>
            <select name="familia">
EOD;
                while($row = mysqli_fetch_assoc($tipo)){
                    echo "<option value=".$row['familia'].">".$row['familia']."</option>";
                }
echo <<<EOD
            </select>
            <input type="submit" name="insert" value="INSERT"/>
        </form>
    </div>
EOD;
}
?>