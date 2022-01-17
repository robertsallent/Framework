<?php
    

    //CLASE DB QUE USA PDO
    class DB{ 
        //PROPIEDADES
        private static $conexion=null; //contendrá la conexión con la BDD  
           
        //METODOS
        //Método que conecta/recupera la conexión
        public static function get():PDO{
            if(!self::$conexion){ //si no estábamos conectados...
                
                //conecta con la BDD, si no puede lanzará una PDOException
                $dsn=SGDB.':host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHARSET;
                self::$conexion = new PDO($dsn, DB_USER, DB_PASS);
                    
            }
            return self::$conexion; //retorna la conexión
        } 
               
        //Método para realizar consultas SELECT que retornan un registro
        //retorna un objeto del tipo indicado por parámetro
        public static function select(string $consulta, string $class='stdClass'){
            $resultado=self::get()->query($consulta);                
            return $resultado->rowCount()? $resultado->fetchObject($class): null;
        }
        
        //Método para realizar consultas SELECT que retornan múltiples registros
        //retorna un array de objetos del tipo indicado por parámetro
        public static function selectAll(string $consulta, string $class='stdClass'):array{
            $resultado=self::get()->query($consulta);
            
            $objetos=[];
            while($r=$resultado->fetchObject($class))
                $objetos[]=$r;
            
            return $objetos;
        }
        
        //Método para realizar consultas INSERT
        //retorna el id del último objeto insertado o false si falla
        public static function insert(string $consulta){            
            if(!self::get()->query($consulta)) return false;
            return self::get()->lastInsertId();
        }     
        //Método para realizar consultas UPDATE
        //retorna el número de filas afectadas, o false si falla
        public static function update(string $consulta){
            $resultado=self::get()->query($consulta);
            return $resultado? $resultado->rowCount(): false;
        }
        //Método para realizar consultas DELETE
        //retorna el número de filas afectadas, o false si falla
        public static function delete(string $consulta){
            $resultado=self::get()->query($consulta);
            return $resultado? $resultado->rowCount(): false;
        }
        
       // Método para escapar carácteres especiales
        public static function escape(string $texto){
            // retorna el texto con los carácteres especiales convertidos en entidad
            return htmlspecialchars($texto);
        }
 
    }
    
  