<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
	<title>CRUD a bd usando POO</title>
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Roboto|Varela-Round|Open-Sans">
    <link rel = "stylesheet" href = "https://fonts.googleapis.com/css?family=Material+Icons">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel = "stylesheet" href = "css/css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class = "container">
        <div class = "table-wrapper">
            <div class = "table-title">
                <div class = "row">
                    <div class = "col-sm-8"><h2>Agregar <b>Cliente</b></h2></div>
                    <div class = "col-sm-4">
                        <a href = "inicio.php" class = "btn btn-info add-new"><i class = "fa fa-arrow-left"></i>Regresar</a>
                    </div>
                </div>
            </div>
            <?php
                //Incluimos el archivo database
                include ("database.php");
                //Creamos un objeto
                $clientes = new Database();
                //Preguntamos si existe el metodo post
                if(isset($_POST) && !empty($_POST)){
                    $nombres = $clientes->sanitize($_POST['nombres']);
                    $apellidos = $clientes->sanitize($_POST['apellidos']);
                    $telefono = $clientes->sanitize($_POST['telefono']);
                    $direccion = $clientes->sanitize($_POST['direccion']);
                    $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
                    $contra = $clientes->sanitize($_POST['contra']);

                    $res = $clientes->create($nombres, $apellidos, $telefono, $direccion, $correo_electronico, $contra);
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
            <div class = "row">
                <form action="" method = "post">
                    <div class = "col-md-6">
                        <label for="">Nombres:</label>
                        <input type="text" name = "nombres" id = "nombres" class = "form-control" maxlenght = "100" required>
                    </div>

                    <div class = "col-md-6">
                        <label for="">Apellidos:</label>
                        <input type="text" name = "apellidos" id = "apellidos" class = "form-control" maxlenght = "100" required>
                    </div>

                    <div class = "col-md-12">
                        <label for="">Direccion:</label>
                        <input type="text" name = "direccion" id = "direccion" class = "form-control" maxlenght = "100" required>
                    </div>

                    <div class = "col-md-6">
                        <label for="">Telefono:</label>
                        <input type="text" name = "telefono" id = "telefono" class = "form-control" maxlenght = "100" required>
                    </div>

                    <div class = "col-md-6">
                        <label for="">Correo electronico:</label>
                        <input type="text" name = "correo_electronico" id = "correo_electronico" class = "form-control" maxlenght = "100" required>
                    </div>

                    <div class = "col-md-6">
                        <label for="">Contraseña:</label>
                        <input type="text" name = "contra" id = "contra" class = "form-control" maxlenght = "100" required>
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