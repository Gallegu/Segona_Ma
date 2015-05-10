<div class="div1">
<h1>Inserta el teu Anunci</h1>
</div>
<div class="div2">
<form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <p>Titol:<br />
    <input type="texto" name="Titulo" value="<?php if(isset($this->datos)) echo $this->datos['Titulo']; ?>" /></p>
    
    <p>Descripcio:<br />
    <textarea name="Descripcion"><?php if(isset($this->datos)) echo $this->datos['Descripcion']; ?></textarea></p>
    
    <p>Preu:<br />
    <input type="texto" name="Precio" value="<?php if(isset($this->datos)) echo $this->datos['Precio']; ?>" /></p>
    
    <p>Imatge:<br />
    <input type="texto" name="Imagen" value="<?php if(isset($this->datos)) echo $this->datos['Imagen']; ?>" /></p>
    
    <p><input type="submit" class="button" value="Guardar" /></p>
    
</form>
</div>
