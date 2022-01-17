<?php
    
    class ForgotpasswordController{
        
        // método por defecto de ForgotpasswordController
        public function index(){
            
            // carga la vista con el formulario
            include 'views/recuperarclave.php';
        }
        
        // método para regenerar el password
        public function send(){
            
            // comprobar que llega el formulario
            if(empty($_POST['generar']))
                throw new Exception('No se recibió el formulario.');
             
            // recuperar datos del formulario
            $u = DB::escape($_POST['usuario']);
            $e = DB::escape($_POST['email']);
            
            $usuario = Usuario::getByUserMail($u, $e); // recuperar usuario
            
            // comprobar que los datos son correctos
            if(!$usuario)
                throw new Exception('Los datos no son correctos.');
            
            // generar una nueva clave única
            $nuevaClave = uniqid();
            
            // actualizar el usuario
            $usuario->clave = md5($nuevaClave);
            
            if(!$usuario->actualizar())
                throw new Exception('No se pudo generar una nueva clave.');
            
            // preparar el mail
            $to = $usuario->email;
            $from = "mailrecovery@biblioteca.cat";
            $name = "Sistema de generación de claves";
            $subject = "Nueva clave de la aplicación biblioteca";
            $message = "Se ha generado una nueva clave: <b>$nuevaClave</b>.";
            
            // enviar el mail
            $mail = new Email($to, $from, $name, $subject, $message);
          
            if(!$mail->enviar())
                throw new Exception('No se pudo enviar el email.');
            
            // redirigir a la vista de éxito
            $mensaje = "Procedimiento completado, consulta tu bandeja de entrada.";
            include 'views/exito.php';
        }    
    }
    
    
    
    