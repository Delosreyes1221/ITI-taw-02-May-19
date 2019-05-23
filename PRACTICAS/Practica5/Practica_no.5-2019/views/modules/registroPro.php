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
<h1>REGISTRO DE HABITACION</h1>
<!-- FORMULARIO CON INPUT DE REGISTRO DE VENTAS -->
<form method="post">
	
	<select name="tipoRegistro" id="">
		<option value="1">Simple</option>
		<option value="2">Doble</option>
		<option value="3">Matrimonial</option>
	</select>

	<!-- <input type="text" placeholder="Tipo" name="tipoRegistro" required> -->

	<input type="text" placeholder="Precio" name="precioRegistro" required>

	<input type="submit" type="button" class="btn btn-success" value="Enviar">

</form>

<?php
//LLAMA AL MEOTDO DE REGISTRAR PRODUCTO
$registro = new MvcController();
$registro -> registroHabitacionesController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okPro"){

		echo "Registro Exitoso";
	
	}

}
