<?php
//VALIDA LA SESION SI NO REGRESA A INGRESAR
session_start();
if(!$_SESSION["validar"]){
	header("location:index.php?action=ingresar");
	exit();
}

?>
<!-- VISTA DE EDITAR VENTAS -->
<h1>EDITAR VENTA</h1>

<form method="post">
	
	<?php
//LLAMA AL METODO DE EDITAR VENTA Y ACTUALIZA VENTA
	$editarVenta = new MvcController();
	$editarVenta -> editarVentaController();
	$editarVenta -> actualizarVentaController();

	?>

</form>

