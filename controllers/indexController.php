<?php
//EL INDEX ES EL MES SENCILL PERQUE NOMES CONTROLA LA PART PRIMERA DEL FRAMEWORK LO PRIMER QUE ES CARREGA ES EL DEL INDEX
class indexController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $anunci = $this->loadModel('anuncis');
        
        $this->_view->anuncis = $anunci->getAnuncis();
        
        $this->_view->titulo = 'Portada';
        $this->_view->renderizar('index', 'inicio');
    }
}

?>