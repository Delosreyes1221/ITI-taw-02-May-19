<?php
//VERIFICA SESION SI NO REGRESA A VISTA DE INGRESAR 
session_start();
error_reporting(0);
if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<!-- VISTA DE Habitaciones -->
<h1>Reservaciones</h1>
<!-- TABLA DE PRODUCTOS -->
	<table class="table table-dark" border="1">
		
		<thead>
			<!-- COLUMNAS DE PRODUCTOS -->
			<tr>
				<th>Numero de reservacion </th>
				<th>Tipo de habitacion</th>
				<th>Noches de hospedaje</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php
	//OBJETO DE CONTROLADOR Y LLAMADA DE METODOS DE VISTA DE PRODUCTOS Y BORRAR PRODUCTOS
			$vistaReservacion = new MvcController();
			$vistaReservacion -> vistaReservacionController();
			$vistaReservacion -> borrarReservacionController();

			?>

		</tbody>

	</table>

<?php
//VERIFICA ACTION DE CAMBIO
if(isset($_GET["action"])){

	if($_GET["action"] == "cambioRes"){

		echo "Cambio Exitoso";
	
	}

}

?>
