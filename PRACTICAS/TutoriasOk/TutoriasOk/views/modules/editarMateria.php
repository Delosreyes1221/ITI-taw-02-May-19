
<!-- VISTA DE EDICION DE MATERIA -->
<h1>EDITAR MATERIA</h1>

<form method="post">

	<?php
//LLAMA AL METOD DE EDITAR USUARIO Y ACTUALIZAR USUARIO
	$editarUsuario = new MvcController();
	$editarUsuario -> editarMateriaController();
	$editarUsuario -> actualizarMateriaController();

	?>

</form>
