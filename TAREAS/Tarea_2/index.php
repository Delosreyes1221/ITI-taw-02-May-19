<?php
    require "conexion.php";
?>
<html>
    <head>
        <title>Formulario con Mysql</title>
        <style>
            div{
                margin:30px;
            }
        </style>
    </head>
<body>
<form action="" method="POST">
    <div style="border:solid gray; float: left;">
        <h2 align="center">Alumnos</h2>
        <div>
            <label for="nombre">Matricula: </label>
            <input type="text" name="matricula" placeholder="Ingresa tu matricula">
        </div>
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombreA" placeholder="Ingresa tu nombre">
        </div>
        <div>
            <label for="nombre">Carrera: </label>
            <input type="text" name="carreraA" placeholder="Ingresa tu carrera">
        </div>
        <div>
            <label for="nombre">Email: </label>
            <input type="text" name="emailA" placeholder="Ingresa tu email">
        </div>
        <div>
            <label for="nombre">Telefono: </label>
            <input type="text" name="telefonoA" placeholder="Ingresa tu telefono">
        </div>
        <div><input type="submit" value="Agregar" name="enviarA"></div>
    </div>

    <div style="border:solid gray; float: left;">
        <h2 align="center">Maestro</h2>
        <div>
            <label for="nombre">No. de empleado: </label>
            <input type="text" name="no_empleado" placeholder="Ingresa tu numero de empleado">
        </div>
        <div>
            <label for="nombre">Carrera: </label>
            <input type="text" name="carreraM" placeholder="Ingresa tu carrera">
        </div>
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombreM" placeholder="Ingresa tu nombre">
        </div>
        <div>
            <label for="nombre">Telefono: </label>
            <input type="text" name="telefonoM" placeholder="Ingresa tu telefono">
        </div>
        <div><input type="submit" value="Agregar" name="enviarM"></div>
    </div>
    </form>

    <?php
        include "poo.php";
        //Instanciamos a la clase Enviar
        $Objeto = new Enviar();
        
        //Preguntamos si existe el boton enviarA
        if(isset($_POST['enviarA'])){
            
            //Creamos las variables que guardan el valor de las cajas de texto
            $nombreA  = $_POST['nombreA'];
            $matricula = $_POST['matricula'];
            $carreraA = $_POST['carreraA'];
            $emailA = $_POST['emailA'];
            $telefonoA = $_POST["telefonoA"];

            
            //Se manda llamar la funcion y se envian los parametros 
            $Objeto->insertarAlumno($nombreA, $matricula, $carreraA, $emailA, $telefonoA);
        }

        if (isset($_POST['enviarM'])){

            //Creamos las variables que guardan el valor de las cajas de texto
            $nombreM  = $_POST['nombreM'];
            $no_empleado = $_POST['no_empleado'];
            $carreraM = $_POST['carreraM'];
            $telefonoM = $_POST["telefonoM"];

            //Se manda llamar la funcion y se envian los parametros 
            $Objeto->insertarMaestro($no_empleado, $carreraM, $nombreM, $telefonoM);

        }
    ?>
</body>
</html>

