<div class="row-spacing mb-3 float-right">
	<a href="index.php?action=usuarios" class="btn btn-primary">REGRESAR</a>
</div>

<h1 class="text-center">REGISTRO DE MATERIAS</h1>
<!-- VISTA DE REGISTRO DE MATERIAS CON INPUT DE REGISTRO DE USUARIOS -->
<form method="post">
	<div class="row-spacing float-center align-items-center">
	<!-- INPUT DE NOMBRE DEL ALUMNO -->
	<div class="row-spacing col-lg-12">
	<div class="form-group col-lg-7">
	  <label for="usr">NOMBRE:</label>
	  <input type="text" class="form-control" name="nombreIngreso" required>
	</div>

  <?php
      $registro = new MvcController();
      $registro -> vistaProfesorController();
  ?>

</div>
<!-- INPUT DE BOTON DE GUARDAR O ENVIAR -->
	<div class="col-lg-10 ml-3" >
		<input style="width:100px; height:30px;" type="submit" type="button" class="btn btn-success" value="Enviar">
	</div>
</div>
</form>

<?php
//LAMA AL MAETODO DE REGSITRO DE USUARIO NUEVO

$registro -> registroAlumnoController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";

	}

}

?>
