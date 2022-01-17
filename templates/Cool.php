<?php

    class Cool extends Basic{
        
        // redefinición del método header
        public static function header(string $pagina = ''){
            
            // usa el método de la clase padre
            parent::header($pagina);
            
            // añade algo más 
        ?>
           <section>
           		<p>Estás usando el template Cool.</p>
           </section>
        <?php }
        
        // no voy a redefinir el método nav de la clase Basic,
        // esta clase lo heredará
        
        // no voy a redefinir el método login de la clase Basic,
        // esta clase lo heredará
           
        // redefino por completo el método footer
        public static function footer(){?>
            <footer>
            	<p>Esta es una aplicación Cool</p>
            	<p>Robert@CoolTemplate</p>
            </footer>
        <?php }
    }
    
    
    