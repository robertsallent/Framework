<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Registro de usuarios</title>
		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
	</head>
	
	<body>
		<?php 
		  (TEMPLATE)::header("Registro de usuarios");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Nuevo usuario</h2>
		
		<form class="datos" method="post" action="/usuario/store">
			<label>Usuario</label>
			<input type="text" name="usuario">
			<br>
			<label>Clave</label>
			<input type="password" name="clave">
			<br>
			<label>Nombre</label>
			<input type="text" name="nombre">
			<br>
			<label>Primer apellido</label>
			<input type="text" name="apellido1">
			<br>
			<label>Segundo apellido</label>
			<input type="text" name="apellido2">
			<br>
			<label>Email</label>
			<input type="email" name="email">
			<br>
			
			 <?php 
			 // dar privilegios al nuevo usuario (solamente para el admin)
			 if(Login::isAdmin()){ 
			 ?>
    			<h4>Operaciones solo para el admin</h4>
    			<label>Privilegio</label>
    			<input type="number" value="0" min="0" max="9999" name="privilegio">
    			<br>
    			<input type="checkbox" name="administrador" value="1">
    			<label>Conceder privilegio de administrador</label>
    			<br>
             <?php } ?>

			<input type="submit" name="guardar" value="Guardar">
		</form>
		<br>
		
		<div class="centrado">
			<a href="/">Volver a la portada</a>
    		<?php if(Login::isAdmin()){?>
    			- <a href="/usuario/list">Lista de usuarios</a>
    		<?php }?>
		</div>
		<br>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
    		
	</body>
</html>








