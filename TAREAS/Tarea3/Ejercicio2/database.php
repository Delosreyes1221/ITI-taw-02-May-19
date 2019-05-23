<?php
    //clase para conectarnos a la bd
    class Database{
        private $dbuser = "root";
        private $dbpass = "";
        private $con;
        private $dbhost = "localhost";
        private $dbname = "tarea4";
        private $pdo;
        private $dsn = 'mysql:dbname=tarea4;host=localhost';
        

        //Constructor de la clase
        function __construct(){
            $this->connect_db();
        }

        //Metodo de conexion a la bd
        public function connect_db(){
              $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
           
            try{
                 $this->pdo = new PDO($this->dsn, $this->dbuser, $this->dbpass);
             } catch(PDOException $e){
                 echo 'Error al conectarnos' . $e->getMessage();
             }

        }

        public function sanitize($var){
            $return = mysqli_real_escape_string($this->con, $var);
            return $return;
        }

        //Funcion para leer los datos de la taba futbol
        public function read(){
            
            $sentencia = $this->pdo->query("SELECT * FROM futbol");
            $res = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $res;

        }

        //Funcion para leer los datos de la tabla basket
        public function readB(){
            $sentencia = $this->pdo->query("SELECT * FROM basket");
            $res = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return $res;

        }

        //Funcion para crear un nuevo futbolista
        public function createFut ($nombre, $posicion, $carrera, $email){
        
            $sentencia = $this->pdo->prepare("INSERT INTO futbol (nombre, posicion, carrera, email) VALUES (?, ?,  ?, ?);");
            $res = $sentencia->execute([$nombre, $posicion, $carrera, $email]);
             if($res){
                 return true;
             }else{
                 return false;
             }
            
        }
        //Funcion para crear un nuevo basquetbolista
        public function createB ($nombre, $posicion, $carrera, $email){
            $sentencia = $this->pdo->prepare("INSERT INTO basket (nombre, posicion, carrera, email) VALUES (?, ?,  ?, ?);");
            $res = $sentencia->execute([$nombre, $posicion, $carrera, $email]);
             if($res){
                 return true;
             }else{
                 return false;
             }
            
            
        }

        

        //Funcion para traer datos de la tabla futbol mediante el id
        public function single_record($id){
             $sql = "SELECT * FROM futbol WHERE id = '$id'";
             $res = mysqli_query($this->con, $sql);
             $return = mysqli_fetch_object($res);
             return $return;
         
        }

        //Funcion para traer los datos de la tabla basket mediante el id
        public function single_recordB($id){
            $sql = "SELECT * FROM basket WHERE id = '$id'";
            $res = mysqli_query($this->con, $sql);
            $return = mysqli_fetch_object($res);
            return $return;
        }

        //Funcion para acutulizar los datos de la tabla futbol
        public function update ($nombre, $posicion, $carrera, $email, $id){
        

            $sentencia = $this->pdo->prepare("UPDATE futbol SET nombre = ?, posicion = ?, carrera = ?, email = ? WHERE id = ?");
            $res = $sentencia->execute([$nombre, $posicion, $carrera, $email, $id]);
             if($res){
                 return true;
             }else{
                 return false;
             }
        }

         //Funcion para acutulizar los datos de la tabla basket
        public function updateB ($nombre, $posicion, $carrera, $email, $id){
            $sentencia = $this->pdo->prepare("UPDATE basket SET nombre = ?, posicion = ?, carrera = ?, email = ? WHERE id = ?");
            $res = $sentencia->execute([$nombre, $posicion, $carrera, $email, $id]);
             if($res){
                 return true;
             }else{
                 return false;
             }
        }

        //Funcion para eliminar una fila de la tabla futbol
        public function delete($id){
            
            $sentencia = $this->pdo->prepare("DELETE FROM futbol WHERE id = ?");
            $res = $sentencia->execute([$id]);
             if($res){
                 return true;
             }else{
                 return false;
             }

        }
        
        //Funcion para eliminar una fila de la tabla futbol
        public function deleteB($id){
            $sentencia = $this->pdo->prepare("DELETE FROM basket WHERE id = ?");
            $res = $sentencia->execute([$id]);
             if($res){
                 return true;
             }else{
                 return false;
             }
        }
    }
?>