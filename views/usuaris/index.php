<!-- PAGINA ON ES VEUEN ELS USUARIS QUE HI HAN ARA SI ESTAS LOGUEJAT I SI NO TENS QUE FER-HO PER VEUREU-->
	<?php if(Session::get('autenticado')):
    
	 	if(isset($this->usuarios) && count($this->usuarios)) : ?>
        <div class="div1users">
<h1>Usuaris</h1>
</div>
    <div class="div2users">
        <table width="100%">
        
            <tr>
                <th>Nom</th>
                <th>Cognom</th>
                <th>Usuari</th>
                <th>Email</th>
                <th>Contrasenya</th>
                <th>Opcions</th>
            </tr>
            
            <?php for($i = 0; $i < count($this->usuarios); $i++): ?>
            
            <tr>
                <td><?php echo $this->usuarios[$i]['Nombre']; ?></td>
                <td><?php echo $this->usuarios[$i]['Apellidos']; ?></td>
                <td><?php echo $this->usuarios[$i]['Usuario']; ?></td>
                <td><?php echo $this->usuarios[$i]['Email']; ?></td>
                <td><?php echo $this->usuarios[$i]['Password']; ?></td>
                
                <td>
                <a href="<?php echo BASE_URL.'usuaris/editar/'.$this->usuarios[$i]['id_user'];?>">Editar</a>
                <a href="<?php echo BASE_URL.'usuaris/eliminar/'.$this->usuarios[$i]['id_user'];?>">Eliminar</a>
                </td>                                
            </tr>
            
            <?php endfor;?>
        
        </table>
        </div>
        <?php else: ?>
        
        <p><strong>No hi han usuaris</strong></p>
        
        <?php endif; ?>
        <div class="div3users">
        <p align="center"><a href="<?php BASE_URL; ?>usuaris/nuevo">Agregar Usuari</a></p>
        </div>
     <?php else: ?>
     
     	<p>Inicia Sessio per veure els Usuaris</p>
       
	 <?php endif; ?> 
  

  
 