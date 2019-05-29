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

				$ingreso->pagina();
				?>



	
</body>
</html>
