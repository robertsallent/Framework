<?php   

    // Clase Usuario del modelo
    class Usuario{
    
        // PROPIEDADES
        public $id=0, $usuario='', $clave='', $nombre='', $apellido1='', $apellido2='',
               $privilegio=0, $administrador=0, $email='', 
               $imagen='', $created_at='', $updated_at='';
        
               
       // Método que usaremos para comprobar el login. 
       // Permitiremos la identificación por email o usuario.
       // Si la identificación es correcta retorna el usuario, en caso contrario NULL.
       
       public static function identificar(string $u='', string $p=''):?Usuario{           
           $consulta="SELECT * FROM usuarios 
                      WHERE (usuario='$u' OR email='$u') AND clave='$p'";
           
           return DB::select($consulta, self::class);
       }
       
       
       // recupera un usuario a partir de usuario+email
       // se usará para el proceso de "olvidé mi clave"
       
       public static function getByUserMail(string $u, string $e):?Usuario{
           $consulta="SELECT * FROM usuarios
                      WHERE usuario='$u' AND email='$e'";
           
           return DB::select($consulta, self::class);
       }
       
       
       // METODOS DEL CRUD
       
       // registrar un nuevo usuario.
       
       public function guardar(){
           
           $consulta="INSERT INTO usuarios(
                          usuario, clave, nombre, apellido1, apellido2,
                          privilegio, administrador, email)
                       VALUES(
                          '$this->usuario','$this->clave', '$this->nombre',
                          '$this->apellido1', '$this->apellido2',
                           $this->privilegio, $this->administrador, '$this->email')";
                                
           return DB::insert($consulta); //conectar y ejecutar
       }
       
       
          
        // recuperar todos los usuarios 
        public static function get():array{
            $consulta="SELECT * FROM usuarios"; //preparar la consulta
            return DB::selectAll($consulta, self::class); 
        }
        
        // recuperar un usuario concreto por id
        public static function getById(int $id):?Usuario{
            $consulta="SELECT * FROM usuarios WHERE id=$id";
            return DB::select($consulta, self::class);  
        }
        
        //recuperar usuarios con un filtro 
        public static function getFiltered(
            string $c='user', string $v='', string $o='id', string $s='ASC'):array{ 
            
            $consulta="SELECT * FROM usuarios WHERE $c LIKE '%$v%' ORDER BY $o $s"; 
            return DB::selectAll($consulta, self::class); 
        }
        
       
       
        
        //actualizar un usuario
        public function actualizar(){

            $consulta="UPDATE usuarios SET
                          usuario='$this->usuario',
                          clave='$this->clave', 
                          nombre='$this->nombre', 
                          apellido1='$this->apellido1',
                          apellido2='$this->apellido2', 
                          privilegio=$this->privilegio,
                          administrador=$this->administrador,
                          email='$this->email'
                        WHERE id=$this->id";
        
            return DB::update($consulta);
        }
        
        //borrar un usuario existente
        public static function borrar(int $id){
            $consulta="DELETE FROM usuarios WHERE id=$id;";
            return DB::delete($consulta);
        }
        
        //__toString
        public function __toString():string{
            return "$this->id: $this->usuario ($this->email) $this->nombre $this->apellido1";
        }
    }
    
    
    
