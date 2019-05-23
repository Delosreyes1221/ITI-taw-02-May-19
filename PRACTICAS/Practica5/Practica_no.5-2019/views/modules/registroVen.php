<?php
//VERIFICA Y VALIDA SESION
session_start();
error_reporting(0);
if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}
?>
<!-- VISTA PARA EL REGSITRO DE VENTAS -->
<h1>REGISTRO DE VENTAS</h1>

<form method="post">
	<!-- INPUT PARA REGISTRAR VENTAS -->
	<input type="text" placeholder="Producto ID" name="productoRegistro" required>

	<input type="text" placeholder="Cantidad" name="cantidadRegistro" required>

	<input type="submit" type="button" class="btn btn-success" value="Enviar">

</form>

<?php
//LLAMA AL METODO PARA REGISTRAR POR EL CONTROLADOR
$registro = new MvcController();
$registro -> registroVentaController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okVen"){

		echo "Registro Exitoso";
	
	}

}
