<?php
//VALIDA LA SESION SI NO MANDA A VISTA DE INGRESAR
session_start();
if(!$_SESSION["validar"]){
	header("location:index.php?action=ingresar");
	exit();
}

?>
<!-- VISTA DE EDICION DE USUARIO -->
<h1>EDITAR USUARIO</h1>

<form method="post">
	
	<?php
//LLAMA AL METOD DE EDITAR USUARIO Y ACTUALIZAR USUARIO
	$editarUsuario = new MvcController();
	$editarUsuario -> editarUsuarioController();
	$editarUsuario -> actualizarUsuarioController();

	?>

</form>



