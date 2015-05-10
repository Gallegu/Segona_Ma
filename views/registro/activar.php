<!--- ACTIVACIO DEL COMPTE CUAN UN USUARI AUTENTIFICA-->
<h2>Activaci&oacute; del Compte</h2>

<p> </p>

<a href="<?php echo BASE_URL; ?>">INICI</a>

<?php if(!Session::get('autenticado')): ?>
	
	| <a href="<?php echo BASE_URL; ?>login">Inicia Sessi&oacute;</a>

<?php endif; ?>