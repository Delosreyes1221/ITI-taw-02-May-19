<?php
//VALIDA SESION SI NO MANDA AL MENO DE INGRESAR
session_start();
error_reporting(0);
if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<!-- VISTA DE USUARIOS -->
<h1>Reservacion de habitaciones</h1>
<!-- TABLA DE CLIENTES -->
	
			<?php
			//CREAR OBJETO DE CONTROLADOR Y LLAMA METODO DE VISTA DE USUARIOS Y BORRAR USUARIOS
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaClienteNombreController();
			?>

	
<?php
//VERIFICA ACTION DE CAMBIO
if(isset($_GET["action"])){

	if($_GET["action"] == "cambioReservacionHabitacion"){

		echo "Cambio Exitoso";
	
	}

}

?>
