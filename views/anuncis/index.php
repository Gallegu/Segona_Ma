
	<?php if(Session::get('autenticado')):
    //AMB AQUESTA VISTA PODEM MOSTRAR TOTS ELS ANUNCIS QUE HI HAN, EDITARLOS I ELIMINARLOS SEMPRE QUE EL USUARI ESTIGUI LOGUEJAT, SI NO HO ESTA SORTIRA QUE ES TE QUE LOGUEJAR PER VEURELS
	 	if(isset($this->anuncis) && count($this->anuncis)) : ?>
        <div class="div1">
<h1>Productes en venta</h1>
</div>
    <div class="div2">
        <table width="100%">
        
            <tr>
                <th>Data</th>
                <th>Titol</th>
                <th>Descripcio</th>
                <th>Preu</th>
                <th>Imatge</th>
                <th>Accions</th>
            </tr>
            
            <?php for($i = 0; $i < count($this->anuncis); $i++): ?>
            
            <tr>
                <td><?php echo $this->anuncis[$i]['Fecha']; ?></td>
                <td><?php echo $this->anuncis[$i]['Titulo']; ?></td>
                <td><?php echo $this->anuncis[$i]['Descripcion']; ?></td>
                <td><?php echo $this->anuncis[$i]['Precio'].'€'; ?></td>
                <td><?php echo $this->anuncis[$i]['Imagen']; ?></td>
                <td>
                <a href="<?php echo BASE_URL.'anuncis/editar/'.$this->anuncis[$i]['id_anuncio'];?>">Editar</a>
                <a href="<?php echo BASE_URL.'anuncis/eliminar/'.$this->anuncis[$i]['id_anuncio'];?>">Eliminar</a>
                </td>                                
            </tr>
            
            <?php endfor;?>
        
        </table>
        </div>
        <?php else: ?>
        
        <p><strong>No tens Anuncis!</strong></p>
        
        <?php endif; ?>
        <div class="div3">
        <p align="center"><a href="<?php BASE_URL; ?>anuncis/nuevo">Agregar Anunci</a></p>
        </div>
     <?php else: ?>
     
     	<p>Inicia Sessio per veure els teus anuncis</p>
       
	 <?php endif; ?> 
  

  
 