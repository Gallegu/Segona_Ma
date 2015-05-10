<?php
//EL CONTROLADOR DELS ANUNCIS PORTA A TERME EL MATEIX QUE ELS DEMES, CONTROLA SI FALLA O QUALSEVOL OPERACIO AMB UN ANUNCI O LA GESTIO DELS ANUNCIS I DONEM MISSATGES DE ERROR
class anuncisController extends Controller
{
    private $_anunci;
    
    public function __construct() {
        parent::__construct();
        $this->_anunci = $this->loadModel('anuncis');
    }
    
    public function index()
    {
		if(Session::get('autenticado')){
        
			$this->_view->anuncis = $this->_anunci->getAnuncisPropis();
			$this->_view->anuncisVenuts = $this->_anunci->getAnuncisPropisVenuts();
			$this->_view->titulo = 'Anuncis';
			$this->_view->renderizar('index', 'anuncis');
		
		}else{
			
			$this->_view->anuncis = $this->_anunci->getAnuncis();
        	$this->_view->titulo = 'Anunci';
        	$this->_view->renderizar('index', 'anuncis');
		
		}
    }
    
    public function nuevo()
    {
        
        $this->_view->titulo = 'Nou Anunci';
        
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('Titulo')){
                $this->_view->_error = 'Titol del anunci';
                $this->_view->renderizar('nuevo', 'anuncis');
                exit;
            }
            
            if(!$this->getTexto('Descripcion')){
                $this->_view->_error = 'Descripcio del anunci';
                $this->_view->renderizar('nuevo', 'anuncis');
                exit;
            }
			
			if(!$this->getTexto('Precio')){
                $this->_view->_error = 'Preu del producte';
                $this->_view->renderizar('nuevo', 'anuncis');
                exit;
            }
            
            if(!$this->getTexto('Imagen')){
                $this->_view->_error = 'Imatge del Producte';
                $this->_view->renderizar('nuevo', 'anuncis');
                exit;
            }
            
            $this->_anunci->insertarAnunci(
                    $this->getTexto('Titulo'),
                    $this->getTexto('Descripcion'),
					$this->getTexto('Precio'),
					$this->getTexto('Imagen')
                    );
            
            $this->redireccionar('anuncis');
        }       
        
        $this->_view->renderizar('nuevo', 'anuncis');
    }
    
    public function editar($id){
        if(!$this->filtrarInt($id)){
            $this->redireccionar('anuncis');
        }
        
        if(!$this->_anunci->getAnunci($this->filtrarInt($id))){
            $this->redireccionar('anuncis');
        }
        
        $this->_view->titulo = 'Editar Anunci';
        
        
        if($this->getInt('guardar') == 1){
            $this->_view->datos = $_POST;
            
            if(!$this->getTexto('Titulo')){
                $this->_view->_error = 'Introduir el titol del anunci';
                $this->_view->renderizar('editar', 'anuncis');
                exit;
            }
            
            if(!$this->getTexto('Descripcion')){
                $this->_view->_error = 'Descriure la descripcio del Anunci';
                $this->_view->renderizar('editar', 'anuncis');
                exit;
            }
			
			if(!$this->getInt('Precio')){
                $this->_view->_error = 'Preu del producte';
                $this->_view->renderizar('editar', 'anuncis');
                exit;
            }
            
            if(!$this->getTexto('Imagen')){
                $this->_view->_error = 'Imatge del Anunci';
                $this->_view->renderizar('editar', 'anuncis');
                exit;
            }
            
            $this->_anunci->editarAnunci(
                    
					$this->filtrarInt($id),
                    $this->getTexto('Titulo'),
                    $this->getTexto('Descripcion'),
					$this->getTexto('Precio'),
					$this->getTexto('Imagen'),
					$this->getTexto('Vendido')
					
                    );
            
            $this->redireccionar('anuncis');
        }
        
        $this->_view->datos = $this->_anunci->getAnunci($this->filtrarInt($id));
        $this->_view->renderizar('editar', 'anuncis');
    }
    
    public function eliminar($id)
    {
       
        
        if(!$this->filtrarInt($id)){
            $this->redireccionar('anuncis');
        }
        
        
        
        $this->_anunci->eliminarAnunci($this->filtrarInt($id));
        $this->redireccionar('anuncis');
    }
}

?>

