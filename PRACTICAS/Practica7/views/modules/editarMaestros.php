<h1>EDITAR MAESTROS</h1>

<form method="post">

	<?php
//LLAMA AL METOD DE EDITAR USUARIO Y ACTUALIZAR USUARIO
	$editarUsuario = new MvcController();
	$editarUsuario -> editarMaestrosController();
	$editarUsuario -> actualizarMaestroController();

	?>

</form>
