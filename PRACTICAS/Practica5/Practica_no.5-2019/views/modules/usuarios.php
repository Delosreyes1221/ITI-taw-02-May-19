<?php
//VALIDA SESION SI NO MANDA AL MENO DE INGRESAR
session_start();
error_reporting(0);
if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<!-- VISTA DE USUARIOS -->
<h1>Clientes</h1>
<!-- TABLA DE USUARIOS -->
	<table class="table table-dark" border="1">
		
		<thead>
			<!-- COLUMNAS DE USUARIOS -->
			<tr>
				<th>Nombre</th>
				<th>Email</th>
				<th>Telefono</th>
				
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody>
			
			<?php
			//CREAR OBJETO DE CONTROLADOR Y LLAMA METODO DE VISTA DE USUARIOS Y BORRAR USUARIOS
			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaClientesController();
			$vistaUsuario -> borrarClientesController();

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




