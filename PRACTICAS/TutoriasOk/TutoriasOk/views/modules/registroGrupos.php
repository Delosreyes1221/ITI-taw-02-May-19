
<h1 class="text-center">REGISTRO DE GRUPOS</h1>
<!-- VISTA DE REGISTRO DE USUARIOS CON INPUT DE REGISTRO DE USUARIOS -->
<form method="post">
	<div class="row-spacing float-center align-items-center">
	<!-- INPUT DE NOMBRE DEL ALUMNO -->
	<div class="row-spacing col-lg-12">
	<div class="form-group col-lg-7">
	  <label for="usr">NOMBRE DEL GRUPO:</label>
	  <input type="text" class="form-control" name="grupoRegistro" required>
	</div>

<!-- INPUT DE BOTON DE GUARDAR O ENVIAR -->
	<div style="margin-left:30px" class="col-lg-12" >
		<input style="width:100px; height:30px;" type="submit" type="button" class="btn btn-success" value="Enviar">
		<a style="float:right;" href="index.php?action=maestros" class="btn btn-primary">REGRESAR</a>
	</div>
</div>
</form>

<?php
//LAMA AL MAETODO DE REGSITRO DE USUARIO NUEVO
$registro = new MvcController();
$registro -> registroGrupoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okGrupos"){

		echo "Registro Exitoso";

	}

}

?>
