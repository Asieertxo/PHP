<?php

class DBConnection {
    private $password;
    private $user;
    private $db;
    private $dsn;
    private $connection;

    public function __construct($configFile)
    {
        $config = json_decode(file_get_contents($configFile));
        $this->password = $config->password;
        $this->user = $config->user;
        $this->dsn = "$config->DBType:host=$config->host;dbname=$config->DBName";
        $this->db = "$config->DBType:host=$config->host";
    }

    public function connect(){
        try{
            $connection = new PDO($this->dsn, $this->user, $this->password);

            //echo "Éxito";

            return $this->connection = $connection; 

        } catch (PDOException $error){

            echo "Creando nueva bbdd";
            echo "<br>";

            $con = new PDO($this->db, $this->user, $this->password);

            $bd = file("../sql/tablas.txt");

            $str = "";

            $newBd = [];

            foreach($bd as $sentence){
                if(substr($sentence, 0, 9) === '$query = ') $str .= ltrim(substr($sentence, 10));
                else if(substr($sentence, 0, 20) === '$insert_productos = ') $str .= ltrim(substr($sentence, 21));
                else if(substr($sentence, 0, 1) === "<" || strlen(trim($sentence)) === 0) continue;
                else if(substr(trim($sentence), -1) !== ";")$str .= trim($sentence);
                else {        
                    $str .= str_replace("'", "", trim($sentence));
                    array_push($newBd, $str);
                    $str = "";
                }
            }

            $con->exec('CREATE DATABASE IF NOT EXISTS ecommerce');
            $con->exec('USE ecommerce');

            foreach($newBd as $sentence){
                $con->prepare($sentence);
                $con->exec($sentence);
            }

            return $this->connection = $con;

        }
    }

    public function close(){
        return $this->connection = null;
    }
}

?>