<?php
//VALIDA SESION SI NO REGRESA A VISTA DE INGRESAR
session_start();
error_reporting(0);
if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}
?>
<!-- VISTA DE REGISTRO DE PRODUCTOS -->
<h1>REGISTRO DE PRODUCTO</h1>
<!-- FORMULARIO CON INPUT DE REGISTRO DE VENTAS -->
<form method="post">
	
	<input type="text" placeholder="Producto" name="productoRegistro" required>

	<input type="text" placeholder="Precio" name="precioRegistro" required>

	<input type="submit" type="button" class="btn btn-success" value="Enviar">

</form>

<?php
//LLAMA AL MEOTDO DE REGISTRAR PRODUCTO
$registro = new MvcController();
$registro -> registroProductoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okPro"){

		echo "Registro Exitoso";
	
	}

}
