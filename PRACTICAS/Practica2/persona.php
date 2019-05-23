<?php
    //Definir la clase principal
    class Persona {
       
        //Propiedades de la persona son : 
        public $edad;
        public $altura;
        public $peso;
        public $IMC;
        //Obtener valores
        //geters
        public function getEdad(){
            return $this->edad;
        }

        //PESO
        public function getPeso(){
            return $this->peso;
        }

        //Altura
        public function getALtura(){
            return $this->altura;
        }

        //CALCULOS

        //SETTERS

        public function setEdad($value){
            $this->edad = $value;
        }

        public function setPeso($value){
            $this->peso = $value;
        }

        public function setAltura($value){
            $this->altura = $value;
        }

        //Calcular el indeice accediendo a las propeidaes
        public function imc(){
            return $this->peso / ($this->altura * $this->altura);
        }

        public function imc2(){
            return $this->getPeso / ($this->getAltura * $this->getAltura);
        }

        ///Insertar la masa a la BD
        public function insertarMasa(){
            require "conexion.php";

            $consulta = "INSERT INTO imc (edad, peso, altura, imc) VALUES ($this->edad, $this->peso, $this->altura, $this->IMC)";
            $resultado = mysqli_query($config, $consulta) or die ("Error");
        }
        
    }
?>