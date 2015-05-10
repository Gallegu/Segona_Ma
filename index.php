<?php

// AQUI ES ON DEFINIM ELS REQUIRES, I ELS REQUIRES ONCE QUE ENS SERVEIXEN PER TOTES LES CLASSES PERQUE NOMES TINGUEM QUE TINDRAU A UN LLOC DETERMINAT EN COMPTES DE FICAR-HO A TOT ARREGU AMB REQUIRES NORMALS
ini_set('display_errors', 'on');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('APP_PATH', ROOT . 'application' . DS);

try{
    require_once APP_PATH . 'Config.php';
    require_once APP_PATH . 'Request.php';
    require_once APP_PATH . 'Bootstrap.php';
    require_once APP_PATH . 'Controller.php';
    require_once APP_PATH . 'Model.php';
    require_once APP_PATH . 'View.php';
    require_once APP_PATH . 'Database.php';
    require_once APP_PATH . 'Session.php';
    

    
    Session::init();
	
	$r = new Request();
	
    Bootstrap::run(new Request);
}
catch(Exception $e){
    echo $e->getMessage();
}

?>