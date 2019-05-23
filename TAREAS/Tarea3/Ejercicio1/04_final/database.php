<?php
    //clase para conectarnos a la bd
    class Database{
        private $con;
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpass = "";
        private $dbname = "tarea4";

        public $num_usu = 0;
        public $num_status;
        public $num_user_log;
        public $num_user_type;


        function __construct(){
            $this->connect_db();
        }

        //Metodo de conexion a la bd
        public function connect_db(){
            $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
            if (mysqli_connect_error()){
                die ("conexion a la base de datos fallida".mysqli_connect_error());
            }
        }

        public function leerUser_log(){
            $sql = "SELECT * FROM user_log";
            $res = mysqli_query($this->con, $sql);                   
            return $res;
        }

        public function leerUsuario(){
            $sql = "SELECT * FROM user";
            $res = mysqli_query($this->con, $sql);
            return $res;
        }

        public function leerStatus(){
            $sql = "SELECT * FROM status";
            $res = mysqli_query($this->con, $sql);
            return $res;
        }

        public function leerUser_type(){
            $sql = "SELECT * FROM user_type";
            $res = mysqli_query($this->con, $sql);
            return $res;
        }

        public function cont_Usuario(){
            $sql = "SELECT * FROM user";
            $res = mysqli_query($this->con, $sql);
            $numero = mysqli_num_rows($res);                    
            return $numero;
        }
     
        public function cont_Status(){
            $sql = "SELECT * FROM status";
            $res = mysqli_query($this->con, $sql);
            $numero = mysqli_num_rows($res);                    
            return $numero;
        }

        public function cont_Log(){
            $sql = "SELECT * FROM user_log";
            $res = mysqli_query($this->con, $sql);
            $numero = mysqli_num_rows($res);                    
            return $numero;
        }

        public function activos(){
            $sql = "SELECT * FROM status WHERE Name = 'Inactivo'"; 
            $res = mysqli_query($this->con, $sql);
            $numero = mysqli_num_rows($res);                    
            return $numero;
        }
        
        public function inactivos(){
            $sql = "SELECT * FROM status WHERE Name = 'Inactivo'";
            $res = mysqli_query($this->con, $sql);
            $numero = mysqli_num_rows($res);                    
            return $numero;
        }

        
        
        
    }
?>