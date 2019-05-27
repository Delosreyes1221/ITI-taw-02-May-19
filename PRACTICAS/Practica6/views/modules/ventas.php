<?php
//INICIA SESION



?>
<!-- VISTA DE VENTAS -->
<h1>VENTAS</h1>
<!-- TABLA DE VENTAS -->
	<table class="table table-dark" border="1">

		<thead>

			<tr>
			<!-- COLUMNAS DE VENTAS -->
				<th>Producto ID</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Promedio por prenda</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>

			<?php
			///OBJETO DE CONTROLADOR
			$vistaVentas = new MvcController();
			//LLAMAMOS VISTA DE VENTAS
			$vistaVentas -> vistaVentasController();
			//LLAMAMOS METODO PARA BORRAR VENTAS
			$vistaVentas -> borrarVentasController();

			?>

		</tbody>

	</table>

<?php
//EN CASO DE HABER ALGO CORRECTO ENVIAR ACTION
if(isset($_GET["action"])){

	if($_GET["action"] == "cambioVen"){

		echo "Cambio Exitoso";

	}

}

?>
