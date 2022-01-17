<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Formulario de contacto</title>
		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
		<script src="https://www.google.com/recaptcha/api.js"></script>	
	</head>
	<body>
		<?php 
		  (TEMPLATE)::header("Formulario de contacto");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		
		<h2>Contactar</h2>
		
		<form class="datos" method="post" action="/contacto/send">
			<label>Email</label>
			<input type="email" name="email" required><br>
			<label>Nombre</label>
			<input type="text" name="nombre" required><br>
			<label>Asunto</label>
			<input type="text" name="asunto" required><br>
			<label>Mensaje</label>
			<textarea name="mensaje" required></textarea>
			<br><br>
			<div class="g-recaptcha"
				data-sitekey="PonedAquiLaClavePublicaDelReCaptcha">
			</div>
			<br>
			<input type="submit" name="enviar" value="Enviar">
		</form>
		<br>		
		<div class="centrado">
			<a href="/">Volver a la portada</a>
		</div>
		<br>
		
		<?php 
		  (TEMPLATE)::footer();
		?>
		
	</body>
</html>








