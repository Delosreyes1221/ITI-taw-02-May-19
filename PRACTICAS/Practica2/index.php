<html>
    <head>
        <title>IMC</title>
        <style>
            div{
                margin: 20px;
            }
        </style>
    </head>
    <body>
    <form action="" method="POST">
        <div align="center" style="border: solid gray 1px;">
        <h1 style="color: blue;">Indice de Masa Corporal</h1>
        <div>
            <label for="">Edad: </label>
            <input type="text" name="edad"placeholder="Ingresa la edad: ">
        </div>
        <div>
            <label for="">Altura: </label>
            <input type="text" name="altura"placeholder="Ingresa la altura: ">
        </div>
        <div>
            <label for="">Peso: </label>
            <input type="text" name="peso"placeholder="Ingresa el peso: ">
        </div>

        <div>
            <input type="submit" value="Guardar indice" name="enviar">
        </div>

        </div>
    </form>
    </body>
</html>
<?php
    //incluir  la clase
    include 'persona.php';
    //instanciar la clase
    $persona = new Persona();

    if (isset($_POST['enviar'])){

     $EDAD = $_POST['edad']; 
     $ALTURA = $_POST['altura'];
     $PESO = $_POST['peso'];

     $persona->setEdad($EDAD);
     $persona->setAltura($ALTURA);
     $persona->setPeso($PESO);
        
     
    $persona->IMC = $persona->imc();
    //echo $persona->IMC;
    $persona->insertarMasa();
    
    }

    //Mostrar TABLA
    include 'tabla.php';
    


    
?>