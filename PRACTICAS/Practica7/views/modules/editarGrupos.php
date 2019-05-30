
<!-- VISTA DE EDICION DE GRUPOS -->
<h1>EDITAR GRUPOS</h1>

<form method="post">

	<?php
//LLAMA AL METOD DE EDITAR USUARIO Y ACTUALIZAR USUARIO
	$editarUsuario = new MvcController();
	$editarUsuario -> editarGruposController();
	$editarUsuario -> actualizarGruposController();

	?>

</form>
