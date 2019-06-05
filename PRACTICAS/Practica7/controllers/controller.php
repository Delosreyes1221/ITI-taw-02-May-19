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
				<td align="center" ><a href="index.php?action=verAlumnosMaterias&id='.$item["id_materia"].'"><button type="button" class="btn btn-info">Ver alumnos</button></a></td>
				<td align="center" ><a href="index.php?action=agregarAlumnosMaterias&id='.$item["id_materia"].'"><button type="button" class="btn btn-info">Agregar alumnos</button></a></td>
				<td align="center" ><a href="index.php?action=editarMateria&id='.$item["id_materia"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td align="center" ><a href="index.php?action=materias&idBorrar='.$item["id_materia"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>

			</tr>';

		}

	}

	#REGISTRO BASE DE TUTORIAS
	#------------------------------------
	#Genera la interfaz base para el registro de las tutorias
	public function registroBaseTutoriaController(){
		if($_COOKIE['nivel']==1)
			$respuesta_alumnos = Datos::obtenerAlumnosModel("alumnos");
		else
			$respuesta_alumnos = Datos::obtenerAlumnosNivelModel("alumnos",$_SESSION['num_empleado']);

		$st_alumnos="";
		for($i=0;$i<sizeof($respuesta_alumnos);$i++)
			$st_alumnos=$st_alumnos."<option value='".$respuesta_alumnos[$i]['matricula']."'>".$respuesta_alumnos[$i]['nombre']."</option>";


		echo'
			<input type="hidden" id="hid" name="hid"></input>
			<table>
				<tr>
					<td>
						<h4>Detalles en la tutoria</h4>

						<label for="fecha">Fecha:</label>
						<input type="date" name="fecha" required>
						<label for="hora">Hora:</label>
						<input type="time" name="hora" required>
						<label for="tipo">Tipo:</label>
						<select name="tipo" required>
							<option value="Grupal">Grupal</option>
							<option value="Individual">Individual</option>
						 </select>
						<label for="Tema">Tema:</label>
						<input type="text" name="tema" required>
						<button class="small success" onclick="sendData();" type="submit">Registrar</button>

					</td>
					<td>
						<h4>Alumnos en la tutoria</h4>
						<table>
							<tr>
								<td>
								 <label for="alumno">Nombre del Alumno:</label>
								 <select name="alumno" class="js-example-basic-multiple" id="alumno">
								 	'.$st_alumnos.'
								 </select>
								 <br><br>
							</td>
							 <td>
							 	<button type="button" class="small success" onclick="addAlumno()">Agregar Alumno</button>
							 </td>
						</tr>
						<table>
						<table id="alumnos"></table>
					</td>
				</tr>
			</table>';

		echo'<script>
				$(document).ready(function() {
					$(".js-example-basic-multiple").select2();
				});

				var alumnos=[];
				var send_alumnos=[];
				var tab = document.getElementById("alumnos");

				function updateTable(){
					tab.innerHTML="<tr><th>Matricula</th><th>Nombre</th><th>¿Eliminar?</th><tr>";
					for(var i=0;i<alumnos.length;i++){
						tab.innerHTML=tab.innerHTML+"<tr><td>"+alumnos[i][0]+"</td><td>"+alumnos[i][1]+"</td><td><button class=\'alert\' type=\'button\' onclick=\'deleteAlumno("+i+");\'>Eliminar</button></td><tr>";
					}
				}

				function addAlumno(){

					var select = document.getElementById("alumno");
					var flag=false;
					for(var i=0;i<alumnos.length;i++){
						if(alumnos[i][0]==select.options[select.selectedIndex].value && alumnos[i][1]==select.options[select.selectedIndex].text){
							flag=true;
							break;
						}
					}

					if(!flag){
						alumnos.push([select.options[select.selectedIndex].value,select.options[select.selectedIndex].text]);
						send_alumnos.push([select.options[select.selectedIndex].value]);
						updateTable();
					}else{
						alert("Alumno ya Agregado");
					}
				}

				function deleteAlumno(index){
					alumnos.splice(index, 1);
					send_alumnos.splice(index, 1);
					updateTable();
				}

				function sendData(){
					var hid = document.getElementById("hid");
					hid.value=send_alumnos;
				}

			</script>';
	}

	#REGISTRAR TUTORIAS
	#------------------------------------
	#Permite el registro de una tutoria en la base de datos
	public function registroTutoriaController(){
		if(isset($_POST["fecha"])){
			$datosController = array(
								      "hora"=>$_POST["hora"],
								      "fecha"=>$_POST["fecha"],
								      "tema"=>$_POST["tema"],
								      "tipo"=>$_POST["tipo"],
								      "num_maestro"=>$_POST["num_maestro"]
								  );

			$respuesta = Datos::registroTutoriaModel($datosController, "sesion_tutoria");

			if(isset($_POST['hid'])){
				$data = $_POST['hid'];

				$id_sesion = Datos::ObtenerLastTutoria("sesion_tutoria");

				$respuesta = Datos::registroAlumnosTutoriaModel($data, $id_sesion[0], "sesion_alumnos");
		  	}

			if($respuesta == "success"){
				header("location:index.php?action=ok_tutoria");
			}
			else{
				header("location:index.php");
			}

		}

	}



	#REGISTRO TUTORIAS
	#------------------------------------
	#Genera la interfaz que muestra en una tabla todos los registros almacenados
	public function vistaTutoriasController(){
		if($_COOKIE['nivel']==1)
			$respuesta = Datos::vistaTutoriasModel("sesion_tutoria");
		else
			$respuesta = Datos::vistaTutoriasNivelModel("sesion_tutoria",$_SESSION["num_empleado"]);
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["hora"].'</td>
				<td>'.$item["tema"].'</td>
				<td>'.$item["tipo"].'</td>
				<td><a href="index.php?action=editar_tutoria&id='.$item["id"].'"><button class="small warning">Editar</button></a></td>
				<td><a href="index.php?action=tutorias&idBorrar='.$item["id"].'"><button class="small alert">Borrar</button></a></td>
			</tr>';
		}
	}



	#BORRAR TUTORIAS
#------------------------------------
#Permite el eliminado de las tutorais llamando el modelo
public function borrarTutoriaController(){

	if(isset($_GET["idBorrar"])){
		$datosController = $_GET["idBorrar"];
		$respuesta = Datos::borrarAlumnosTutoriaModel($datosController, "sesion_alumnos");
		$respuesta = Datos::borrarTutoriaModel($datosController, "sesion_tutoria");

		if($respuesta == "success"){
			header("location:index.php?action=tutorias");
		}
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
				<td align="center" ><a href="index.php?action=verMateriasGrupos&id='.$item["id_grupo"].'"><button type="button" class="btn btn-info">Ver materias</button></a></td>
				<td align="center" ><a href="index.php?action=agregarMateriaGrupo&id='.$item["id_grupo"].'"><button type="button" class="btn btn-info">Agregar Materias</button></a></td>
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

	#EDITAR EDITAR MATERIAS
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
		echo '<select class="form-control" name="nombreProfesor" required>';
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
		$Id_grupo = $datosController;
		$respuesta = Datos::vistaMateriasModel("materias");
		$respuesta2 = Datos::vistaMateriasGruposModel($datosController,"grupo_materia");
		// SE MUESTRAN LOS PROFESORES AGREGADOS EN LA BASE DE DATOS
		///SELECT QUE MUESTRA LAS MATERIAS DISPONIBLES

		echo '<input type="text" hidden="true" name="idGrupo" value="'.$Id_grupo.'"></input>';

		echo  '<div class="row-spacing col-lg-10">';
			echo '<table class="table" name="materiasD">';
				echo '<thead>';
					echo '<th>MATERIAS DISPONIBLES</th>';
				echo '</thead>';
				foreach($respuesta as $row => $item){
				echo'<tr>
					<id hidden>'.$item['id_materia'].'</td>
					<td>'.$item["nombre"].'</td>
					<td><button type="button" onclick="agregarMateria('.$item['id_materia'].')" class="btn btn-danger">Agregar materia</button><td/>
					</tr>';
				}

			echo '</table>';
		echo '<div>';

				// MATERIAS QUE TIENE EL GRUPO
							echo  '<div class="row-spacing col-lg-10">';
								echo '<table class="table">';
									echo '<thead>';

										echo '<th>MATERIAS DEL GRUPO</th>';
									echo '</thead>';
									foreach($respuesta2 as $row => $item){
									echo'<tr>
											<td>'.$item["nombre"].'</td>
											<td align="center" ><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
										</tr>';

									}
								echo '</table>';
							echo '<div>';
						echo '<input type="text" id="auxiliar" name="auxiliarr"></input>';


///FUNCION DE JAVASCRIPT PARA GUARDAR EL VALOR CON UN BOTON


		$materia_PHP = '<script>var hola = document.getElementById("auxiliar").value </script>';

		$insertarMaterias = Datos::registroMateriasenGrupoModel($Id_grupo, 	$materia_PHP, "grupo_materia");

		if ($insertarMaterias == "success") {
			echo 'Ya quedo';
		}
		else {
			echo 'No jala';
		}
	}


	#ACTUALIZAR MATERIAS AL GRUPO
	#------------------------------------
	public function actualizarMateriaGrupoController(){

		if(isset($_POST["nombreMateriaEditar"])){
			//GUARDA VALORES EN EL ARRAY
			$datosController = array( "id_grupo"=>$_POST["idGrupo"],
												"id_materia"=>$_POST["nombreMateria"]);
			//LLAMA AL METODO DE ACTUALIZAR PRODUCTO MODELO
			$respuesta = Datos::actualizarMateriaGrupoModel($datosController, "grupo_materia");
			//SI ES CORRECTO LLAMA AL ACTION CAMBIOPRO
			if($respuesta == "success"){

				header("location:index.php?action=cambioPro");
			}
			else{
				echo "error";
			}

		}

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

///registrar una materia en un grupo
	public function registroMateriasGruposController(){

		if(isset($_POST["materiasD"])){
			//GUARDAR ARRAY CON LOS DATOS DE LA VENTA
			$datosController = array( "id_grupo"=>$_POST['idGrupo'],
								"id_materia"=>$_POST["materiasD"]);
			//LLAMA METODO DE REGISTRO DE LA VENTA
			$respuesta = Datos::registroMateriasGruposModel($datosController, "grupo_materia");
			//SI ES CORRECTO LLAMA LA ACTION OKVEN DE ENLACES
			if($respuesta == "success"){
				error_reporting(0);
				header("location:index.php?action=okGrupos");
				error_reporting(0);
			}
			else{
				error_reporting(0);
				header("location:index.php");
				error_reporting(0);
			}

		}

	}


	///registrar uin alumno en una materia
		public function registroAlumnosMateriasController(){

			if(isset($_POST["alumnosD"])){
				//GUARDAR ARRAY CON LOS DATOS DE LA VENTA
				$datosController = array( "id_materia"=>$_POST['idmateria'],
									"id_alumno"=>$_POST["alumnosD"]);
				//LLAMA METODO DE REGISTRO DE LA VENTA
				$respuesta = Datos::registroAlumnosMateriasModel($datosController, "materia_alumno");
				//SI ES CORRECTO LLAMA LA ACTION OKVEN DE ENLACES
				if($respuesta == "success"){
					error_reporting(0);
					header("location:index.php?action=okAlumnos");
					error_reporting(0);
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


	#BORRAR MATERIAS DEL GRUPO
	#------------------------------------
	public function borrarMateriaGrupoController(){

		if(isset($_GET["idBorrar"])){
			//OBITNE ID DE LA FILA PARA BORRAR
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO DE BORRAR VENTA
			$respuesta = Datos::borrarMateriaGrupoModel($datosController, "grupo_materia");
			//SI ES CORRECTO NOS REGRESA A LA VISTA DE VENTAS
			if($respuesta == "success"){
				error_reporting(0);
				header("location:index.php?action=grupos");
				error_reporting(0);
			}

		}

	}

	#BORRAR ALUMNOS DE LA MATERIA
	#------------------------------------
	public function borrarAlumnoMateriaController(){

		if(isset($_GET["idBorrar"])){
			//OBITNE ID DE LA FILA PARA BORRAR
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO DE BORRAR VENTA
			$respuesta = Datos::borrarAlumnoMateriaModel($datosController, "materia_alumno");
			//SI ES CORRECTO NOS REGRESA A LA VISTA DE VENTAS
			if($respuesta == "success"){
				error_reporting(0);
				header("location:index.php?action=grupos");
				error_reporting(0);
			}

		}

	}

}

?>
