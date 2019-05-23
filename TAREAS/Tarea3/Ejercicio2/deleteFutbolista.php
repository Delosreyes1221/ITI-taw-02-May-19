<?php

//Recibe el id que se manda al presionar el boton de eliminar y se asigna a la variable $id

	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	
	}else{
		header("location:futbol.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Eliminar Futbolista</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background:url('futbol.jpg'); opacity:0.95;">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Eliminar <b>Futbolista</b></h2></div>
                    <div class="col-sm-4">
                        <a href="futbol.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				//Incuimos el archivo database 
				include ("database.php");
				//Creamos un objeto de la clase database

				$futbol= new Database();
			 //Comprobamos si existe el metodo post

				if(isset($_POST) && !empty($_POST)){
				//Se crean las variables donde se guardara a informacion 
					$nombre = $futbol->sanitize($_POST['nombre']);
					$carrera = $futbol->sanitize($_POST['carrera']);
					$posicion = $futbol->sanitize($_POST['posicion']);
					$email = $futbol->sanitize($_POST['email']);
					$id_futbol=intval($_POST['id_futbol']);
					//Se crea una variable que guarda el valor de la funcion delete
					$res = $futbol->delete($id_futbol);

					if($res){
						header('location: futbol.php');
					}else{
						echo "Error al eliminar el registro";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				//Se crea una variable que guarda el valor de la lectura de los datos de la tabla basket
				$datos_futbol=$futbol->single_record($id);
			?>
			<!-- Se crean los inputs donde se muestra la informacion al momento de elminar -->
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombre:</label>
					<input readonly = "readonly" type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_futbol->nombre;?>">
					<input type="hidden" name="id_futbol" id="id_futbol" class='form-control' maxlength="100"   value="<?php echo $datos_futbol->id;?>">
				</div>
				<div class="col-md-12">
					<label>Posicion:</label>
					<textarea  readonly = "readonly" name="posicion" id="posicion" class='form-control' maxlength="255" required><?php echo $datos_futbol->posicion;?></textarea>
				</div>
				<div class="col-md-6">
					<label>Carrera:</label>
					<input readonly = "readonly" type="text" name="carrera" id="carrera" class='form-control' maxlength="100" required value="<?php echo $datos_futbol->carrera;?>">
				</div>
				<div class="col-md-6">
					<label>Email:</label>
					<input readonly = "readonly" type="text" name="email" id="email" class='form-control' maxlength="15" required value="<?php echo $datos_futbol->email;?>">
				</div>
				<!-- <div class="col-md-6">
					<label>Correo electrónico:</label>
					<input readonly = "readonly" type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->correo_electronico;?>">
				
				</div> -->
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-danger">Eliminar Futbolista</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>

<?php 

?>