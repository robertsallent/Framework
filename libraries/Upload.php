<?php 

    
    /** Clase Upload
     * 
     * Facilita la tarea de subir ficheros y generar nombres únicos */
    class Upload{
        
        /** Método estático para comprobar si un fichero llega */ 
        public static function llegaFichero(string $index='fichero'){
            return !empty($_FILES[$index]) && $_FILES[$index]['error']!=4;
        }
        
        /** Método estático para generar nombres únicos de fichero
         * 
         * @param string $ext extensión original del fichero
         * @param string $pre prefijo a añadir al nombre generado  
         * @return string el nombre único generado  */
        public static function nombreUnico(string $ext='', string $pre=''):string{
            $nombre = uniqid($pre);
            // retorna el nuevo nombre con la extensión (si se indicó)
            return $ext ? "$nombre.$ext" : $nombre;
        }
        
        /** Método estático para el procesamiento del fichero subido
         * 
         * Coloca el fichero en la ruta indicada, comprueba errores, tamaño máximo 
         * y el tipo MIME. Puede poner nombres únicos para los ficheros subidos.
         * 
         *  @param array $file array procedente de $_FILES['clave']
         *  @param string $ruta directorio donde ubicar el fichero
         *  @param bool $unique indica si queremos generar un nombre único
         *  @param int $max tamaño máximo permitido (0 sin límite)
         *  @param string $mime tipo MIME aceptado, por defecto cualquiera
         *  
         *  @return string ruta final donde se ubica el fichero */
        
        public static function procesar(
            array $file, string $folder, bool $unique=true, int $max=0, string $mime='.'):string{
        
            // comprobar que no se ha producido un error en la subida
            if($e = $file['error'])
                throw new Exception("Error en la subida del fichero con código $e");
    
            // comprobar que el fichero no supera el tamaño máximo    
            if($max && $file['size']>$max)
                throw new Exception("El fichero supera los $max bytes");
                
            $rutaTmp = $file['tmp_name']; // ruta temporal
            
            // COMPROBACION DEL TIPO DE FICHERO
            // recupera el tipo MIME
            $tipo = (new finfo(FILEINFO_MIME_TYPE))->file($rutaTmp);
            
            // retoques para que no falle la expresión regular en la comprobación 
            $mimetmp = str_replace('*','',$mime); //quito el * (si lo tiene)
            $mimetmp = preg_quote($mimetmp,'/');  //escapo los caracteres especiales
            
            if(!preg_match("/^$mimetmp/i",$tipo)) // comprobación del tipo mediante regexp
                throw new Exception("El fichero no es de tipo $mime");
    
            // Calcular la ruta final, dependiendo de si el nombre del fichero 
            // tiene que ser un nombre único o no
            $ruta = $unique ?
                $ruta = $folder."/".self::nombreUnico(pathinfo($file['name'], PATHINFO_EXTENSION)):
                $ruta = $folder."/".$file['name'];
                        
            // MOVER EL FICHERO A DESTINO
            if(!move_uploaded_file($rutaTmp, $ruta)) 
                throw new Exception("Error al mover de $rutaTmp a $ruta");
            
            return $ruta;
        }   
    }
    
