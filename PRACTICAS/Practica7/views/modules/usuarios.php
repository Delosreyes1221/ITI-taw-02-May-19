
<h1 class="text-center">ALUMNOS</h1>

<div>
	<a href="index.php?action=registro" class="btn btn-primary">AGREGAR ALUMNO</a>
	<br><br>
</div>


<!-- TABLA DE USUARIOS -->
	<table class="table" border="2">

		<thead>
			<tr>
				<th>Nombre</th>
				<th>Matricula</th>
				<th>Fecha de nacimiento</th>
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
