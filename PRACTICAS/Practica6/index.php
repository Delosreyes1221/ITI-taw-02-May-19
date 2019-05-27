<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
	<form action="#" class="frm-single" method="POST">
		<div class="inside">
			<div class="title"><strong>Iniciar</strong>Sesión</div>

			<div class="frm-input"><input type="text" placeholder="USUARIO" name="usuarioIngreso" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" placeholder="CONTRASEÑA"  name="passwordIngreso" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<input type="submit" type="button" class="btn btn-success" value="Enviar">
			<!-- <button type="submit" class="frm-submit">INGRESAR<i class="fa fa-arrow-circle-right"></i></button> -->

</form>
				<?php
				//SE LLAMA A LOS ENLACES DE LOS MODELOS
				require_once "models/enlaces.php";
				//SE LLAMA AL CRUD DE LOS MODELOS
				require_once "models/crud.php";
				//SE LLAMA AL CONTROLADOR
				require_once "controllers/controller.php";
				//OBJETO DE CONTROLADOR
				$ingreso = new MvcController();
				$ingreso -> ingresoUsuarioController();


				 if(isset($_GET["action"])){

				 	if($_GET["action"] == "fallo"){

				 		echo "Fallo al ingresar";

				 	}

				}
				?>
		</div>
</div>


	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<script src="assets/scripts/main.min.js"></script>
</body>
</html>
