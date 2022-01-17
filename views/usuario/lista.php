<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Lista de usuarios</title>
		<link rel="stylesheet" type="text/css" href="<?=CSS_FILE?>">
	</head>
	<body>
		<?php 
		  (TEMPLATE)::header("Usuarios");
		  (TEMPLATE)::nav();
		  (TEMPLATE)::login();
		?>  
		<h2>Lista de usuarios</h2>
			
		<table>
			<tr>
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Operaciones</th>
			</tr>
    		<?php foreach($usuarios as $usuario){
    			   echo "<tr>";
    			   echo "<td>$usuario->usuario</td>";
    			   echo "<td>$usuario->nombre</td>";
    			   echo "<td>$usuario->apellido1 $usuario->apellido2</td>";
    			   echo "<td>";
    			   echo " <a href='/usuario/show/$usuario->id'>Ver</a>";
    			   echo "-<a href='/usuario/edit/$usuario->id'>Actualizar</a>";
    			   echo "-<a href='/usuario/delete/$usuario->id'>Borrar</a>";
    			   echo "</td>";
    			   echo "</tr>";
    		}?>
		</table>
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

