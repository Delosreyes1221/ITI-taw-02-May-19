<h1 align="center">MATERIAS DISPONIBLES</h1>
<form  method="post">

	<?php

	$datosController = $_GET["id"];
	$Id_grupo = $datosController;
	$respuesta = Datos::vistaMateriasModel("materias");
//	$respuesta2 = Datos::vistaMateriasGruposModel($datosController,"grupo_materia");

echo '<input type="text" hidden="true" name="idGrupo" value="'.$Id_grupo.'"></input>';

echo  '<div class="row-spacing col-lg-10">';
	echo '<label class="labels">Nombre de la materia</label>';
	echo '<select  class="form-control" name="materiasD">';
		foreach($respuesta as $row => $item){
						echo '<option value="'.$item['id_materia'].'">'.$item['nombre'].'</option>';

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
	$agregarMateria -> registroMateriasGruposController();
	//$agregarMateria -> actualizarMaestroController();

	if(isset($_GET["action"])){

		if($_GET["action"] == "okGruposMaterias"){

			echo "Registro Exitoso";

		}

	}


	?>
