<?php

//AQUI TENIM LES FUNCTIONS QUE CONTROLEN ELS USUARIS
class usuarisController extends Controller
{
    private $_usuario;
    
    public function __construct() {
        parent::__construct();
        $this->_usuario = $this->loadModel('usuaris');
    }
    
	//AQUESTA CLASSE ENS SERVEIX PER VEURE SI EL USUARI ESTA AUTENTIFICAT
    public function index()
    {
		if(Session::get('autenticado')){
        
			$this->_view->usuarios = $this->_usuario->getUsuaris();
			$this->_view->titulo = 'Usuaris';
			$this->_view->renderizar('index', 'usuaris');
		
		}
    }
    
	// ENS SERVEIX PER PODER CREAR UN USUARI NOU
    public function nuevo()
    {
        
        $this->_view->titulo = 'Nou Usuari';
      
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('Nombre')){
                $this->_view->_error = 'Nombre';
                $this->_view->renderizar('nuevo', 'usuaris');
                exit;
            }
            
            if(!$this->getTexto('Apellidos')){
                $this->_view->_error = 'Apellidos';
                $this->_view->renderizar('nuevo', 'usuaris');
                exit;
            }
			
			if(!$this->getTexto('Usuario')){
                $this->_view->_error = 'Usuario';
                $this->_view->renderizar('nuevo', 'usuaris');
                exit;
            }
            
            if(!$this->getTexto('Email')){
                $this->_view->_error = 'Email';
                $this->_view->renderizar('nuevo', 'usuaris');
                exit;
            }
			if(!$this->getTexto('Password')){
                $this->_view->_error = 'Password';
                $this->_view->renderizar('nuevo', 'usuaris');
                exit;
            }
			
            
            $this->_usuario->insertarUsuari(
                    $this->getTexto('Nombre'),
                    $this->getTexto('Apellidos'),
					$this->getTexto('Usuario'),
					$this->getTexto('Email'),
					$this->getTexto('Password')
                    );
            
            $this->redireccionar('usuaris');
        }       
        
        $this->_view->renderizar('nuevo', 'usuaris');
    }
    
	// ENS SERVEIX PER EDITAR ELS USUARIS QUE JA TENIM REGISTRATS
    public function editar($id){
        if(!$this->filtrarInt($id)){
            $this->redireccionar('usuaris');
        }
        
        if(!$this->_usuario->getUsuari($this->filtrarInt($id))){
            $this->redireccionar('usuaris');
        }
        
        $this->_view->titulo = 'Editar Usuari';
        
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('Nombre')){
                $this->_view->_error = 'Nombre';
                $this->_view->renderizar('editar', 'usuaris');
                exit;
            }
            
            if(!$this->getTexto('Apellidos')){
                $this->_view->_error = 'Apellidos';
                $this->_view->renderizar('editar', 'usuaris');
                exit;
            }
			
			if(!$this->getTexto('Usuario')){
                $this->_view->_error = 'Usuario';
                $this->_view->renderizar('editar', 'usuaris');
                exit;
            }
            
            if(!$this->getTexto('Email')){
                $this->_view->_error = 'Email';
                $this->_view->renderizar('editar', 'usuaris');
                exit;
            }
			if(!$this->getTexto('Password')){
                $this->_view->_error = 'Password';
                $this->_view->renderizar('editar', 'usuaris');
                exit;
            }
            
            $this->_usuario->editarUsuari(
                    
					$this->filtrarInt($id),
                    $this->getTexto('Nombre'),
                    $this->getTexto('Apellidos'),
					$this->getTexto('Usuario'),
					$this->getTexto('Email'),
					$this->getTexto('Password')
					
                    );
            
            $this->redireccionar('usuaris');
        }
        
        $this->_view->datos = $this->_usuario->getUsuari($this->filtrarInt($id));
        $this->_view->renderizar('editar', 'usuaris');
    }
    
	
	//ELIMINAR UN USUARI PER EL SEU ID
    public function eliminar($id)
    {
      
        
        if(!$this->filtrarInt($id)){
            $this->redireccionar('usuaris');
        }
        
       
        
        $this->_usuario->eliminarUsuari($this->filtrarInt($id));
        $this->redireccionar('usuaris');
		
		}
    }



?>
