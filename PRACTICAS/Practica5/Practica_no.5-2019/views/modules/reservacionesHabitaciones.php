<?php


?>
<!-- VISTA DE Habitaciones -->
<h1>Reservaciones de Habitaciones</h1>
<!-- TABLA DE PRODUCTOS -->
	<table class="table table-dark" border="1">

		<thead>
			<!-- COLUMNAS DE PRODUCTOS -->
			<tr>
				<th>Reserva de habitacion</th>
				<th>Numero de habitacion</th>
				<th>Numero del cliente</th>
        <th>Numero de reservacion</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>

			<?php
	//OBJETO DE CONTROLADOR Y LLAMADA DE METODOS DE VISTA DE PRODUCTOS Y BORRAR PRODUCTOS
			$vistaReservacion = new MvcController();
			$vistaReservacion -> vistaReservacionHabitacionController();
			//$vistaReservacion -> borrarReservacionHabitacionController();

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
