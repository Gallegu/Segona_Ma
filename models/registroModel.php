<?php
// AQUI TENIM EL MODEL PER PODER REGISTRAR UN USUARI A LES BASE DE DADES
class registroModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    
	//ENS SERVEIX PER VERIFICAR UN USUARI
    public function verificarUsuario($usuario)
    {
        $id = $this->_db->query(
                "select id_user from usuarios where Usuario = '$usuario'"
                );
        
        return $id->fetch();
    }
    
	//ENS SERVEIX PER VERIFICAR QUE EL MAIL NO ESTIGUI JA FICAT
    public function verificarEmail($email)
    {
        $id = $this->_db->query(
                "select id_user from Usuarios where email = '$email'"
                );
        
        if($id->fetch()){
            return true;
        }
        
        return false;
    }
    
	
	//REGISTRAREM UN USUARI
    public function registrarUsuario($nombre,$apellido, $usuario, $password, $email)
    {
    	
		
        $this->_db->prepare(
                "insert into Usuarios values" .
                "(null, :nombre, :apellido, :email, :usuario, :password,1,1)"
                )
                ->execute(array(
                    ':nombre' => $nombre,
					':apellido'=>$apellido,
                    ':usuario' => $usuario,
                    ':password' =>$password,
                    ':email' => $email
                    
                ));
    }
    
	//OBTINDREM UN USUARI DEL SEU ID
    public function getUsuario($id)
	{
		$usuario = $this->_db->query(
					"select * from Usuarios where id_user = $id "
					);
					
		return $usuario->fetch();
	}
	
	
}

?>
