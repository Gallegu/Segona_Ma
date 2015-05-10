<?php

//AQUI S'ENCARREGA DE TENIR ELS REGISTRES DE USUARIS,  DE MANERA VALIDA, SI NO FUNCIONA QUALSEVOL REGISTRE PODEM DONAR UN MISSATGE DE ERROR PER IDENTIFICAR ON TENIM EL PROBLEMA
class registroController extends Controller
{
    private $_registro;
    
    public function __construct() {
        parent::__construct();
        
        $this->_registro = $this->loadModel('registro');
    }
    
    public function index()
    {
        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        
        $this->_view->titulo = 'Registro';
        
        if($this->getInt('enviar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getSql('nombre')){
                $this->_view->_error = 'Introduir el Nom';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if(!$this->getAlphaNum('usuario')){
                $this->_view->_error = 'Nom usuari';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if($this->_registro->verificarUsuario($this->getAlphaNum('usuario'))){
                $this->_view->_error = 'El usuario ' . $this->getAlphaNum('usuario') . ' ya existe';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if(!$this->validarEmail($this->getPostParam('email'))){
                $this->_view->_error = 'La direccion de email es inv&aacute;lida';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if($this->_registro->verificarEmail($this->getPostParam('email'))){
                $this->_view->_error = 'Esta direccion de correo ya esta registrada';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if(!$this->getSql('pass')){
                $this->_view->_error = 'Debe introducir su password';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
            if($this->getPostParam('pass') != $this->getPostParam('confirmar')){
                $this->_view->_error = 'Los passwords no coinciden';
                $this->_view->renderizar('index', 'registro');
                exit;
            }
            
			$this->getLibrary('class.phpmailer');
			$mail = new PHPMailer();
			
            $this->_registro->registrarUsuario(
                    $this->getSql('nombre'),
					$this->getSql('apellido'),
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass'),
                    $this->getPostParam('email')
                    );
            
			$usuario = $this->_registro->verificarUsuario($this->getAlphaNum('usuario'));
			
            if(!$usuario){
                $this->_view->_error = 'Error al registrar el usuario';
                $this->_view->renderizar('index', 'registro');
                exit;
            }else{
				
				header("Location:index.php");
			
			}
			
        }        
        
        $this->_view->renderizar('index', 'registro');
		
		
    }

}

?>
