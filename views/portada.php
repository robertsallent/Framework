
    <!DOCTYPE html>
    <html>
    	<head>
    		<meta charset="UTF-8">
    		<title>Portada</title>
    		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
    	</head>
    	
    	<body>
    		<?php 
    		  (TEMPLATE)::header("Portada");
    		  (TEMPLATE)::nav();
    		  (TEMPLATE)::login();
    		?>  
    		
    		<h2>Bienvenido a nuestro framework hecho en clase</h2>
    		<p>Estás viendo la página de la portada en views/portada.php, a la que has llegado
    		mediante el método index() del controlador controllers/Welcome.php.</p>
    		<p>Esto se puede cambiar en la configuración config/config.php modificando los
    		parámetros DEFAULT_CONTROLLER y DEFAULT_METHOD.</p>
    		
    		<h3>Info del usuario</h3>
    		<p>A continuación se muestra la información del usuario actual.</p>
    		<p>Es un ejemplo para ver cómo podemos recuperar la información del usuario desde
    		las vistas, que encontaréis en views/portada.php.</p>
    		<?php 
    		  echo Login::get()? 
    		          "<p>Identificado como ".Login::get()->usuario."</p>":
    		          "<p>No estás identificado</p>";
    		  
    		  echo Login::isAdmin()?
        		  "<p>Eres administrador todopoderoso</p>":
        		  "<p>No eres admin</p>";
    		  
    		  echo Login::hasPrivilege(500)?
        		  "<p>Tienes nivel de privilegio 500 o más</p>":
        		  "<p>Tienes menos de 500 de nivel de privilegio</p>";
    		
    		?>
    		<p>Esta es una aplicación de prueba para comprender el MVC.</p>
    		
    		<?php 
    		  (TEMPLATE)::footer();
    		?>
    	</body>
    	
    </html>

