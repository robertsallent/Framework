
    <!DOCTYPE html>
    <html>
    	<head>
    		<meta charset="UTF-8">
    		<title>Error</title>
    		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
    	</head>
    	
    	<body>
    		<?php 
    		  (TEMPLATE)::header("Error");
    		  (TEMPLATE)::nav();
    		  (TEMPLATE)::login();
    		?>  
    		
    		<h2>Error en la operación solicitada</h2>
    
    		<p class='error'><?=$mensaje?></p>
    		
    		<div class="centrado">
    			<a href="/">Volver a la portada</a>
    		</div>
    		<br>
		
    		<?php 
    		  (TEMPLATE)::footer();
    		?>
    	</body>
    	
    </html>

