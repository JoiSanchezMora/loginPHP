<?php
session_start();
include_once 'Model/model.php';
class Controlador{

    public $MODELO;


    public function __construct(){
        $this->MODELO =new Modelo();
    }

    public function index(){
        include_once 'View/login.php';
    }

    public function redirection(){
        $pagina = $_REQUEST['tipo'];
        include_once 'View/'.$pagina.'.php';
    }   

    public function validar(){
        try{
            $inicio = new Modelo();
            $inicio->nickname = $_POST['txtUsuario'];
            $inicio->passw = $_POST['txtPass'];

            $valor = $this->MODELO->validarUsuario($inicio);
            if($valor->conta != 0){
                $valor = $this->MODELO->validarPass($inicio);
                if($valor->conta != 0){
                    $valor = $this->MODELO->validarPersona($inicio);
                    if($valor->conta != 0){
                        $valor = $this->MODELO->validarAdmin($inicio);
                        if($valor->id_tipo != 1){
                            header("Location: index.php?c=redirection&tipo=vendedor");
                        }
                        else{
                            header("Location: index.php?c=redirection&tipo=admin");
                        } 

                        $_SESSION['nickname'] = $valor->nickname;
                        $_SESSION['acceso'] = $valor->id_tipo;
                    }
                    else{
                        $mensaje2 = 'Datos incorrectos';
                        include_once 'View/login.php';
                    }
                }
                else{
                    $mensaje2 = 'Contraseña incorrecta';
                    include_once 'View/login.php';
                }
            }
            else{
                $mensaje = 'No existe el usuario';
                include_once 'View/login.php';
            }
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function salir(){
        session_unset();
        session_destroy();
        $this->index();

        exit();
    }
}

?>