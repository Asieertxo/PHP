<?php

function formInsertBook(){
    if(!isset($_POST['isbn']) || !isset($_POST['title']) || !isset($_POST['author']) || !isset($_POST['stock']) || !isset($_POST['price'])){
        echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./index.php?boton=insert" method="POST" enctype="multipart/form-data">
                    <p>Pon los datos del libro para subir</p>
                    <input type="number" name="isbn" placeholder="Isbn"/>
                    <input type="text" name="title" placeholder="Title"/>
                    <input type="text" name="author" placeholder="Author"/>
                    <input type="number" name="stock" placeholder="Strock"/>
                    <input type="number" name="price" placeholder="Price"/>
                    <input type="submit" name="insert" value="INSERT"/>
                </form>
            </div>
        EOD;
    }else{
        $book = new Book($_POST['isbn'], $_POST['title'], $_POST['author'], $_POST['stock'], $_POST['price']);
        $book->insertBook();
        header("Refresh:3; url=index.php");
    }
}

function formUpdateBook(){
    $book = new Book(null, null, null, null, null);
    if(!isset($_GET['update'])){
        $id = $_GET['id'];
        $result = $book->selectByID($id);
        $result = $result->fetch(PDO::FETCH_ASSOC);

        echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./index.php?boton=update&update=$result[id]" method="POST" enctype="multipart/form-data">
                    <p>Pon los datos del libro para modificar</p>
                    <input type="hidden" name="id" value="$result[id]"/>
                    <input type="number" name="isbn" value="$result[isbn]"/>
                    <input type="text" name="title" value="$result[title]"/>
                    <input type="text" name="author" value="$result[author]"/>
                    <input type="number" name="stock" value="$result[stock]"/>
                    <input type="number" name="price" value="$result[price]"/>
                    <input type="submit" name="update" value="UPDATE"/>
                </form>
            </div>
        EOD;
    }else{
        $id = $_GET['update'];
        $book = new Book($_POST['isbn'], $_POST['title'], $_POST['author'], $_POST['stock'], $_POST['price']);
        $book->updateBook($id);
        header("Refresh:3; url=index.php");
    }
}

function loginform(){
    echo<<<EOD
        <div class='contenedor'>
            <h2>Elije Opciones</h2></br>
            <form action="./index.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="user" placeholder="usuario"/>
                <input type="password" name="pass" placeholder="contraseña"/>
                <input type="submit" name="enter" value="login"/><br><br>
                <input type="submit" name="invitado" value="Entrar como invitado"/>
                <input type="submit" name="register" value="Registrarse"/>
            </form>
        </div>
    EOD;
}

function registerform(){
    /*Si estan todas las variables almacenadas va a la parte de subirlo a la bbdd,
    sino comprueba si se ha puesto la contraseña en el 1º fomulario y no en el 2º, si no esta muestra el formulario completo, si esta y no esta vacia muestra el de comprobar*/
    if(!isset($_POST['user']) || !isset($_POST['email']) || !isset($_POST['sex']) || !isset($_POST['birthday']) || !isset($_POST['pass']) || !isset($_POST['pass2'])){
        if(!isset($_POST['pass2']) && isset($_POST['pass']) && !empty($_POST['pass'])){
            $user = $_POST['user'];
            $email = $_POST['email'];
            $sex = $_POST['sex'];
            $birthday = $_POST['birthday'];
            $pass = $_POST['pass'];

            registerform2();
            die();
        }else{
            registerform1();
            die();
        }
    }else{
        if($_POST['pass'] == $_POST['pass2']){
            $login = new Login($_POST['user'], $_POST['email'], $_POST['sex'], $_POST['birthday'], $_POST['pass']);
            $login->insertUser();
            header("Refresh:3; url=index.php");
        }else{
            echo "Las contraseñas no coinciden";
            header("Refresh:3; url=index.php");
        }
        
    }


    function registerform1(){
        echo<<<EOD
            <div class='contenedor'>
                <h2>Elije Opciones</h2></br>
                <form action="./index.php?register=register" method="POST" enctype="multipart/form-data">
                    <input type="text" name="user" placeholder="usuario"/>
                    <input type="email" name="email" placeholder="email"/>
                    <select name="sex">
                        <option value="hombre" selected>Hombre</option>
                        <option value="mujer">Mujer</option>
                    </select>
                    <input type="date" name="birthday""/>
                    <input type="password" name="pass" placeholder="contraseña"/>
                    <input type="submit" name="register" value="Registrarse"/>
                </form>
                <a href= './index.php'>Atras</a>
            </div>
        EOD;
    }

    function registerform2(){
        echo<<<EOD
            <div class='contenedor'>
                <h2>Repite la contraseña</h2></br>
                <form action="./index.php?register=register" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="user" value="$user"/>
                <input type="hidden" name="email" value="$email"/>
                <input type="hidden" name="sex" value="$sex"/>
                <input type="hidden" name="birthday" value="$birthday"/>
                <input type="hidden" name="pass" value="$pass"/>
                    <input type="password" name="pass2" placeholder="contraseña"/>
                    <input type="submit" name="register" value="Registrarse"/>
                </form>
                <a href= './index.php'>Atras</a>
            </div>
        EOD;
    }
}

?>