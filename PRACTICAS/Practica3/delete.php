<?php
	/*if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
	}*/

	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
		/*$res = $cliente->delete($id);
		if($res){
			header('location: index.php');
		}else{
			echo "Error al eliminar el registro";
		}*/
	}else{
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Programación Orientada a Objetos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Eliminar <b>Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$clientes= new Database();
				if(isset($_POST) && !empty($_POST)){
					$nombres = $clientes->sanitize($_POST['nombres']);
					$apellidos = $clientes->sanitize($_POST['apellidos']);
					$telefono = $clientes->sanitize($_POST['telefono']);
					$direccion = $clientes->sanitize($_POST['direccion']);
					$correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
					$id_cliente=intval($_POST['id_cliente']);
					$res = $clientes->delete($id_cliente);

					if($res){
						header('location: index.php');
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
				$datos_cliente=$clientes->single_record($id);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input readonly = "readonly" type="text" name="nombres" id="nombres" class='form-control' maxlength="100" required  value="<?php echo $datos_cliente->nombres;?>">
					<input type="hidden" name="id_cliente" id="id_cliente" class='form-control' maxlength="100"   value="<?php echo $datos_cliente->id;?>">
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input readonly = "readonly" type="text" name="apellidos" id="apellidos" class='form-control' maxlength="100" required value="<?php echo $datos_cliente->apellidos;?>">
				</div>
				<div class="col-md-12">
					<label>Dirección:</label>
					<textarea  readonly = "readonly" name="direccion" id="direccion" class='form-control' maxlength="255" required><?php echo $datos_cliente->direccion;?></textarea>
				</div>
				<div class="col-md-6">
					<label>Teléfono:</label>
					<input readonly = "readonly" type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required value="<?php echo $datos_cliente->telefono;?>">
				</div>
				<div class="col-md-6">
					<label>Correo electrónico:</label>
					<input readonly = "readonly" type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlength="64" required value="<?php echo $datos_cliente->correo_electronico;?>">
				
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-danger">Eliminar Cliente</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>

<?php 
/*
if (isset($_GET['id'])){
	include('database.php');
	$cliente = new Database();
	$id=intval($_GET['id']);
	$res = $cliente->delete($id);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
*/
?>