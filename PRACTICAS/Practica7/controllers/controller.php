<?php
//se declara clase MvcController que es el controlador
class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------
	//SE LLAMA AL TEMPLATE EN LA CARPETA VIEWS
	public function pagina(){

		include "views/template.php";

	}

	#ENLACES
	#-------------------------------------
	//SE GUARDA EL ENLACE PASADO POR METODO GET PARA MANDAR A EL MODELO DE ENLACESPAGINASMODEL
	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){

			$enlaces = $_GET['action'];

		}

		else{
			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#REGISTRO DE ALUMNOS
	#------------------------------------
	public function registroAlumnoController(){
		//SE VERIFICA QUE SE ESTE REGISTRANDO UN USUARIO
		if(isset($_POST["nombreIngreso"])){
			//GUARDA LOS VALORES EN UN ARRAY ASOCITIVO PARA MANDAR POR PARAMETRO LOS VALORES
			$datosController = array( "nombre"=>$_POST["nombreIngreso"],
								      "matricula"=>$_POST["matriculaIngreso"],
								      "fecha"=>$_POST["fechaIngreso"]);
			//PASA POR PARAMETRO LOS DATOS Y LA TABLA QUE SE DESEA HACER EL REGISTRO DE LOS DATOS
			$respuesta = Datos::registroAlumnoModel($datosController, "alumnos");
			//VERIFICA QUE SEA CORRECTO
			if($respuesta == "success"){
				//MANDA UN OK EN ACTION A ENLACES
				error_reporting(0);
				header("location:index.php?action=ok");
				error_reporting(0);
			}
			//SI NO MANDA AL INDEX QUE ARROJA AL REGISTRO EN EL MODELO ENLACES
			else{

				header("location:index.php");
			}

		}
	}

	#REGISTRO DE MAESTROS
	#------------------------------------
	public function registroMaestroController(){
		//SE VERIFICA QUE SE ESTE REGISTRANDO UN USUARIO
		if(isset($_POST["nombreIngreso"])){
			//GUARDA LOS VALORES EN UN ARRAY ASOCITIVO PARA MANDAR POR PARAMETRO LOS VALORES
			$datosController = array( "nombre"=>$_POST["nombreIngreso"],
											"matricula"=>$_POST["matriculaIngreso"],
											"fecha"=>$_POST["fechaIngreso"]);
			//PASA POR PARAMETRO LOS DATOS Y LA TABLA QUE SE DESEA HACER EL REGISTRO DE LOS DATOS
			$respuesta = Datos::registroMaestroModel($datosController, "maestros");
			//VERIFICA QUE SEA CORRECTO
			if($respuesta == "success"){
				//MANDA UN OK EN ACTION A ENLACES
				error_reporting(0);
				header("location:index.php?action=okMaestros");
				error_reporting(0);
			}
			//SI NO MANDA AL INDEX QUE ARROJA AL REGISTRO EN EL MODELO ENLACES
			else{

				header("location:index.php");
			}

		}

	}

	#REGISTRO DE MATERIAS
	#------------------------------------
	public function registroMateriaController(){
		//SE VERIFICA QUE SE ESTE REGISTRANDO UN USUARIO
		if(isset($_POST["nombreIngreso"])){
			//GUARDA LOS VALORES EN UN ARRAY ASOCITIVO PARA MANDAR POR PARAMETRO LOS VALORES
			$datosController = array( "nombre"=>$_POST["nombreIngreso"],
											"id_maestro"=>$_POST["nombreProfesor"]);
			//PASA POR PARAMETRO LOS DATOS Y LA TABLA QUE SE DESEA HACER EL REGISTRO DE LOS DATOS
			$respuesta = Datos::registroMateriaModel($datosController, "materias");
			//VERIFICA QUE SEA CORRECTO
			if($respuesta == "success"){
				//MANDA UN OK EN ACTION A ENLACES
				header("location:index.php?action=okMaterias");
			}
			//SI NO MANDA AL INDEX QUE ARROJA AL REGISTRO EN EL MODELO ENLACES
			else{
				error_reporting(0);
				header("location:index.php");
				error_reporting(0);
			}

		}

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){
			//GUARDA LOS VALORES EN UN ARRAY ASOCITIVO PARA MANDAR POR PARAMETRO LOS VALORES
			$datosController = array( "usuario"=>$_POST["usuarioIngreso"],
								      "password"=>$_POST["passwordIngreso"]);
			//METODO PARA VALIDAR INGRESO Y DATOS DEL USUARIO
			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");
			//VERIFICA USUARIO Y CONTRASEÑA
			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
				//INICIA SEION
				session_start();
				//INICIA UNA VARIABLE DE SESION EN TRUE
				$_SESSION["validar"] = true;
				//MANDA A LA PAGINA DE USUARIOS
				header("location:index.php?action=usuarios");

			}

			else{
				//SINO MANDA UN ACTION FALLO Y REGRESA AL REGISTRO DE USUARIOS
				header("location:index.php?action=fallo");

			}

		}

	}


	//VISTA DE LOS ALUMNOS

	public function vistaAlumnosController(){
		//TRAE TODOS LOS ALUMNOS
		$respuesta = Datos::vistaAlumnosModel("alumnos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//CICLO PARA MOSTRAR E ITERAR TODOS LOS VALORES EN FILAS DE UNA TABLA
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["fecha"].'</td>
				<td align="center" ><a href="index.php?action=editar&id='.$item["id_alumno"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td align="center" ><a href="index.php?action=usuarios&idBorrar='.$item["id_alumno"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	//VISTA DE LOS MAESTROS

	public function vistaMaestrosController(){
		//TRAE TODOS LOS ALUMNOS
		$respuesta = Datos::vistaMaestroModel("maestros");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//CICLO PARA MOSTRAR E ITERAR TODOS LOS VALORES EN FILAS DE UNA TABLA
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["matricula"].'</td>
				<td>'.$item["fecha"].'</td>
				<td align="center" ><a href="index.php?action=editarMaestros&id='.$item["id_maestro"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td align="center" ><a href="index.php?action=maestro&idBorrar='.$item["id_maestro"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	//VISTA DE LAS MATERIAS
	public function vistaMateriasController(){
		//TRAE TODOS LOS ALUMNOS
		$respuesta = Datos::vistaMateriasModel("materias");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//CICLO PARA MOSTRAR E ITERAR TODOS LOS VALORES EN FILAS DE UNA TABLA
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_materia"].'</td>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["id_maestro"].'</td>
				<td align="center" ><a href="index.php?action=alumnos&id='.$item["id_materia"].'"><button type="button" class="btn btn-info">Ver alumnos</button></a></td>
				<td align="center" ><a href="index.php?action=editarMateria&id='.$item["id_materia"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td align="center" ><a href="index.php?action=materias&idBorrar='.$item["id_materia"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	//VISTA DE LOS GRUPOS
	public function vistaGruposController(){
		//TRAE TODOS LOS ALUMNOS
		$respuesta = Datos::vistaGruposModel("grupos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//CICLO PARA MOSTRAR E ITERAR TODOS LOS VALORES EN FILAS DE UNA TABLA
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_grupo"].'</td>
				<td>'.$item["nombre"].'</td>
				<td align="center" ><a href="index.php?action=materiasdeGrupos&id='.$item["id_grupo"].'"><button type="button" class="btn btn-info">Ver materias</button></a></td>
				<td align="center" ><a href="index.php?action=editarGrupos&id='.$item["id_grupo"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td align="center" ><a href="index.php?action=grupos&idBorrar='.$item["id_grupo"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR ALUMNOS
	#------------------------------------
	public function editarAlumnosController(){
		//OBTIENE ID DE LA FILA O REGISTRO A EDITAR
		$datosController = $_GET["id"];
		//MANDA COMO PARAMETRO ESOS DATOS Y LLAMA AL METODO EDITARUSUARIOMODEL
		$respuesta = Datos::editarAlumnoModel($datosController, "alumnos");
		//GENERA LOS INPUT PARA EDITAR LOS VALORES DEL REGISTRO

		echo'
				<div class="row-spacing col-lg-12">
					<div class="form-group col-lg-7">

					  <input type="hidden" value="'.$respuesta["id_alumno"].'" class="form-control" name="idEditar">
					</div>

					<div class="form-group col-lg-7">
						<labelNOMBRE DEL ALUMNO></label>
					  <input type="text" value="'.$respuesta["nombre"].'" class="form-control" name="nombreEditar">
					</div>

					<div class="form-group col-lg-7">
						<label>MATRICULA</label>
					  <input type="text" value="'.$respuesta["matricula"].'" class="form-control" name="matriculaEditar">
					</div>

					<div class="form-group col-lg-7 ">
						<label>FECHA DE NACIMIENTO</label>
					  <input type="date" value="'.$respuesta["fecha"].'" class="form-control" name="fechaEditar">
						<br>
					</div>
				</div>
			 <input style="margin-left:30px;" type="submit" type="button" class="btn btn-success" value="Actualizar">';

	}

	#EDITAR ALUMNOS
	#------------------------------------
	public function editarMaestrosController(){
		//OBTIENE ID DE LA FILA O REGISTRO A EDITAR
		$datosController = $_GET["id"];
		//MANDA COMO PARAMETRO ESOS DATOS Y LLAMA AL METODO EDITARUSUARIOMODEL
		$respuesta = Datos::editarMaestrosModel($datosController, "maestros");
		//GENERA LOS INPUT PARA EDITAR LOS VALORES DEL REGISTRO

		echo'
				<div class="row-spacing col-lg-12">
					<div class="form-group col-lg-7">

					  <input type="hidden" value="'.$respuesta["id_maestro"].'" class="form-control" name="idEditar">
					</div>

					<div class="form-group col-lg-7">
						<labelNOMBRE DEL MAESTRO></label>
					  <input type="text" value="'.$respuesta["nombre"].'" class="form-control" name="nombreEditar">
					</div>

					<div class="form-group col-lg-7">
						<label>MATRICULA</label>
					  <input type="text" value="'.$respuesta["matricula"].'" class="form-control" name="matriculaEditar">
					</div>

					<div class="form-group col-lg-7 ">
						<label>FECHA DE NACIMIENTO</label>
					  <input type="date" value="'.$respuesta["fecha"].'" class="form-control" name="fechaEditar">
						<br>
					</div>
				</div>
			 <input style="margin-left:30px;" type="submit" type="button" class="btn btn-success" value="Actualizar">';

	}

	#EDITAR GRUPOS
	#------------------------------------
	public function editarGruposController(){
		//OBTIENE ID DE LA FILA O REGISTRO A EDITAR
		$datosController = $_GET["id"];
		//MANDA COMO PARAMETRO ESOS DATOS Y LLAMA AL METODO EDITARUSUARIOMODEL
		$respuesta = Datos::editarGrupoModel($datosController, "grupos");
		//GENERA LOS INPUT PARA EDITAR LOS VALORES DEL REGISTRO

		echo'
				<div class="row-spacing col-lg-12">
					<div class="form-group col-lg-7">
						<label>NOMBRE DEL GRUPO</label>
					  <input type="hidden" value="'.$respuesta["id_grupo"].'" class="form-control" name="idEditar">
					</div>

					<div class="form-group col-lg-7">
					  <input type="text" value="'.$respuesta["nombre"].'" class="form-control" name="nombreEditar">
					</div>

				</div>
				<br>
			 <input style="margin-left:30px;" type="submit" type="button" class="btn btn-success" value="Actualizar">';

	}

	#ACTUALIZAR ALUMNO
	#------------------------------------
	public function actualizarAlumnoController(){

		if(isset($_POST["nombreEditar"])){
			//GUARDA EN UN ARRAY LOS VALORES PARA ACTUALIZAR LOS DATOS
			$datosController = array( "id_alumno"=>$_POST["idEditar"],
							          "nombre"=>$_POST["nombreEditar"],
				                      "matricula"=>$_POST["matriculaEditar"],
				                      "fecha"=>$_POST["fechaEditar"]);
			//LLAMA AL METODO DENTRO DEL MODELO DE ACTULAIZAR USUARIO
			$respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");
			//SI ES CORRECTO MANDA ACTION CAMBIO A ENLACES
			if($respuesta == "success"){


//					echo  "<script> windows.location = 'index.php?action=usuarios'</script>";
				error_reporting(0);
				header("location:index.php?action=cambio");
				error_reporting(0);
			}
			//EN CASO DE ERROR MANDA UN ECHO CON MENSAJE ERROR
			else{

				echo "error";

			}

		}

	}


	#ACTUALIZAR MAESTROS
	#------------------------------------
	public function actualizarMaestroController(){

		if(isset($_POST["nombreEditar"])){
			//GUARDA EN UN ARRAY LOS VALORES PARA ACTUALIZAR LOS DATOS
			$datosController = array( "id_maestro"=>$_POST["idEditar"],
							          			"nombre"=>$_POST["nombreEditar"],
				                      "matricula"=>$_POST["matriculaEditar"],
				                      "fecha"=>$_POST["fechaEditar"]);
			//LLAMA AL METODO DENTRO DEL MODELO DE ACTULAIZAR USUARIO
			$respuesta = Datos::actualizarMaestroModel($datosController, "maestros");
			//SI ES CORRECTO MANDA ACTION CAMBIO A ENLACES
			if($respuesta == "success"){


//					echo  "<script> windows.location = 'index.php?action=usuarios'</script>";
				error_reporting(0);
				header("location:index.php?action=cambioMaestro");
				error_reporting(0);
			}
			//EN CASO DE ERROR MANDA UN ECHO CON MENSAJE ERROR
			else{

				echo "error";

			}

		}

	}

	#ACTUALIZAR GRUPO
	#------------------------------------
	public function actualizarGruposController(){

		if(isset($_POST["nombreEditar"])){
			//GUARDA EN UN ARRAY LOS VALORES PARA ACTUALIZAR LOS DATOS
			$datosController = array( "id_grupo"=>$_POST["idEditar"],
							          			"nombre"=>$_POST["nombreEditar"]);
			//LLAMA AL METODO DENTRO DEL MODELO DE ACTULAIZAR USUARIO
			$respuesta = Datos::actualizarGrupoModel($datosController, "grupos");
			//SI ES CORRECTO MANDA ACTION CAMBIO A ENLACES
			if($respuesta == "success"){


//					echo  "<script> windows.location = 'index.php?action=usuarios'</script>";
				error_reporting(0);
				header("location:index.php?action=cambioGrupos");
				error_reporting(0);
			}
			//EN CASO DE ERROR MANDA UN ECHO CON MENSAJE ERROR
			else{

				echo "error";

			}

		}

	}

	#EDITAR ALUMNOS
	#------------------------------------
	public function editarMateriaController(){
		//OBTIENE ID DE LA FILA O REGISTRO A EDITAR
		$datosController = $_GET["id"];
		//MANDA COMO PARAMETRO ESOS DATOS Y LLAMA AL METODO EDITARUSUARIOMODEL
		$respuesta = Datos::editarMateriaModel($datosController, "materias");
		//GENERA LOS INPUT PARA EDITAR LOS VALORES DEL REGISTRO

		echo'
				<div class="row-spacing col-lg-12">
					<div class="form-group col-lg-7">
						<label>NOMBRE</label>
					  <input type="hidden" value="'.$respuesta["id_materia"].'" class="form-control" name="idEditar">
					</div>

					<div class="form-group col-lg-7">
					  <input type="text" value="'.$respuesta["nombreMateria"].'" class="form-control" name="nombreEditar">
					</div>

					<div class="form-group col-lg-7">
						<label>PROFESOR ACTUAL</label>
					  <input readonly type="text" value="'.$respuesta["nombre"].'" class="form-control" >
					</div>';
					echo '<div class="row-spacing col-lg-4">';

					$respuesta2 = Datos::vistaProfesoresModel("maestros");
					// SE MUESTRAN LOS PROFESORES AGREGADOS EN LA BASE DE DATOS
					echo '<label class="labels">MAESTROS DISPONIBLES</label>';
					echo '<select class="form-control" name="nombreProfesor">';

					foreach($respuesta2 as $row => $item){
							echo '<option value="'.$item['id_maestro'].'">'.$item['nombre'].'</option>';
					}
					echo '</select>';
					echo '</div>';

					echo
					'<div class="row-spacing col-lg-12 mt-4">
			 				<input type="submit" type="button" class="btn btn-success" value="Actualizar" style="width:100px;">
					</div>';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarMateriaController(){

		if(isset($_POST["nombreProfesor"])){
			//GUARDA EN UN ARRAY LOS VALORES PARA ACTUALIZAR LOS DATOS
			$datosController = array("id_materia"=>$_POST["idEditar"],
							          "nombre"=>$_POST["nombreEditar"],
				                 "id_maestro"=>$_POST["nombreProfesor"]);
			//LLAMA AL METODO DENTRO DEL MODELO DE ACTULAIZAR MATERIA
			$respuesta = Datos::actualizarMateriaModel($datosController, "materias");
			//SI ES CORRECTO MANDA ACTION CAMBIO A ENLACES
			if($respuesta == "success"){
//					echo  "<script> windows.location = 'index.php?action=usuarios'</script>";
				error_reporting(0);
				header("location:index.php?action=cambioMateria");
				error_reporting(0);
			}
			//EN CASO DE ERROR MANDA UN ECHO CON MENSAJE ERROR
			else{

				echo "error";

			}

		}

	}

	#BORRAR ALUMNO
	#------------------------------------
	public function borrarAlumnoController(){

		if(isset($_GET["idBorrar"])){
			//OBTIENE ID DEL REGISTRO
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO PARA BORRAR UN USUARIO
			$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");
			//EN CASO DE SER CORRECTO REGRESA A LA VISTA DE USUARIOS
			if($respuesta == "success"){
				error_reporting(0);
				header("location:index.php?action=usuarios");
				error_reporting(0);
			}

		}

	}

	#BORRAR ALUMNO
	#------------------------------------
	public function borrarMaestroController(){

		if(isset($_GET["idBorrar"])){
			//OBTIENE ID DEL REGISTRO
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO PARA BORRAR UN USUARIO
			$respuesta = Datos::borrarMaestroModel($datosController, "maestros");
			//EN CASO DE SER CORRECTO REGRESA A LA VISTA DE USUARIOS
			if($respuesta == "success"){
				error_reporting(0);
				header("location:index.php?action=maestros");
				error_reporting(0);
			}

		}

	}

	#BORRAR GRUPO
	#------------------------------------
	public function borrarGrupoController(){

		if(isset($_GET["idBorrar"])){
			//OBTIENE ID DEL REGISTRO
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO PARA BORRAR UN USUARIO
			$respuesta = Datos::borrarGrupoModel($datosController, "grupos");
			//EN CASO DE SER CORRECTO REGRESA A LA VISTA DE USUARIOS
			if($respuesta == "success"){
				error_reporting(0);
				header("location:index.php?action=grupos");
				error_reporting(0);
			}

		}

	}

	#REGISTRO DE MATERIAS PRODUCTO
	#------------------------------------
	public function vistaProfesorController(){
		$respuesta = Datos::vistaProfesoresModel("maestros");
		// SE MUESTRAN LOS PROFESORES AGREGADOS EN LA BASE DE DATOS
		echo '<label class="labels">MAESTROS DISPONIBLES</label>';
		echo '<select class="form-control" name="nombreProfesor">';
		foreach($respuesta as $row => $item){
				echo '<option value="'.$item['id_maestro'].'">'.$item['nombre'].'</option>';
		}
		echo '</select>';

	}

	#VISTA DE LAS MATERIAS PARA LOS GRUPOS
	#------------------------------------
	public function vistaMateriasGruposController(){
		//SE RECIBE EL ID DEL GRUPO
		$datosController = $_GET["id"];

		$respuesta = Datos::vistaMateriasModel("materias");
		// SE MUESTRAN LOS PROFESORES AGREGADOS EN LA BASE DE DATOS
		$respuesta2 = Datos::vistaMateriasGruposModel($datosController,"grupo_materia");

///SELECT QUE NOS MUESTRA LAS MATERIAS QUE EXISTEN
			echo '<div class="row-spacing col-lg-5">';
				echo '<label class="labels">MATERIAS DISPONIBLES</label>';
				echo '<select class="form-control" name="nombreMateria">';
				foreach($respuesta as $row => $item){
						echo '<option value="'.$item['id_materia'].'">'.$item['nombre'].'</option>';
				}
				echo '</select>';
				echo '<br>';

///BOTON PARA AGREGAR UNA MATERIA A UN GRUPO
				echo '<div class="col-lg-12">';
				echo '<div  class="col-lg-12" >
					<input style="width:100px; float:left; height:40px;" type="submit" type="button" class="btn btn-success" value="Agregar">
				</div>';
				echo '</div>';
		  echo '</div>';

///TABLA QUE MUESTRA LAS MATERIAS QUE TIENE EL GRUPO
			echo  '<div class="row-spacing col-lg-5">';
				echo '<table class="table">';
					echo '<thead>';
					foreach($respuesta2 as $row => $item){
					echo'<tr>
							<td>'.$item["id"].'</td>
							<td>'.$item["nombre"].'</td>
							<td align="center" ><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
						</tr>';

					}
					echo '</thead>';
				echo '</table>';
			echo '<div>';

	}


	#VISTA DE PRODUCTO
	#------------------------------------

	public function vistaProductosController(){

		$respuesta = Datos::vistaProductosModel("productos");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//IMPRIME LAS FILAS DE LA TABLA AGREGANDO BOTONES DE ACCION
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["producto"].'</td>
				<td>'.$item["precio"].'</td>
				<td><a href="index.php?action=editarPro&id='.$item["id"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td><a href="index.php?action=productos&idBorrar='.$item["id"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR PRODUCTO
	#------------------------------------

	public function editarProductoController(){
		//OBTIENE ID POR GET
		$datosController = $_GET["id"];
		//LLAMA METODO DE EDITAR EL PRODUCTO
		$respuesta = Datos::editarProductoModel($datosController, "productos");
		//GENERAR LOS INPUT PARA EDICION
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["producto"].'" name="productoEditar" required>

			 <input type="text" value="'.$respuesta["precio"].'" name="precioEditar" required>

			 <input type="submit" type="button" class="btn btn-success" value="Actualizar">';

	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarProductoController(){

		if(isset($_POST["productoEditar"])){
			//GUARDA VALORES EN EL ARRAY
			$datosController = array( "id"=>$_POST["idEditar"],
							          "producto"=>$_POST["productoEditar"],
				                      "precio"=>$_POST["precioEditar"]);
			//LLAMA AL METODO DE ACTUALIZAR PRODUCTO MODELO
			$respuesta = Datos::actualizarProductoModel($datosController, "productos");
			//SI ES CORRECTO LLAMA AL ACTION CAMBIOPRO
			if($respuesta == "success"){

				header("location:index.php?action=cambioPro");
			}
			else{
				echo "error";
			}

		}

	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoController(){

		if(isset($_GET["idBorrar"])){
			//OBITENE ID PARA BORRAR
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO DE BORRAR PRODUCTO
			$respuesta = Datos::borrarProductoModel($datosController, "productos");
			//SI ES CORRECTO NOS REGRESA A LA VISTA PRODUCTOS
			if($respuesta == "success"){

				header("location:index.php?action=productos");

			}

		}

	}


	#REGISTRO DE VENTAS
	#------------------------------------
	public function registroGrupoController(){

		if(isset($_POST["grupoRegistro"])){
			//GUARDAR ARRAY CON LOS DATOS DE LA VENTA
			$datosController = array( "nombre"=>$_POST["grupoRegistro"]);
			//LLAMA METODO DE REGISTRO DE LA VENTA
			$respuesta = Datos::registroGrupoModel($datosController, "grupos");
			//SI ES CORRECTO LLAMA LA ACTION OKVEN DE ENLACES
			if($respuesta == "success"){
				header("location:index.php?action=okGrupos");
			}
			else{
				error_reporting(0);
				header("location:index.php");
				error_reporting(0);
			}

		}

	}


	#VISTA DE VENTAS
	#------------------------------------

	public function vistaVentasController(){
		//OBTIENE VALORES PARA METODO DE VISTA DE VENTAS
		$respuesta = Datos::vistaVentasModel("ventas");
		//DECLARO PROPIEDAD DE TOTAL PARA GUARDAR EL TOTAL DE VENTAS
		$total = 0.0;

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.
		//IMPRIME TABLA DE VENTAS
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["producto_id"].'</td>
				<td>'.$item["cantidad"].'</td>
				<td>'.$item["total"].'</td>
				<td>'.$item["total"]/$item["cantidad"].'<td>
				<td><a href="index.php?action=editarVen&id='.$item["id"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td><a href="index.php?action=ventas&idBorrar='.$item["id"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';
			//SUMA DE TOTALES
			$total += $item["total"];
		}
		//IMPRIME FILA DE TOTAL
		echo'<tr>
				<td>Total ganado en el día:</td>
				<td></td>
				<td>'.$total = $total.'</td>
				<th></th>
				<th></th>
				<td></td>
			</tr>';

	}

	#EDITAR VENTAS
	#------------------------------------

	public function editarVentaController(){
		//OBTIENE ID DE LA VENTA
		$datosController = $_GET["id"];
		//LLAMA METODO DE EDIATAR VENTA
		$respuesta = Datos::editarVentaModel($datosController, "ventas");
		//IMPRIME INPUT PARA EDITAR LA VENTA
		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["producto_id"].'" name="productoEditar" required>

			 <input type="text" value="'.$respuesta["cantidad"].'" name="cantidadEditar" required>

			 <input type="submit" type="button" class="btn btn-success" value="Actualizar">';

	}

	#ACTUALIZAR VENTAS
	#------------------------------------
	public function actualizarVentaController(){

		if(isset($_POST["productoEditar"])){
			//GAURDA LOS VALORES EN UN ARRAY
			$datosController = array( "id"=>$_POST["idEditar"],
							          "producto_id"=>$_POST["productoEditar"],
				                      "cantidad"=>$_POST["cantidadEditar"]);
			//LLAMA AL METODO DE ACTUALIZAR LA VENTA
			$respuesta = Datos::actualizarVentaModel($datosController, "ventas");

			if($respuesta == "success"){
				header("location:index.php?action=cambioVen");
			}
			else{
				echo "error";
			}

		}

	}

	#BORRAR VENTAS
	#------------------------------------
	public function borrarVentasController(){

		if(isset($_GET["idBorrar"])){
			//OBITNE ID DE LA FILA PARA BORRAR
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO DE BORRAR VENTA
			$respuesta = Datos::borrarVentaModel($datosController, "ventas");
			//SI ES CORRECTO NOS REGRESA A LA VISTA DE VENTAS
			if($respuesta == "success"){

				header("location:index.php?action=ventas");

			}

		}

	}

	#BORRAR MATERIAS
	#------------------------------------
	public function borrarMateriaController(){

		if(isset($_GET["idBorrar"])){
			//OBITNE ID DE LA FILA PARA BORRAR
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO DE BORRAR VENTA
			$respuesta = Datos::borrarMateriaModel($datosController, "materias");
			//SI ES CORRECTO NOS REGRESA A LA VISTA DE VENTAS
			if($respuesta == "success"){
				error_reporting(0);
				header("location:index.php?action=ventas");
				error_reporting(0);
			}

		}

	}

}

?>
