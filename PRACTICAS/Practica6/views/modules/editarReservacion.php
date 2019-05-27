<!-- VISTA DE EDICION DE RESERVACIONES -->
<h1>EDITAR RESERVACION</h1>

<form method="post">
	
	<?php
//LLAMA AL METODO DE EDITAR PRODUCTO Y ACUTLAIZAR PRODUCTO
	$editarProducto = new MvcController();
	$editarProducto -> editarReservacionController();
	$editarProducto -> actualizarReservacionController();

	?>

</form>
