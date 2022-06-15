<?php

class Usuario{
    public $user;
    public $pass;
    public $usuario_completo;
    public $xmlFile;

    public function __construct($user, $pass){
        $this->user = $user;
        $this->pass = $pass;
        if(file_exists('./xml/usuarios.xml')){
            $this->xmlFile = simplexml_load_file('./xml/usuarios.xml');
        }else{
            echo "FalloXML";
        }
    }

    public function UserExists(){
        foreach($this->xmlFile as $usuario){
            if($usuario->nombreUser == $this->user){
                foreach($usuario->attributes() as $a => $b){
                    if($b == $this->pass){
                        $this->usuario_completo = $usuario;
                        return $usuario;
                        break;
                    }else{
                        return null;
                    }
                }
            }
        }
    }
}

?>