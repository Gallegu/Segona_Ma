<?php

// CLASSE PER INICIAR TOT EL FRAMEWORK
class Bootstrap
{
    public static function run(Request $peticion)
    {
        $controller = $peticion->getControlador() . 'Controller';
        $rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
        $metodo = $peticion->getMetodo();
        $args = $peticion->getArgs();
        
		
		//TENIM UN IF ON CONTROLEM SI LES RUTES ESTAN O NO ESTAN AMB UN IF ELSE.
        if(is_readable($rutaControlador)){
            require_once $rutaControlador;
            $controller = new $controller;
            
            if(is_callable(array($controller, $metodo))){
                $metodo = $peticion->getMetodo();
            }
            else{
                $metodo = 'index';
            }
            
            if(isset($args)){
                call_user_func_array(array($controller, $metodo), $args);
            }
            else{
                call_user_func(array($controller, $metodo));
            }
            
        } else {
			
			//AMB AQUEST ELSE DONAREM LA EXCEPCIO O ERROR PER DIR QUE NO ESTA TROBAT.
            throw new Exception('no encontrado');
        }
    }
}

?>