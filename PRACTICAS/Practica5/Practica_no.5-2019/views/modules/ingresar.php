<h1>INGRESAR</h1>
<!-- VISTA DE INGRESO DE SESION CON INPUT -->
	<form method="post">
		<!-- INPUT DE USUARIO -->
		<input type="text" placeholder="Usuario" name="usuarioIngreso" required>
<!-- INPUT DE CONTRASEÑA -->
		<input type="password" placeholder="Contraseña" name="passwordIngreso" required>
<!-- INPUT DE TIPO BOTON PARA GUARDAR -->
		<input type="submit" type="button" class="btn btn-success" value="Enviar">

	</form>

<?php
//LLAMA AL METODO DE INGRESO DE USUARIO O INICIO DE SESION
$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>