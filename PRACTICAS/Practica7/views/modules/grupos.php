
<h1 class="text-center">GRUPOS</h1>

<div>
	<a href="index.php?action=registroGrupos" class="btn btn-primary">AGREGAR GRUPO</a>
	<br><br>
</div>


<!-- TABLA DE USUARIOS -->
	<table class="table" border="2">

		<thead>
			<tr>
				<th>Numero de grupo</th>
				<th>Nombre del grupo</th>
				<th></th>
				<th></th>
        <th></th>
				<th></th>
			</tr>

		</thead>

		<tbody>

			<?php

			$vistaAlumnos = new MvcController();
			$vistaAlumnos -> vistaGruposController();
		  $vistaAlumnos -> borrarGrupoController();

			?>

		</tbody>

	</table>


<?php
//VERIFICA ACTION DE CAMBIO
if(isset($_GET["action"])){

	if($_GET["action"] == "cambioGrupo"){

		echo "Cambio Exitoso";

	}

}

?>
