<?php

//Conexion

__construct()
    //atributos usuario, pass y date_offset_get
    $json = file_get_contents("./config.json");
    $json = json_decode($json, true);
    $this->user = $json['user'];

try{
    $this->conn = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->user, $this->pass1);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    $e->getCode() == //1045 -> user o pass // 1049 -> no existe bbdd // 2002 -> no server
}


//class Book exteds Conexion{-------------------------------------------------------------------------------------------------
__construct(){
    //atributos y demas
    parent::__construct();//hay que llamar al padre
}

public function selectBook(){
    try{
        $stmt = $this->conn->prepare("INSERT INTO book (isbn, title) VALUES (:isbn, :title)");
            $stmt->bindParam(':isbn', $this->isbn);
            $stmt->bindParam(':title', $this->title);
        $stmt->execute();
        return $stmt;
    }
}
$result = self::selectBook();
while($registro = $result->fetch(PDO::FETCH_ASSOC)){
    $registro[isbn];
    $registro[title];
}
$result->closeCursor();




//Cookies en la pag inicial----------------------------------------------------------------------------------------------------
if(isset($_GET['cookie'])){//comprobamos si se ha llamado para asignar una cookie
    if($_GET['cookie'] == 'getcookie'){//si es la llamada inicial ponemos el fmulkario
        formulario();
    }elseif($_GET['cookie'] == 'putcookie'){//si ya se ha enviado el fomulario llamamos a funcion
        cookie(
            $color = $_POST['color'];//coge el colo y crea una cookie
            setcookie("color", $color, time()+3600*24*365);
            header();//volvemos a la pagina inicial
        );
    }
}
setColor(//si ya lo ha hecho o no pasa por lo de arriba llega aqui
    isset $_COOKIE['color'];//si hay alguna cookie asigna ese color con style
        $color = $_cookie['color'];
        echo<<<COLR
        style
        COLR;
);//si no habia cookie pues deja el color definidoe en el css




//SESSIONES-------------------------------------------------------------------------------------------------------------------
session_start();
if(isset($_POST['register'])){//compueba si hemos llamado
    formulario();
}
if(!isset($_SESSION['name'])){//sino comprueba si esta la sesion creada
    $login->check(
        //comprueba logueo o lo que sea y si cumple crea la sesion
        $_SESSION['name'] = $this->user;
    );
}
if(isset($_GET['sdestroy'])){//compueba si hemos llamado a cerrar sesion
    $login->logout(session_destroy(););//cerramos la sesion
}
//si ha continuado es que hay una sesion abierta y no se ha cerrado




//XML-------------------------------------------------------------------------------------------------------------------------
if(file_exists('./xml/log.xml')){//comprobar si existe
    $xmlFile = simplexml_load_file('./xml/log.xml');//cargamos el archivo xml
}
function insertinXML(){
    $registro = $xmlFile->books->addChild('book');//crear un hijo en books
    $registro -> addAttribute('ID', $id);//añadir atributos
    $registro -> addChild('isbn', $isbn);//añadir hijo como dato
    file_put_contents("./xml/log.xml", $xmlFile -> asXML());//añadimos los cambios al xml
}
function deleteinXML(){
if file exists
foreach($xmlFile as $books){//recorremos el archivo como libros
    foreach($books as $book){//esa parte de libros en cada uno de los libros
        foreach($book->attributes() as $a => $b){//cogemos los atributos de cada libro
            if($b == $id){//si coincide
                unset($book);//borramos ese libro
                break;
            }
        }
    }
    $i++;
}
file_put_contents("./xml/log.xml", $xmlFile -> asXML());
}




//Figuras---------------------------------------------------------------------------------------------------------------------
//index que selecciona la figura y envia a medidas
//aqui depende que figura enviada pide unos datos y manda a dibujar
//guarda las variables, depende que figura abre esa clase
$figura = new Cuadrado($color, $base, $altura);
echo $figura;

class Cuadrado extends Figuras{
    --contruct(){}
    __toString(){//se ejecuta al crear el objeto
        return//llamamos a un fichero php como imagen
            "texto.....
            <div><img src='./img/img.php?base=$this->base&altura=$this->altura'></div>"
        ;
    }
}

$rgb = hexArgb($color);//function que pasa de hexadecimal a rgb
function hexArgb($hex){
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    return [$r, $g, $b];
}

header("Content-Type: image/png");
$img = imagecreatetruecolor($base+1, $altura+1);//contorno o espacio a pintar
$white = imagecolorallocate($img, 255, 255, 255);//colores
$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, $rgb[0], $rgb[1], $rgb[2]);
imagefill($img, 0, 0, $white);//color de fondo
imagefilledrectangle($img, 0, 0, $base, $altura, $red);//pintar figura
imagerectangle($img, 0, 0, $base, $altura, $red);//marco

imagefilledellipse($img, $radio, $radio, $radio, $radio, $red);//circulos

$puntos = array(0, 0, 0, $altura, $base, $altura);
imagefilledpolygon($img, $puntos, 3, $red);//triangulos o figuras
imagepng($img);//crea la imgamen




//Upload---------------------------------------------------------------------------------------------------------------------
"<input type="file" name="fichero" accept=".txt">Fichero</br>"

if(is_uploaded_file($_FILES['fichero']['tmp_name'])){
    $directorio = '.\ficheros\\';
    $nombre = $_FILES['fichero']['name'];
    $fecha = date('Y-m-d-h-h-s');
    $nombreCompleto = $directorio.$fecha."--".$nombre;
    if(is_dir($directorio)){
        move_uploaded_file ($_FILES['fichero']['tmp_name'],$nombreCompleto);
        echo "Fichero " . $nombreCompleto . " se ha subido correctamente";
    }else{
        echo "Directorio invalido";
        header("refresh:3; url=index.php");
    }
}else{
    echo "No se ha subido bien el fichero";
    header("refresh:3; url=index.php");
}

?>