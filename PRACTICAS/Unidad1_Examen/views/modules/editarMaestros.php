<h1>EDITAR CONTACTOS</h1>

<form method="post">

	<?php
//LLAMA AL METOD DE EDITAR USUARIO Y ACTUALIZAR USUARIO
	$editarUsuario = new MvcController();
	$editarUsuario -> editarMaestrosController();
	$editarUsuario -> actualizarMaestroController();

	?>

</form>
