<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Baja de usuario</title>
		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
	</head>
	
	<body>
		<?php 
		  (TEMPLATE)::header("Baja de usuario");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Confirmar baja de usuario</h2>
		<p><?="$usuario->usuario ($usuario->email)"?></p>
		
		<form class="datos" method="post" action="/usuario/destroy">
			<p>Confirmar el borrado del usuario <?=$usuario->usuario?>.</p>
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="submit" name="borrar" value="Borrar">
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








