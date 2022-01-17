<?php

    class Basic{        
        // pone el header
        public static function header(string $pagina = ''){?>
               <header>
               		<h1><a href="/">Framework CIFO 19-20</a></h1>
               		<h2><?=$pagina?></h2>
               </header>
        <?php }
        
        // pone el nav
        public static function nav(){?>
        	<nav id="menu">
                <ul>
        			<li><a href="/">Inicio</a></li>
        			<li><a href="/contacto">Contactar</a></li>
        		</ul>
        		<?php if(Login::isAdmin()){?>
              		<ul>
              			<li><a href="/usuario/create">Nuevo usuario</a></li>
            			<li><a href="/usuario/list">Lista de usuarios</a></li>
            		</ul>
        		<?php }?>
            </nav>
        <?php }
        
        // pone el login/logout
        public static function login(){
            // recupera el usuario identificado mediante el modelo Login
            $identificado = Login::get();

            echo "<div id='login'>";
            
            // el enlace depende de si el usuario está identificado o no
            echo $identificado ?
                "Hola <a href='/usuario/show/$identificado->id'>$identificado->usuario</a>, 
                      <a href='/login/logout'>salir</a>" :
                "<a href='/login'>Identificarse</a> - <a href='/usuario/create'>Registro</a>";
            
            echo "</div>";
        }
        
        // pone el footer
        public static function footer(){?>
            <footer>
            	<p>Framework 19-20, by Robert Sallent all rights reserved</p>
            	<p>Robert@CIFO</p>
            </footer>
        <?php }
    }
    
    
    
