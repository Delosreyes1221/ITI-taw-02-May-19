<h1 align="center">ALUMNOS DISPONIBLES</h1>
<form  method="post">

	<?php

	$datosController = $_GET["id"];
	$Id_materia = $datosController;
	$respuesta = Datos::vistaMateriasModel("alumnos");
//	$respuesta2 = Datos::vistaMateriasGruposModel($datosController,"grupo_materia");

echo '<input type="text" hidden="true" name="idmateria" value="'.$Id_materia.'"></input>';

echo  '<div class="row-spacing col-lg-10">';
	echo '<label class="labels">Nombre del alumno</label>';
	echo '<select  class="form-control" name="alumnosD">';
		foreach($respuesta as $row => $item){
						echo '<option value="'.$item['id_alumno'].'">'.$item['nombre'].'</option>';

		}
echo '</select>';

echo '<div>';
?>
<br>
<div style="margin-left:30px" class="col-lg-12" >
	<input style="width:100px; height:30px;" type="submit" type="button" class="btn btn-success" value="Enviar">
</div>
</form>

<?php
//LLAMA AL METOD DE EDITAR USUARIO Y ACTUALIZAR USUARIO
	$agregarMateria = new MvcController();
	$agregarMateria -> registroAlumnosMateriasController();
	//$agregarMateria -> actualizarMaestroController();

	if(isset($_GET["action"])){

		if($_GET["action"] == "okGruposMaterias"){

			echo "Registro Exitoso";

		}

	}


	?>
