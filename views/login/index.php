<!-- SESSIO DELS USUARIS,LOGIN-->
<h1>Inicia Sessi&oacute;</h1>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <p>
        <label>Usuari: </labe>
        <input type="text" name="usuario" value="<?php if(isset($this->datos)) echo $this->datos['usuario']; ?>" />
    </p>
    
    <p>
        <label>Password: </labe>
        <input type="password" name="pass" />
    </p>
    
    <p class="pbutton">
        <input type="submit" value="enviar" />
    </p>
</form>
