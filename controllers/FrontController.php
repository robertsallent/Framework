<?php

    // CONTROLADOR FRONTAL
    class FrontController{
        
        // método principal del controlador frontal
        public static function main(){
            try{
                // Inicializa el sistema de login
                // (recupera el usuario identificado desde las variables de sesión)
                Login::init();
                
                // GESTIÓN DE PETICIONES 
               
                // recuperar el controlador de la petición
                // si no llega el parámetro c, el controlador es Welcome (config.php)
                // si llega c=libro, el controlador es LibroController
                $c = empty($_GET['c'])? 
                    DEFAULT_CONTROLLER : ucfirst(DB::escape($_GET['c'])).'Controller';
         
                // recuperar el método de la petición
                // si no llega el parámetro m, el método es index (config.php)
                // si llega m=create, el método es create()
                $m = empty($_GET['m'])? 
                    DEFAULT_METHOD : DB::escape($_GET['m']);
                
                // recuperar el parámetro de la petición
                $p = empty($_GET['p'])? false: DB::escape($_GET['p']);
                
                // cargar el controlador correspondiente
                $controlador=new $c();
                
                // comprobar si existe el método 
                if(!is_callable([$controlador, $m]))
                    throw new Exception("No existe la operación $m");
                
                // llama al método del controlador, pasando el parámetro
                $controlador->$m($p);
            
            // si se produce algún error...
            }catch(Throwable $e){ 
                $mensaje=$e->getMessage();   // recupera el mensaje del error
                include 'views/error.php';    // carga la vista de error
            } 
        }  
    }
    
