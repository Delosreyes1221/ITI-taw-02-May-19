<?php
//VALIDA LA SESION SI NO MANDA A INGRESAR
session_start();
if(!$_SESSION["validar"]){
	header("location:index.php?action=ingresar");
	exit();
}

?>
<!-- VISTA DE EDICION DE PRODUCTOS -->
<h1>EDITAR PRODUCTO</h1>

<form method="post">
	
	<?php
//LLAMA AL METODO DE EDITAR PRODUCTO Y ACUTLAIZAR PRODUCTO
	$editarProducto = new MvcController();
	$editarProducto -> editarHabitacionController();
	$editarProducto -> actualizarHabitacionController();

	?>

</form>

