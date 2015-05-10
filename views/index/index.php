
<!--- AQUI ES ON CARREGUEM LA PRIMERA PANTALLA DE TOTES QUE TINDRA DOS OPCIONES, SI ESTEM LOGUEJATS ENS DONARA ELS ANUNCIS, I SI NO SORTIRA EL MAPA.--->

	<?php if(Session::get('autenticado')):
        
        if(isset($this->anuncis) && count($this->anuncis)) : ?>
    		 <h1>Els Anuncis disponibles:</h1>
             <br />
            <table width="65%" style="margin:1%">
            
                <tr>
                    <th>Data</th>
                    <th>Titol</th>
                    <th>Descripcio</th>
                    <th>Preu</th>
                    <th>Imatge</th>
                </tr>
                
                <?php for($i = 0; $i < count($this->anuncis); $i++): ?>
                
                <tr>
                    <td><?php echo $this->anuncis[$i]['Fecha']; ?></td>
                    <td><?php echo $this->anuncis[$i]['Titulo']; ?></td>
                    <td><?php echo $this->anuncis[$i]['Descripcion']; ?></td>
                    <td><?php echo $this->anuncis[$i]['Precio'].'€'; ?></td>
                    <td><?php echo $this->anuncis[$i]['Imagen']; ?></td>
                    
                </tr>
                
                <?php endfor;?>
            </table>
    
        <?php else: ?>
    
            <p><strong>No hi ha anuncis!</strong></p>
    
    	<?php endif;?> 
        
        <?php else: ?>
        <h1>Els Anuncis no estan disponibles, pero pots veure on et trobes ara mateix:</h1>
        <div id="googleMap" class="map"></div>
        
        
    
    <?php endif; ?>