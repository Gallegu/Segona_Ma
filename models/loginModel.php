<?php
//ENS SERVEIX PER VEURE SI EL USUARI I LA CONTRASENYA ESTAN CORRECTAMENT A LA BASE DE DADES PER PODER LOGUEJAR
class loginModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
    public function getUsuario($usuario, $password)
    {
        $datos = $this->_db->query(
                "select * from usuarios " .
                "where Usuario = '$usuario' " .
                "and Password = '$password'"
                );
        
        return $datos->fetch();
    }
}

?>
