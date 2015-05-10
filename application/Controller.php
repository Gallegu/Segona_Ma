<?php



// LA PRINCIPAL FUNCIO ES PER CARREGAR ELS MODELS, 
abstract class Controller
{
    protected $_view;
    
    public function __construct() {
        $this->_view = new View(new Request);
    }
    
    abstract public function index();
    
	
	//AQUI TENIM EL CARREGAMENT DE MODELS
    protected function loadModel($modelo)
    {
        $modelo = $modelo . 'Model';
        $rutaModelo = ROOT . 'models' . DS . $modelo . '.php';
        
        if(is_readable($rutaModelo)){
            require_once $rutaModelo;
            $modelo = new $modelo;
            return $modelo;
        }
        else {
            throw new Exception('Error de modelo');
        }
    }
    
	// TAMBE CARREGA LA LLIBRERIA QUE FEM SERVIR PER ELS SQL
    protected function getLibrary($libreria)
    {
        $rutaLibreria = ROOT . 'libs' . DS . $libreria . '.php';
        
        if(is_readable($rutaLibreria)){
            require_once $rutaLibreria;
        }
        else{
            throw new Exception('Error de libreria');
        }
    }
    
	//UNA ALTRA FUNCIO PER OBTENIR I ENVIAR ELS TEXTS
    protected function getTexto($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = htmlspecialchars($_POST[$clave], ENT_QUOTES);
            return $_POST[$clave];
        }
        
        return '';
    }
    
	//SERVEIX PER OBTENIR ELS INTS IGUAL QUE ELS TESTS
    protected function getInt($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = filter_input(INPUT_POST, $clave, FILTER_VALIDATE_INT);
            return $_POST[$clave];
        }
        
        return 0;
    }
    
	//SERVEIX PER DIRECCIONAR ALS LLOCS ON TU NECESITIS AMB LA DECLARACIO DEL BASE_URL
    protected function redireccionar($ruta = false)
    {
        if($ruta){
            header('location:' . BASE_URL . $ruta);
            exit;
        }
        else{
            header('location:' . BASE_URL);
            exit;
        }
    }

	//SERVEIX PODER FILTRAR PER EL ID DEL USUARI O DELS ANUNCIS
    protected function filtrarInt($int)
    {
        $int = (int) $int;
        
        if(is_int($int)){
            return $int;
        }
        else{
            return 0;
        }
    }
    
	//UN ALTRE METODE DE ENVIAMENT COM EL GETTEXT
    protected function getPostParam($clave)
    {
        if(isset($_POST[$clave])){
            return $_POST[$clave];
        }
    }
    // SERVEIX PER ENVIAR SQL A LA BASE DE DADES, TANT PER INSERTAR, EDITAR, ELIMINAR.
    protected function getSql($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = strip_tags($_POST[$clave]);
            
            if(!get_magic_quotes_gpc()){
                $_POST[$clave] = mysql_escape_string($_POST[$clave]);
            }
            
            return trim($_POST[$clave]);
        }
    }
    
	//SERVEIX PER FER SERVIR NUMEROS ALFANUMERICS
    protected function getAlphaNum($clave)
    {
        if(isset($_POST[$clave]) && !empty($_POST[$clave])){
            $_POST[$clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$clave]);
            return trim($_POST[$clave]);
        }
        
    }
    
	
	// LA TENIM PER PODER VALIDAR SI ELS EMAILS SON CORRECTES, TOTES AQUESTES FUNCIONS VENEN DE LES LLIBRERIES INCORPORADES AL FRAMEWORK
    public function validarEmail($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        
        return true;
    }
    
}

?>
