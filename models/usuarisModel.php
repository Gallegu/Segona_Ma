<?php
// AQUI TENIM EL MODEL DE USUARIS ON PODEM VEURE QUE TENIM TOTS ELS INSERTS EL OBTENIR USUARIS, EL EDITAR I EL ELIMINAR, D'AQUESTA MANERA FEM SERVIR CADA FUNCIO EN CADA CAS QUE LES NECESITEM, AMB LA VISTA I EL CONTROLADOR.
class usuarisModel extends Model
{
	
    public function __construct() {
        parent::__construct();
		
    }
    //ENS RETORNARA LA LLISTA DE USUARIS QUE TINGUEM A LA BASE DE DADES USUARIS
    public function getUsuaris()
    {
        $usuarios = $this->_db->query("select * from usuarios");
        return $usuarios->fetchall();
    }
	
	// OBTINDREM UN USUARI PER EL SEU ID
    public function getUsuari($id)
    {
        $id = (int) $id;
        $usuario = $this->_db->query("select * from usuarios where id_user = $id");
        return $usuario->fetch();
    }
    
	// INSERTAREM UN USUARI, QUE A LA VEGADA CUAN FEM SERVIR EL METODE DE EDITAR TAMBE PASSAREM PER EL DE INSEERTAR A LA TAULA.
    public function insertarUsuari($nombre, $apellidos,$usuario,$email,$password)
    {
        
		$user = Session::get('id_user');	
		$this->_db->prepare("INSERT INTO usuarios VALUES
							(null,:Nombre, :Apellidos,:Email,:Usuario,:Password,'1','1')")
                ->execute(
                        array(
                           ':Nombre' => $nombre,
                           ':Apellidos' => $apellidos,
						   ':Email'=>$email,
						   ':Usuario'=>$usuario,
						   ':Password'=>$password
						  
                        ));
									
    }
    
	// EDITAR USUARIS
    public function editarUsuari($id, $nombre, $apellidos,$email,$usuario, $password)
    {
		$id = (int) $id;	
        $this->_db->prepare("UPDATE usuarios SET Nombre = :Nombre, Apellidos = :Apellidos, Email = :Email, Usuario = :Usuario, Password = Password, WHERE id_user = :id")
                ->execute(
                        array(
                           ':id' =>$id,
                           ':Nombre' =>$nombre,
                           ':Apellidos' =>$apellidos,
						   ':Email'=>$email,
						   ':Usuario'=>$usuario,
						   ':Password' => $password
                        ));
    }
    
	//ELIMINAR USUARIS
    public function eliminarUsuari($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM usuarios WHERE id_user = $id");
    }
    
}

?>
