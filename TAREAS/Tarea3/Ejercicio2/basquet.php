<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BASQUETBOL</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body style="background:url('basquet.jpg'); opacity:0.95;">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Basquetbolistas*</b></h2></div>
                    <div class="col-sm-4">
                        <a href="createBasquetbolista.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Basquetbolista</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Posicion</th>
                        <th>Carrera</th>
			            <th width = "200px">E-mail</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                 
                <tbody>    
                <?php 
                //Incluimos el archivo database
                    include ('database.php');

                    //Creamos un objeto de la clase DataBase
                    $basquet = new Database();
                    //Asignamos a la variable listado el valor de la funcion read
                    $listado=$basquet->readB();

                    //Recorremos mediante el while la cantidad de columnas de la tabla
                    
                    foreach($listado as $lista){

                    //while ($row=mysqli_fetch_object($listado)){
                    $id=$lista->id;

                    //Creamos las variables y les asignamos el valor de la columna
                    $nombre=$lista->nombre;
                    $posicion=$lista->posicion;
                    $carrera=$lista->carrera;
                    $email=$lista->email;
                ?>
                <!-- Imprimimos dentro de una tabla os valores que tiene cada fila de la tabla -->
                    <tr>
                        
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $posicion;?></td>
                    <td><?php echo $carrera;?></td>
                    <td><?php echo $email;?></td>
                    <td>
                    <!-- Botons que permiten mandar a paginas de eliminar y modificar -->
                    <a href="updateBasquetbolista.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    <a href="deleteBasquetbolista.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                    </tr>	
                    <?php
                    }
                    ?>    
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>