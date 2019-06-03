
<h1 class="text-center">MATERIAS</h1>

<div class="row-spacing mb-3">
	<a href="index.php?action=registroMateria" class="btn btn-primary">AGREGAR MATERIA</a>
  <br><br>
</div>


<!-- TABLA DE USUARIOS -->
	<table class="table" border="2">

		<thead>
			<tr>
				<th>Numero de materia</th>
				<th>Nombre</th>
				<th>Maestro que la imparte</th>
				<th></th>
				<th></th>
        <th></th>
				<th></th>
			</tr>

		</thead>

		<tbody>

			<?php

			$vistaMaterias = new MvcController();
			$vistaMaterias -> vistaMateriasController();
		  $vistaMaterias -> borrarMateriaController();

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
