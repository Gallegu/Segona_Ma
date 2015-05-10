<?php
//AMB EL ANUNCIS MODEL INSERTAREM, OBTINDREM I VEUREM ELS ANUNCIS AMB ELS SEUS USUARIS CORRESPONENTS I TAMBE TOTS ELS DIPONIBLES
class anuncisModel extends Model
{
	
    public function __construct() {
        parent::__construct();
		
    }
    
    public function getAnuncis()
    {
        $anunci = $this->_db->query("select * from anuncios");
        return $anunci->fetchall();
    }
	
	public function getAnuncisPropis()
    {
		$user = Session::get('id_usuario');						
        $anunci = $this->_db->query("select * from anuncios where usuario = $user and vendido !='Vendido'");
        return $anunci->fetchall();
    }
	
	public function getAnuncisPropisVenuts()
    {
		$user = Session::get('id_usuario');						
        $anunci = $this->_db->query("select * from anuncios where usuario = $user and vendido = 'Vendido'");
        return $anunci->fetchall();
    }
    
    public function getAnunci($id)
    {
        $id = (int) $id;
        $anunci = $this->_db->query("select * from anuncios where id_anuncio = $id");
        return $anunci->fetch();
    }
    
    public function insertarAnunci($titulo, $descripcion,$precio,$imagen)
    {
        
		$user = Session::get('id_usuario');	
		$this->_db->prepare("INSERT INTO Anuncios VALUES
							(null, :titulo, :descripcion,:precio,:imagen,now(),$user,' ')")
                ->execute(
                        array(
                           ':titulo' => $titulo,
                           ':descripcion' => $descripcion,
						   ':precio'=>$precio,
						   ':imagen'=>$imagen
                        ));
									
    }
    
    public function editarAnunci($id, $titulo, $descripcion,$precio,$imagen, $vendido)
    {
		$id = (int) $id;
        $user = Session::get('id_usuario');	
        $this->_db->prepare("UPDATE Anuncios SET Titulo = :titulo, Descripcion = :descripcion, Precio = :precio, Imagen = :imagen, Fecha = now(), usuario = $user, vendido = :vendido WHERE id_anuncio = :id")
                ->execute(
                        array(
                           ':id' => $id,
                           ':titulo' => $titulo,
                           ':descripcion' => $descripcion,
						   ':precio'=>$precio,
						   ':imagen'=>$imagen,
						   ':vendido' => $vendido,
                        ));
    }
    
    public function eliminarAnunci($id)
    {
        $id = (int) $id;
        $this->_db->query("DELETE FROM anuncios WHERE id_anuncio = $id");
    }
    
}

?>
