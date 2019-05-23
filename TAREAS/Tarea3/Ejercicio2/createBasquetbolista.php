<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
	<title>Agregar Basquetbolista</title>
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Roboto|Varela-Round|Open-Sans">
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Material+Icons">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css/css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body style="background:url('basquet.jpg'); opacity:0.95;">
    <div class = "container">
        <div class = "table-wrapper">
            <div class = "table-title">
                <div class = "row">
                    <div class = "col-sm-8"><h2>Agregar <b>Basquetbolista</b></h2></div>
                    <div class = "col-sm-4">
                        <a href = "basquet.php" class = "btn btn-info add-new"><i class = "fa fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
            </div>
            <?php
            //Incluimos el archivo database 
                include ("database.php");
            //Creamos un objeto de la clase database
                $basquet = new Database();
                //comprobamos si existe el metodo post
                if(isset($_POST) && !empty($_POST)){

                    //Creamos las variables que almacenan los datos para insertar una nueva fila
                    $nombre = $basquet->sanitize($_POST['nombre']);
                    $posicion = $basquet->sanitize($_POST['posicion']);
                    $carrera = $basquet->sanitize($_POST['carrera']);
                    $email = $basquet->sanitize($_POST['email']);
 //                   $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);

                    //Se crea una variable a la que se le asina el valor de la funcion crear y se envian los valores de las variables anteriores
                    $res = $basquet->createB($nombre, $posicion, $carrera, $email);
                    if($res){
                        $message = "Datos insertados con exito";
                        $class = "Alert alert-success";
                    }else{
                        $message = "No se pudieron insertar los datos";
                        $class = "Alert alert-danger";
                    }
                    ?>
                    <div class = "<?php echo $class;?>">
                        <?php echo $message;?>
                    </div>
                    <?php
                }
            ?>

            <!-- Se crean los inputs donde se muestra la informacion meidante el id -->
            <div class = "row">
                <form action="" method = "post">
                    <div class = "col-md-6">
                        <label for="">Nombre:</label>
                        <input type="text" name = "nombre" id = "nombre" class = "form-control" maxlenght = "100" required>
                    </div>

                    <div class = "col-md-6">
                        <label for="">Posicion:</label>
                        <input type="text" name = "posicion" id = "posicion" class = "form-control" maxlenght = "100" required>
                    </div>

                    <div class = "col-md-6">
                        <label for="">Carrera:</label>
                        <input type="text" name = "carrera" id = "carrera" class = "form-control" maxlenght = "100" required>
                    </div>

                    <div class = "col-md-6">
                        <label for="">Correo electronico:</label>
                        <input type="text" name = "email" id = "email" class = "form-control" maxlenght = "100" required>
                    </div>
                 

                    <div class = "col-md-12 pull-right">
                        <hr><button type = "submit" class = "btn btn-success">Guardar datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>