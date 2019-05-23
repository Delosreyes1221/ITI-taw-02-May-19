<h1>REGISTRO DE CLIENTES</h1>
<!-- VISTA DE REGISTRO DE USUARIOS CON INPUT DE REGISTRO DE USUARIOS -->
<form method="post">
	<!-- INPUT DE NOMBRE DE CLIENTE -->
	<input type="text" placeholder="Nombre" name="nombreRegistro" required>
<!-- INPUT DE CONTRASEÑA -->
	<input type="email" placeholder="Email" name="emailRegistro" required>
<!-- INPUT DE EMAIL -->
	<input type="text" placeholder="Telefono" name="telefonoRegistro" required>
<!-- SELECT TIPO DE HABITACION -->
<!-- Label TIPO DE HABITACION -->



<!-- INPUT DE BOTON DE GUARDAR O ENVIAR -->
	<input type="submit" type="button" class="btn btn-success" value="Enviar">

</form>

<?php
//LAMA AL MAETODO DE REGSITRO DE USUARIO NUEVO
$registro = new MvcController();
$registro -> registroClienteController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
