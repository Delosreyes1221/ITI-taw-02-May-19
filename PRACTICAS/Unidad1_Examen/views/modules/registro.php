
<h1 class="text-center">REGISTRO DE PROVEEDORES</h1>
<!-- VISTA DE REGISTRO DE USUARIOS CON INPUT DE REGISTRO DE USUARIOS -->
<form method="post">
	<div class="row-spacing float-center align-items-center">
	<!-- INPUT DE NOMBRE DEL ALUMNO -->
	<div class="row-spacing col-lg-12">
	<div class="form-group col-lg-7">
	  <label for="usr">CLAVE:</label>
	  <input type="text" class="form-control" name="claveIngreso" required>
	</div>
	<div class="row-spacing col-lg-12">
	<div class="form-group col-lg-7">
	  <label for="usr">NOMBRE:</label>
	  <input type="text" class="form-control" name="nombreIngreso" required>
	</div>
<!-- INPUT DE CONTRASEÑA -->
	<div class="form-group col-lg-7">
		<label>RFC:</label>
		<input type="text" class="form-control"  name="rfcIngreso" required>
	</div>
	<div class="form-group col-lg-7">
		<label>DIRECCION:</label>
		<input type="text" class="form-control"  name="direccionIngreso" required>
	</div>
	<div class="form-group col-lg-7">
		<label>EMAIL:</label>
		<input type="text" class="form-control"  name="emailIngreso" required>
	</div>
	<!-- INPUT DE EMAIL -->

</div>
<!-- INPUT DE BOTON DE GUARDAR O ENVIAR -->
	<div style="margin-left:30px" >
		<input style="width:100px; height:30px;" type="submit" type="button" class="btn btn-success" value="Enviar">
		<a style="float:right;" href="index.php?action=usuarios" class="btn btn-primary">REGRESAR</a>
	</div>
</div>
</form>

<?php
//LAMA AL MAETODO DE REGSITRO DE USUARIO NUEVO
$registro = new MvcController();
$registro -> registroAlumnoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";

	}

}

?>
