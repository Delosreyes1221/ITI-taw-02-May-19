<?php



?>
<!-- VISTA DE USUARIOS -->
<h1>Reservacion de habitaciones</h1>
<!-- TABLA DE CLIENTES -->
<form class="" action="index.html" method="post">
			<?php
			//CREAR OBJETO DE CONTROLADOR Y LLAMA METODO DE VISTA DE USUARIOS Y BORRAR USUARIOS
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaClienteNombreController();
			?>

	<!-- INPUT DE BOTON DE GUARDAR O ENVIAR -->
		<input type="submit" type="button" class="btn btn-success" value="Enviar">
</form>


<?php

$vistaUsuario -> registroReservacionHabitacionController();




//VERIFICA ACTION DE CAMBIO
if(isset($_GET["action"])){

	if($_GET["action"] == "cambioReservacionHabitacion"){

		echo "Cambio Exitoso";

	}

}

?>
