<?php
    require_once('DAO/conexion.php');
    require_once('Controller/vehiculoController.php');

    $controller= new vehiculoController();
    
    if(!empty($_REQUEST['m'])){
        $metodo=$_REQUEST['m'];
        if (method_exists($controller, $metodo)) {
            $controller->$metodo();
        }else{
            $controller->index();
        }
    }else{
        $controller->index();
    }




?>