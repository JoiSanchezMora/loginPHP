<?php

include_once 'Controller/controller.php';
$control = new Controlador();

    try{
        if(!isset($_SESSION['acceso'])){
            $control->index();
            exit();
        }
        if($_SESSION['nickname']=='admin'){
                header("Location: index.php?c=redirection&tipo=admin");
        }
        if($_SESSION['nickname']=='vendedor'){
                header("Location: index.php?c=redirection&tipo=vendedor");
        }
        
    }
    catch(Exception $e){
        die($e->getMessage());
    }
    
?>