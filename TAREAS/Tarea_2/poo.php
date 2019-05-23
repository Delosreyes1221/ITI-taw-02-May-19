<?php
    class Enviar {
       //Funcion que sirve para agregar los alumnos a la base de datos
        public function insertarAlumno($nombreA, $matricula, $carreraA, $emailA, $telefonoA){          
            //Conexion con la base de datos
            include "conexion.php";      

            //Consulta par ainsertar a la base de datos
            $consulta = "INSERT INTO alumnos (matricula, nombre, carrera, email, telefono)
            VALUES ('$matricula', '$nombreA', '$carreraA', '$emailA', 
            '$telefonoA')";

            //Ejectuta la sentencia 
             $resultado = mysqli_query($config, $consulta) or die ("Algo esta mal");           
        } 

         //Funcion que sirve para agregar los maestros a la base de datos
         public function insertarMaestro($no_empleado, $carreraM, $nombreM, $telefonoM){          
            //Conexion con la base de datos
            include "conexion.php";      

            //Consulta par ainsertar a la base de datos
            $consulta1 = "INSERT INTO maestros (no_empleado, carrera, nombre, telefono)
            VALUES ('$no_empleado', '$carreraM', '$nombreM', '$telefonoM')";

            //Ejectuta la sentencia 
             $resultado1 = mysqli_query($config, $consulta1) or die ("Algo esta mal");           
        } 
    }
?>