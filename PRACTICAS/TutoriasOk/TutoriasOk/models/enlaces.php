<?php

class Paginas{

	public static  function enlacesPaginasModel($enlaces){


		if($enlaces == "reportes"
		  || $enlaces == "registro_alumno"
			|| $enlaces == "registro_tutoria"
			|| $enlaces == "registro_maestro"
			|| $enlaces == "registro_carrera"
			|| $enlaces == "ingresar"
			|| $enlaces == "maestros"
			|| $enlaces == "carreras"
			|| $enlaces == "tutorias"
			|| $enlaces == "alumnos"
			|| $enlaces == "editar_carreras"
			|| $enlaces == "editar_tutoria"
			|| $enlaces == "editar_maestro"
			|| $enlaces == "editar_alumnos"
			|| $enlaces == "salir"
			|| $enlaces == "verAlumnosMaterias"
		  || $enlaces == "agregarAlumnosMaterias"
			|| $enlaces == "editarMateria"
			|| $enlaces == "grupos"
			|| $enlaces == "verMateriasGrupos"){

			$module =  "views/modules/".$enlaces.".php";
		}
		else if($enlaces == "index"){
			$module =  "views/modules/ingresar.php";
		}
		else if($enlaces == "ok"){
			$module =  "views/modules/registro.php";
		}
		else if($enlaces == "ok_alumno"){
			$module =  "views/modules/alumnos.php";
		}
		else if($enlaces == "ok_carrera"){
			$module =  "views/modules/carreras.php";
		}
		else if($enlaces == "ok_maestro"){
			$module =  "views/modules/maestros.php";
		}
		else if($enlaces == "okAlumnos"){
			$module =  "views/modules/materias.php";
		}
		else if($enlaces == "ok_tutoria"){
			$module =  "views/modules/tutorias.php";
		}
		else if($enlaces == "fallo"){
			$module =  "views/modules/ingresar.php";
		}
		else if($enlaces == "cambio"){
			$module =  "views/modules/maestros.php";
		}
		else if($enlaces == "cambio_alumno"){
			$module =  "views/modules/alumnos.php";
		}
		else if($enlaces == "cambio_carrera"){
			$module =  "views/modules/carreras.php";
		}
		else if($enlaces == "cambio_tutoria"){
			$module =  "views/modules/tutorias.php";
		}
		else if($enlaces == "cambioMateria"){
			$module =  "views/modules/materias.php";
		}
		else if($enlaces == "cambio_producto"){
			$module =  "views/modules/inventario.php";
		}
		else if($enlaces == "materias"){
			$module =  "views/modules/materias.php";
		}
		else{
			$module =  "views/modules/registro.php";
		}

		return $module;

	}

}

?>
