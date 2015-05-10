<?php



// ENS SERVEIX PER DE PASARELA PER PODER FER LES CONSULTES, ES LA CONEXIO DEL MODEL A LA BASE DE DADES
class Model
{
    protected $_db;
    
    public function __construct() {
        $this->_db = new Database();
    }
}

?>
