<?php
/*
EL EXAMEN NO ESTA HECHO CON PDO, ENTIENDO QUE RESTE ALGO POR NO USARLO, PERO CREO QUE ALGO PODRIA CONTAR
*/

function crearConexion(){
    $SERVERNAME = "localhost";
    $USERNAME = "root";
    $PASSWORD = "";
    $DBNAME = "proyecto";

    //Crear conexion, le pongo @ ya que despues compruebo si la conexion se ha realizaqdo bien
    @$conection = mysqli_connect($SERVERNAME, $USERNAME, $PASSWORD, $DBNAME);


    //Comprobar la conexion la conexion
    if (!$conection) {
        echo "<h1 class='rojo'>Error de conexion: </h1>" . mysqli_connect_error();
        die();
    }else{
        echo "<p class='verde'>Conexion satisfactoria</p>";
    }

    return $conection;
}


function closeconection($conection){
    mysqli_close($conection);
}

/*class conexion {
    private $password = "";
    private $user = "root";
    private $dsn = 'mysql:host=localhost;port=DBPORT;dbname=proyecto';
    private $connection;

    public function __construct()
    {
        $this->password = $this->password;
        $this->user = $this->user;
        $this->dsn = "$this->DBType:host=$this->host;dbname=$this->DBName";
        $this->db = "$this->DBType:host=$this->host";
    }

    public function crearConexion(){
        try{
            $connection = new PDO($this->dsn, $this->username, $this->password);
            echo "conectado";
            return $this->connection = $connection; 
        }catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
    
}*/




    

?>