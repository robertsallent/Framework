<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Detalles del usuario <?=$usuario->usuario?></title>
		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
	</head>
	<body>
	
		<?php 
		  (TEMPLATE)::header("Detalles");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Detalles del usuario</h2>
		<h3><?="$usuario->usuario ($usuario->email)"?></h3>
		
		<p><b>Usuario:</b> <?=$usuario->usuario?></p>
		<p><b>Nombre:</b> <?=$usuario->nombre?></p>
		<p><b>Apellidos:</b> <?="$usuario->apellido1 $usuario->apellido2"?></p>
		
		<?php 
		// solamente se muestran los datos de privilegio o si eres admin
		// si tienes privilegio >0
		if(Login::hasPrivilege(1)){?>
			<h4>Privilegios</h4>
    		<p><b>Nivel de privilegio:</b> <?=$usuario->privilegio?></p>
    		<p><?=$usuario->administrador? "Administrador":"No administrador"?></p>
    		<p><b>Email:</b> <?=$usuario->email?></p>
		<?php }?>
	
		<br>
		<div class="centrado">
    		<a href="/usuario/edit/<?=$usuario->id?>">Editar usuario</a> - 
    		<a href="/usuario/delete/<?=$usuario->id?>">Borrar usuario</a>  
    		
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