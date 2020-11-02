<?php

class Modelo{

    public $conect;
    public $nickname;
    public $passw;
    public $nombre;
    public $apellido;

    public function __construct(){
        try{
            $this->conect = Conexion::conectar();
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function validarUsuario($data){
        try{
            $query="SELECT COUNT(*) conta FROM usuario WHERE nickname=?";
            $prep = $this->conect->prepare($query);
            $prep->execute(array($data->nickname));
            return $prep->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function validarPass($data){
        try{
            $query="SELECT COUNT(*) conta FROM usuario WHERE passw=?";
            $prep = $this->conect->prepare($query);
            $prep->execute(array($data->passw));
            return $prep->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function validarPersona($data){
        try{
            $query="SELECT COUNT(*) conta FROM usuario WHERE nickname=? AND passw=?";
            $prep = $this->conect->prepare($query);
            $prep->execute(array($data->nickname, $data->passw));
            return $prep->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function validarAdmin($data){
        try{
            $query="SELECT id_tipo, nickname FROM usuario WHERE nickname=?";
            $prep = $this->conect->prepare($query);
            $prep->execute(array($data->nickname));
            return $prep->fetch(PDO::FETCH_OBJ);
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    
}

?>