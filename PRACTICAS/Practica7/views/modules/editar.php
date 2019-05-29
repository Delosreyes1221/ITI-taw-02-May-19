
<!-- VISTA DE EDICION DE USUARIO -->
<h1>EDITAR USUARIO</h1>

<form method="post">

	<?php
//LLAMA AL METOD DE EDITAR USUARIO Y ACTUALIZAR USUARIO
	$editarUsuario = new MvcController();
	$editarUsuario -> editarAlumnosController();
	$editarUsuario -> actualizarAlumnoController();

	?>

</form>
