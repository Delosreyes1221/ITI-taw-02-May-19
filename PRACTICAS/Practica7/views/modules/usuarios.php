
<h1 class="text-center">ALUMNOS</h1>

<div class="row-spacing mb-3">
	<a href="index.php?action=registro" class="btn btn-primary">AGREGAR ALUMNO</a>
</div>


<!-- TABLA DE USUARIOS -->
	<table class="table" border="2">

		<thead>
			<!-- COLUMNAS DE USUARIOS -->
			<!-- <tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th></th>
				<th></th>
			</tr> -->
			<tr>
				<th>Matricula</th>
				<th>Nombre</th>
				<th>Fecha de nacimiento</th>
				<th></th>
				<th></th>
			</tr>

		</thead>

		<tbody>

			<?php
			//CREAR OBJETO DE CONTROLADOR Y LLAMA METODO DE VISTA DE USUARIOS Y BORRAR USUARIOS
			// $vistaUsuario = new MvcController();
			// $vistaUsuario -> vistaUsuariosController();
			// $vistaUsuario -> borrarUsuarioController();

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
