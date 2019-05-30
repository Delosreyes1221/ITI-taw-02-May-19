<?php
//CLASE PAGINAS
class Paginas{
	//FUNCION QUE AYUDA A VIAJAR MEDIANTE UN MODELO A LAS VISTAS RECIBE COMO PARAMETRO EL ENLACE PASADO POR GET
	public static function enlacesPaginasModel($enlaces){

		//VERIFICA LA CONDICION PARA EN CASO DE SER UNO DE LOS ENLACES MARCADOS AQUI SE DIRIJA A ESA VISTA
		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir" || $enlaces == "materias" ||
			$enlaces == "registroMateria" || $enlaces == "editarMateria" || $enlaces == "grupos" ||
		$enlaces == "registroVen" || $enlaces == "maestro" ||$enlaces == "editarVen" || $enlaces == "editarGrupos" || $enlaces == "registroGrupos" ||
		$enlaces == "registroMaestro" || $enlaces == "editarMaestros" || $enlaces == "materiasdeGrupos"){
			//ASIGNA EL VALOR DE LA VISTA A LA QUE TIENE VALOR
			$module =  "views/modules/".$enlaces.".php";

		}
		//MANDA AL INDEX DE REGISTRO
		else if($enlaces == "index"){

			$module =  "views/modules/registro.php";

		}
		//MANDA AL REGISTRO EN CASO DE UNA CORRECTA REGISTRO DE USUARIO
		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";

		}
		else if($enlaces == "okMaestros"){

			$module =  "views/modules/maestros.php";

		}
		//CORRECTO REGISTRO DE PRODUCTO
		else if($enlaces == "okMaterias"){

			$module =  "views/modules/materias.php";

		}
		//CORRECTO REGISTRO DE VENTA
		else if($enlaces == "okGrupos"){

			$module =  "views/modules/registroGrupos.php";

		}
		//FALLO AL INICIAR SESION
		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";

		}
		//CAMBIO O ACTUALIZACION EN LOS USUARIOS
		else if($enlaces == "cambio"){

			$module =  "views/modules/usuarios.php";

		}
		//CAMBIO EN LOS PRODUCTOS
		else if($enlaces == "cambioMateria"){

			$module =  "views/modules/materias.php";

		}
		//CAMBIO EN LA VENTA
		else if($enlaces == "cambioGrupos"){

			$module =  "views/modules/grupos.php";

		}
		//CAMBIO EN LA VENTA
		else if($enlaces == "cambioMaestro"){

			$module =  "views/modules/maestro.php";

		}
		//EN CASO DE NO SER NINGUNO SE REGRESA AL REGISTRO DE USUARIO
		else{

			$module =  "views/modules/registro.php";

		}
		//RETORNA EN ENLACE DE LA VISTA
		return $module;

	}

}

?>
