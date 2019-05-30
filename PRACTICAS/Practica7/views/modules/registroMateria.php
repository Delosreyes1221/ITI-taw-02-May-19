

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
</div>

    <div class="row-spacing col-lg-7 ml-4">
  <?php
      $registro = new MvcController();
      $registro -> vistaProfesorController();
  ?>
  <br><br>
  </div>
<!-- INPUT DE BOTON DE GUARDAR O ENVIAR -->

<div  class="col-lg-12" >
  <input style="width:100px; height:40px;" type="submit" type="button" class="btn btn-success" value="Enviar">
  <a style="float:right;" href="index.php?action=materias" class="btn btn-primary">REGRESAR</a>
</div>
</div>
</form>

<?php
//LAMA AL MAETODO DE REGSITRO DE USUARIO NUEVO

$registro -> registroMateriaController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";

	}

}

?>
