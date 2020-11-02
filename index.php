<?php
include_once 'Controller/controller.php';
include_once 'Config/conection.php';
$control = new Controlador();

try{
    if(!isset($_REQUEST['c'])){
        $control->index();
    }
    else{
        $action=$_REQUEST['c'];
        call_user_func(array($control, $action));

    }
}
catch(Exception $e){
    die('Error : '.$e->getMessage());
}

?>