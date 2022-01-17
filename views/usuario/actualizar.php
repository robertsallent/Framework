<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Actualizar datos del usuario <?=$usuario->usuario?></title>
		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
	</head>
	
	<body>
		<?php 
		  (TEMPLATE)::header("Actualizar datos del usuario");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
				
		<h2>Formulario de edición</h2>
		<p><?="$usuario->usuario ($usuario->email)"?></p>
		
		<?=empty( $GLOBALS['mensaje'])? "" : "<p>". $GLOBALS['mensaje']."</p>"?>

		<form class="datos" method="post" action="/usuario/update">
		
		    <!-- id del usuario a modificar -->
			<input type="hidden" name="id" value="<?=$usuario->id?>">
			
			<!-- resto del formulario... -->
			<label>Usuario</label>
			<input type="text" name="usuario" value="<?=$usuario->usuario?>">
			<br>
			<label>Clave</label>
			<input type="password" name="clave">
			<label>En blanco para no cambiar la clave actual</label>
			<br>
			
			<label>Nombre</label>
			<input type="text" name="nombre" value="<?=$usuario->nombre?>">
			<br>
			<label>Primer apellido</label>
			<input type="text" name="apellido1" value="<?=$usuario->apellido1?>">
			<br>
			<label>Segundo apellido</label>
			<input type="text" name="apellido2" value="<?=$usuario->apellido2?>">
			<br>
			<label>Email</label>
			<input type="email" name="email" value="<?=$usuario->email?>">
			<br>
				
			<?php if(Login::isAdmin()){?>			
			<h4>Operaciones solo para el admin</h4>
			<label>Privilegio</label>
			<input type="number" min="0" max="9999" name="privilegio" 
				   value="<?=$usuario->privilegio?>">
			<br>
			<input type="checkbox" name="administrador" value="1"
				   <?=empty($usuario->administrador)? '' : ' checked'?>>
			<label>Conceder privilegio de administrador</label>
			<br>
			<?php }?>
			
			<input type="submit" name="actualizar" value="Actualizar">
		</form>
		<br>
		
		<div class="centrado">
    		<a href="/usuario/show/<?=$usuario->id?>">Detalles</a> 
    		
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








