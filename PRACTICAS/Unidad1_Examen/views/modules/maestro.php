
<h1 class="text-center">CONTACTOS</h1>

<div>
	<a href="index.php?action=registroMaestro" class="btn btn-primary">AGREGAR CONTACTO</a>
	<br><br>
</div>


<!-- TABLA DE USUARIOS -->
	<table class="table" border="2">

		<thead>
			<tr>
				<th>NOMBRE</th>
				<th>APELLIDOS</th>
				<th>EMAIL</th>
				<th>TELEFONO</th>
				<th>CLAVE</th>
				<th></th>
				<th></th>
			</tr>

		</thead>

		<tbody>

			<?php

			$vistaAlumnos = new MvcController();
			$vistaAlumnos -> vistaMaestrosController();
		  $vistaAlumnos -> borrarMaestroController();

			?>

		</tbody>

	</table>


<?php
//VERIFICA ACTION DE CAMBIO
if(isset($_GET["action"])){

	if($_GET["action"] == "cambioMaestro"){

		echo "Cambio Exitoso";

	}

}

?>
