<?php
// S'ENCARREGA DE CONTROLAR ELS LOGUINS, QUE ESTIGUIN BE O NO, DONAR ERRORS
class loginController extends Controller
{
    private $_login;
    
    public function __construct(){
        parent::__construct();
        $this->_login = $this->loadModel('login');
    }
    
    public function index()
    {
        if(Session::get('autenticado')){
            $this->redireccionar();
        }
        
        $this->_view->titulo = 'Iniciar Sesion';
        
        if($this->getInt('enviar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getAlphaNum('usuario')){
                $this->_view->_error = 'Introduir el usuari';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if(!$this->getSql('pass')){
                $this->_view->_error = 'Introduir un Password';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            $row = $this->_login->getUsuario(
                    $this->getAlphaNum('usuario'),
                    $this->getSql('pass')
                    );
            
            if(!$row){
                $this->_view->_error = 'Usuari y/o password incorrectes';
                $this->_view->renderizar('index','login');
                exit;
            }
            
            if($row['Estado'] != 1){
                $this->_view->_error = 'Este usuari no esta habilitat';
                $this->_view->renderizar('index','login');
                exit;
            }
                        
            Session::set('autenticado', true);
            Session::set('level', $row['Rol']);
            Session::set('usuario', $row['Usuario']);
            Session::set('id_usuario', $row['id_user']);
            Session::set('tiempo', time());
            
            $this->redireccionar();
        }
        
        $this->_view->renderizar('index','login');
        
    }
    
    public function cerrar()
    {
        Session::destroy();
        $this->redireccionar();
    }
}

?>
