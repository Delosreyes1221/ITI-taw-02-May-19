<?php
///Se recibe el id que envia el boton de actualizar y se asigna a la variable $id

	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:futbol.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Actualizar futbolista</title>
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
                    <div class="col-sm-8"><h2>Editar <b>Futbolista</b></h2></div>
                    <div class="col-sm-4">
                        <a href="futbol.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
			<?php
			 //Incluimos el archivo database
				include ("database.php");
				 //cremaos un objeto a partir de la clase Database
				$futbol= new Database();
                //Comprobamos si existe el metodo post 
				if(isset($_POST) && !empty($_POST)){
					//Creamos las variables para asignar el valor de los campos de texto
					$nombre = $futbol->sanitize($_POST['nombre']);
					$posicion = $futbol->sanitize($_POST['posicion']);
					$carrera = $futbol->sanitize($_POST['carrera']);
					$email = $futbol->sanitize($_POST['email']);
				    //Gudardamos el valor del ID de la fila en la variable id_basquet
					$id_futbol=intval($_POST['id_futbol']);
					$res = $futbol->update($nombre, $posicion, $carrera, $email, $id_futbol);
					  //Si resultado es veradero se ejecuta 
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_futbol=$futbol->single_record($id);
			?>
			  <!--Se crean los inputs para agregar la informacion  -->
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required  value="<?php echo $datos_futbol->nombre;?>">
					<input type="hidden" name="id_futbol" id="id_futbol" class='form-control' maxlength="100"   value="<?php echo $datos_futbol->id;?>">
				</div>
				<div class="col-md-6">
					<label>Posicion:</label>
					<input type="text" name="posicion" id="posicion" class='form-control' maxlength="100" required value="<?php echo $datos_futbol->posicion;?>">
				</div>
				<div class="col-md-12">
					<label>Carrera:</label>
					<textarea  name="carrera" id="carrera" class='form-control' maxlength="255" required><?php echo $datos_futbol->carrera;?></textarea>
				</div>
				<div class="col-md-6">
					<label>Email:</label>
					<input type="text" name="email" id="email" class='form-control' maxlength="15" required value="<?php echo $datos_futbol->email;?>">
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>