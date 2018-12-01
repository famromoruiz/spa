<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('HOME', '../');

require __DIR__ . '/../model/database.php';

require __DIR__ . '/../vendor/widgets/route/route.php';
require __DIR__ . '/../vendor/widgets/roles/roles.php';
require __DIR__ . '/../vendor/widgets/gridview/gridview.php';


session_start();

if (empty($_SESSION)) {
    $controller = 'site';
    require __DIR__ . "/../controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    $controller->Login(); 
}else{

    $controller = 'site';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['r']) || $_REQUEST['r'] == '' ){

    require __DIR__ . "/../controller/$controller.controller.php";

    $controller = ucwords($controller) . 'Controller';

    $controller = new $controller;

    require __DIR__ . '/../controller/template.php';

    $controller->Error();    
}else{
    // Obtenemos el controlador que queremos cargar

    $r = explode("/", $_REQUEST['r']);

    $controller = strtolower($r[0]);

    $accion = count($r) > 1 ? $r[1] == '' ? 'Index' : $r[1] : 'Index';

    if ($controller == 'ajax') {
        
    }else{
        require __DIR__ . '/../controller/template.php'; 
    }

        

     require __DIR__ . "/../controller/$controller.controller.php";

    $controller = ucwords($controller) . 'Controller';

    $controller = new $controller;


   

    $acciones = get_class_methods($controller);

    if(in_array(ucwords($accion), $acciones)){

    }else{
        $accion = 'Error';
    }

     call_user_func( array( $controller, $accion ) ); 
 
} 

}

?>