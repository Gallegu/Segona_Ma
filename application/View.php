<?php
//AMB EL VIEW TINDREM LES ORGANITZACIONS DE LES VISTES
class View
{
    private $_controlador;
    
    
    public function __construct(Request $peticion) {
        $this->_controlador = $peticion->getControlador();
        
    }
    
	//AMB LA FUNCIO RENDERITZAR TINDREM EL MENU
    public function renderizar($vista, $item = false)
    {
        $menu = array(
            array(
                'id' => 'inicio',
                'titulo' => 'Inici',
                'enlace' => BASE_URL
                ),
        );
    // SEMPRE QUE ENTREM AL FRAMEWORK ENS SORTIRA AL MENU LA OPCIO DE INICI , I SEGONS SI ESTEM LOGUEJATS O NO LES DEMES.
	
	//EN EL CAS DE ESTAR LOGUEJATS:
        if(Session::get('autenticado')){
			
			$menu[] = array(
                'id' => 'anuncis',
                'titulo' => 'Anuncis',
                'enlace' => BASE_URL . 'anuncis'
                );
				
            $menu[] = array(
                'id' => 'login',
                'titulo' => 'Disconect',
                'enlace' => BASE_URL . 'login/cerrar'
                );
				 
			$menu[] = array(
                'id' => 'Usuarios',
                'titulo' => 'Usuaris',
                'enlace' => BASE_URL . 'Usuaris'
                );
			
			
        }else{
			
			//EN EL CAS DE NO ESTAR LOGUEJATS
			$menu[] = array(
                'id' => 'anuncis',
                'titulo' => 'Anuncis',
                'enlace' => BASE_URL . 'anuncis'
                );
				
            $menu[] = array(
                'id' => 'login',
                'titulo' => 'Login',
                'enlace' => BASE_URL . 'login'
                );
            
            $menu[] = array(
                'id' => 'registro',
                'titulo' => 'Register',
                'enlace' => BASE_URL . 'registro'
                );
        }
        
       
        // SERVEIX PER MARCAR LES RUTES DE LES IMATGES I FER SERVIR LES VARIABLES A DINS DELS HTML
        $_layoutParams = array(
            'ruta_css' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/css/',
            'ruta_img' => BASE_URL . 'views/layout/' . DEFAULT_LAYOUT . '/img/',
            
            'menu' => $menu
           
        );
        
        $rutaView = ROOT . 'views' . DS . $this->_controlador . DS . $vista . '.php';
        
        if(is_readable($rutaView)){
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header.php';
            include_once $rutaView;
            include_once ROOT . 'views'. DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer.php';
        } 
        else {
            throw new Exception('Error de vista');
        }
    }
    
    
}

?>
