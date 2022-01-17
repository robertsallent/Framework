
    <!DOCTYPE html>
    <html>
    	<head>
    		<meta charset="UTF-8">
    		<title>Éxito</title>
    		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
    	</head>
    	<body>
    		<?php 
    		  (TEMPLATE)::header("Éxito");
    		  (TEMPLATE)::nav();
    		  (TEMPLATE)::login();
    		?>  
    		
    		<h2>Éxito en la operación solicitada</h2>
    
    		<p class='exito'><?=$mensaje?></p>
    		
    		<div class="centrado">
    			<a href="/">Volver a la portada</a>
    		</div>
    		<br>
		
    		<?php 
    		  (TEMPLATE)::footer();
    		?>
    		
    	</body>
    </html>

