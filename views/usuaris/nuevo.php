<!-- INSERTACIO DEL REGISTRE DE UN USUARI-->
<div class="div1">
<h1>Inserta el teu Usuari</h1>
</div>
<div class="div2">
<form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <p>Nom:<br />
    <input type="texto" name="Nombre" value="<?php if(isset($this->datos)) echo $this->datos['Nombre']; ?>" /></p>
    
    <p>Cognom:<br />
    <input type="texto" name="Apellidos" value="<?php if(isset($this->datos)) echo $this->datos['Apellidos']; ?>"/ ></p>
    
    <p>Usuari:<br />
    <input type="texto" name="Usuario" value="<?php if(isset($this->datos)) echo $this->datos['Usuario']; ?>" /></p>
    
    <p>Email:<br />
    <input type="texto" name="Email" value="<?php if(isset($this->datos)) echo $this->datos['Email']; ?>" /></p>
    
    <p>Contrasenya:<br />
    <input type="password" name="Password" value="<?php if(isset($this->datos)) echo $this->datos['Password']; ?>" /></p>
    
    <p>Repetir Contrasenya:<br />
    <input type="password" name="Password" value="<?php if(isset($this->datos)) echo $this->datos['Password']; ?>" /></p>
    
    <p><input type="submit" class="button" value="Guardar" /></p>
    
</form>
</div>
