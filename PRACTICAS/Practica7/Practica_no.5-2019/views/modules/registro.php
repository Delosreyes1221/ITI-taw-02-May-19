<h1>REGISTRO DE USUARIO</h1>
<!-- VISTA DE REGISTRO DE USUARIOS CON INPUT DE REGISTRO DE USUARIOS -->
<form method="post">
	<!-- INPUT DE NOMBRE DE USUARIO -->
	<input type="text" placeholder="Usuario" name="usuarioRegistro" required>
<!-- INPUT DE CONTRASEÑA -->
	<input type="password" placeholder="Contraseña" name="passwordRegistro" required>
<!-- INPUT DE EMAIL -->
	<input type="email" placeholder="Email" name="emailRegistro" required>
<!-- INPUT DE BOTON DE GUARDAR O ENVIAR -->
	<input type="submit" type="button" class="btn btn-success" value="Enviar">

</form>

<?php
//LAMA AL MAETODO DE REGSITRO DE USUARIO NUEVO
$registro = new MvcController();
$registro -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
