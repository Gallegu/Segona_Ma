<!--- REGISTRE DE USUARIS-->
<h1>Registre</h1>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <p>
        <label>Nom: </label>
        <input type="text" name="nombre" value="<?php if(isset($this->datos)) echo $this->datos['nombre']; ?>" />
    </p>
    
    <p>
        <label>Cognom: </label>
        <input type="text" name="apellido" value="<?php if(isset($this->datos)) echo $this->datos['apellido']; ?>" />
    </p>
    
    <p>
        <label>Usuari: </label>
        <input type="text" name="usuario" value="<?php if(isset($this->datos)) echo $this->datos['usuario']; ?>" />
    </p>
    
    <p>
        <label>Email: </label>
        <input type="text" name="email" value="<?php if(isset($this->datos)) echo $this->datos['email']; ?>" />
    </p>
    
    <p>
        <label>Password: </label>
        <input type="password" name="pass" />
    </p>
    
    <p>
        <label>Repetir Password: </label>
        <input type="password" name="confirmar" />
    </p>    
        
    <p>
        <input type="submit" value="enviar" />
    </p>
</form>