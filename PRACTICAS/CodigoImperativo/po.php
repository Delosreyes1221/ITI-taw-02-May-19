<?php
    //Trabajar Con POO

    //Clase
    //Una clase es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento estado o identidad
    //

    class Automovil {
            //propiedades son las caracterisiticas que puede tener un objeto
            public $marca;
            public $modelo;

            //Metodos
            //Es el algoritmo asociado a un objeto que indica la capcidad de lo que este puede hacer
            //La unica diferencia entre metodo y funcion es que llamamos METODO a las funciones de una clase 
            //Mientras que llamamos funciones a los algoritmos de la programacion estructurada
        
            public function mostrar() {
                echo "<p>Hola soy un $this->marca, modelo $this->modelo</p>";
            }
        }


        //Objetos
        //Una entidad provosta de metodos o mensajes a los cuales responde con valores concretos

        $a = new Automovil();
        $a -> marca = "Toyota";
        $a -> modelo = "Corola";
        $a->mostrar();

        $b = new Automovil();
        $b -> marca = "Nissan";
        $b -> modelo = "Tsuru";
        $b->mostrar();

        //Principios de la POO que se cumplen en este ejemplo:

        //1.- Abstraccion: Nuevos tipos de datos, el que se quiera se crea.
        //2.- Encapsulamiento: Organiza el codigo en grupos logico
        //3.- Oculta detalles de implementacion y poner slo lo que sea necesario para el resto del sistema 
?>