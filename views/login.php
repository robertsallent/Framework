<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
	</head>
	
	<body>
		<?php 
		  (TEMPLATE)::header("Identificación");
		  (TEMPLATE)::nav();
		?>  
		<h2>Acceso a la aplicación</h2>
		
		<form class="datos" method="post" action="/login/login">
			<label>Usuario o email</label>
			<input type="text" name="usuario" required>
			<br>
			<label>Clave</label>
			<input type="password" name="clave" required>
			
			<input type="submit" name="identificar" value="Identificarse">
		</form>
		<br>
		<div class="centrado">
			<a href="/forgotpassword">Olvidé mi clave</a>
			- <a href="/">Volver a la portada</a>
		</div>
		<br>

		<?php  (TEMPLATE)::footer(); ?>
	</body>
	
</html>








