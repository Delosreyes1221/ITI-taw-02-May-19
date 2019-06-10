
<h1 class="text-center">PROVEEDORES</h1>

<div>
	<a href="index.php?action=registro" class="btn btn-primary">AGREGAR PROVEEDOR</a>
	<br><br>
</div>


<!-- TABLA DE USUARIOS -->
	<table class="table" border="2">

		<thead>
			<tr>
				<th>Clave</th>
				<th>Nombre</th>
				<th>RFC</th>
				<th>Direccion</th>
				<th>Email</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>

		</thead>

		<tbody>

			<?php

			$vistaAlumnos = new MvcController();
			$vistaAlumnos -> vistaAlumnosController();
		  $vistaAlumnos -> borrarAlumnoController();

			?>

		</tbody>

	</table>


<?php
//VERIFICA ACTION DE CAMBIO
if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";

	}

}

?>
