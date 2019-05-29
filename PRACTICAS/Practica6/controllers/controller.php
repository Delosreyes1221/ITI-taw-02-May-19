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

			$enlaces = "index22";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	#REGISTRO DE CLIENTE
	#------------------------------------
	public function registroClienteController(){
		//SE VERIFICA QUE SE ESTE REGISTRANDO UN USUARIO
		if(isset($_POST["nombreRegistro"])){
			//GUARDA LOS VALORES EN UN ARRAY ASOCITIVO PARA MANDAR POR PARAMETRO LOS VALORES
			$datosController = array( "nombre"=>$_POST["nombreRegistro"],
									  "email"=>$_POST["emailRegistro"],
									  "telefono"=>$_POST["telefonoRegistro"]);
			//PASA POR PARAMETRO LOS DATOS Y LA TABLA QUE SE DESEA HACER EL REGISTRO DE LOS DATOS
			$respuesta = Datos::registroClienteModel($datosController, "clientes");
			//VERIFICA QUE SEA CORRECTO
			if($respuesta == "success"){
				//MANDA UN OK EN ACTION A ENLACES
				error_reporting(0);
				header("location:index22.php?action=ok");

error_reporting(0);
			}
			//SI NO MANDA AL INDEX QUE ARROJA AL REGISTRO EN EL MODELO ENLACES
			else{

				header("location:index.php");
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

				if ($_POST["usuarioIngreso"] == "gerente") {
					header("location:index22.php?action=usuarios?usuarioD=1");
				}
				else if ($_POST["usuarioIngreso"] == "admin") {
					header("location:index22.php?action=usuarios?usuarioD=2");
				}


			}

		}

	}

	#VISTA DE CLIENTES
	#------------------------------------
	public function vistaClientesController(){
		//TRAE TODOS LOS Clientes
		$respuesta = Datos::vistaClientesModel("clientes");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//CICLO PARA MOSTRAR E ITERAR TODOS LOS VALORES EN FILAS DE UNA TABLA
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["telefono"].'</td>

				<td><a href="index22.php?action=editar&id='.$item["id_cliente"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td><a href="index22.php?action=usuarios&idBorrar='.$item["id_cliente"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	#VISTA DE CLIENTES
	#------------------------------------
	public function vistaReservacionController(){
		//TRAE TODOS LOS Clientes
		$respuesta = Datos::vistaReservacionModel("reservaciones");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//CICLO PARA MOSTRAR E ITERAR TODOS LOS VALORES EN FILAS DE UNA TABLA
		foreach($respuesta as $row => $item){
		echo'<tr>
		    <td>'.$item['id_reservacion'].'</td>
				<td>'.$item["tipo_habitacion"].'</td>
				<td>'.$item["noches"].'</td>


				<td><a href="index22.php?action=editarReservacion&id='.$item["id_reservacion"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td><a href="index22.php?action=reservacion&idBorrar='.$item["id_reservacion"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	#VISTA DE RESERVACIONES HABITACIONES
	#------------------------------------
	public function vistaReservacionHabitacionController(){
		//TRAE TODOS LOS Clientes
		$respuesta = Datos::vistaReservacionHabitacionModel("reservaHabitacion");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//CICLO PARA MOSTRAR E ITERAR TODOS LOS VALORES EN FILAS DE UNA TABLA
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item['id'].'</td>
		    <td>'.$item['numero_habitacion'].'</td>
				<td>'.$item["nombre_cliente"].'</td>
				<td>'.$item["numero_reservacion"].'</td>


				<td><a href="index22.php?action=editarReservacionHabitacion&id='.$item["id"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td><a href="index22.php?action=reservacionHabitacion&idBorrar='.$item["id"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------
	public function editarUsuarioController(){
		//OBTIENE ID DE LA FILA O REGISTRO A EDITAR
		$datosController = $_GET["id"];
		//MANDA COMO PARAMETRO ESOS DATOS Y LLAMA AL METODO EDITARUSUARIOMODEL
		$respuesta = Datos::editarUsuarioModel($datosController, "clientes");
		//GENERA LOS INPUT PARA EDITAR LOS VALORES DEL REGISTRO
		echo'<input type="hidden" value="'.$respuesta["id_cliente"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["nombre"].'" name="nombreEditar" required>

			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

			 <input type="text" value="'.$respuesta["telefono"].'" name="telefonoEditar" required>

			 <input type="submit" type="button" class="btn btn-success" value="Actualizar">';

	}

	public function editarReservacionController(){
		//OBTIENE ID DE LA FILA O REGISTRO A EDITAR
		$datosController = $_GET["id"];
		//MANDA COMO PARAMETRO ESOS DATOS Y LLAMA AL METODO EDITARUSUARIOMODEL
		$respuesta = Datos::editarReservacionModel($datosController, "reservaciones");
		//GENERA LOS INPUT PARA EDITAR LOS VALORES DEL REGISTRO
		echo'<input type="hidden" value="'.$respuesta["id_reservacion"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["tipo_habitacion"].'" name="habitacionEditar" required>

			 <input type="email" value="'.$respuesta["noches"].'" name="nochesEditar" required>

			 <input type="submit" type="button" class="btn btn-success" value="Actualizar">';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarReservacionController(){

		if(isset($_POST["habitacionEditar"])){
			//GUARDA EN UN ARRAY LOS VALORES PARA ACTUALIZAR LOS DATOS
			$datosController = array( "id_reservacion"=>$_POST["idEditar"],
							          "tipo_habitacion"=>$_POST["habitacionEditar"],
				                      "noches"=>$_POST["nochesEditar"]);
			//LLAMA AL METODO DENTRO DEL MODELO DE ACTULAIZAR USUARIO
			$respuesta = Datos::actualizarReservacionModel($datosController, "reservaciones");
			//SI ES CORRECTO MANDA ACTION CAMBIO A ENLACES
			if($respuesta == "success"){

				header("location:index22.php?action=cambioReservacion");

			}
			//EN CASO DE ERROR MANDA UN ECHO CON MENSAJE ERROR
			else{

				echo "error";

			}

		}

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["habitacionEditar"])){
			//GUARDA EN UN ARRAY LOS VALORES PARA ACTUALIZAR LOS DATOS
			$datosController = array( "id_habitacion"=>$_POST["idEditar"],
							          "tipo_habitacion"=>$_POST["habitacionEditar"],
				                      "noches"=>$_POST["nochesEditar"]);
			//LLAMA AL METODO DENTRO DEL MODELO DE ACTULAIZAR USUARIO
			$respuesta = Datos::actualizarUsuarioModel($datosController, "reservaciones");
			//SI ES CORRECTO MANDA ACTION CAMBIO A ENLACES
			if($respuesta == "success"){

				header("location:index22.php?action=cambioReservacion");

			}
			//EN CASO DE ERROR MANDA UN ECHO CON MENSAJE ERROR
			else{

				echo "error";

			}

		}

	}

	#BORRAR CLIENTE
	#------------------------------------
	public function borrarClientesController(){

		if(isset($_GET["idBorrar"])){
			//OBTIENE ID DEL REGISTRO
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO PARA BORRAR UN USUARIO
			$respuesta = Datos::borrarClientesModel($datosController, "clientes");
			//EN CASO DE SER CORRECTO REGRESA A LA VISTA DE USUARIOS
			if($respuesta == "success"){
error_reporting(0);
				header("location:index22.php?action=usuarios");
				error_reporting(0);
			}

		}

	}

	#REGISTRO DE HABITACIONES
	#------------------------------------
	public function registroHabitacionesController(){

		if(isset($_POST["tipoRegistro"])){
			//GUARDA LOS VALORES EN EL ARRAY PARA REGISTRAR UN PRODUCTO
			$datosController = array( "tipo"=>$_POST["tipoRegistro"],
								      "precio"=>$_POST["precioRegistro"]);
			//LLAMA AL METODO DE REGISTRAR UN PRODUCTO
			$respuesta = Datos::registroHabitacionesModel($datosController, "habitaciones");
			//SI ES CORRRECTO MANDA UN ACTION okPro
			if($respuesta == "success"){
error_reporting(0);
				header("location:index23.php?action=okPro");
error_reporting(0);
			}
			//SI NO MANDA AL INDEX
			else{

				header("location:index22.php");
			}

		}

	}


	#VISTA DE HABITACIONES
	#------------------------------------

	public function vistaHabitacionesController(){

		$respuesta = Datos::vistaHabitacionesModel("habitaciones");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//IMPRIME LAS FILAS DE LA TABLA AGREGANDO BOTONES DE ACCION
		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_habitacion"].'</td>
				<td>'.$item["tipo"].'</td>
				<td>'.$item["precio"].'</td>
				<td><a href="index22.php?action=editarPro&id='.$item["id_habitacion"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td><a href="index22.php?action=productos&idBorrar='.$item["id_habitacion"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}


	#VISTA DE NOMBRES DE CLIENTES
	#------------------------------------

	public function vistaClienteNombreController(){

		$respuesta = Datos::vistaClienteNombreModel("clientes");
		$respuesta2 = Datos::vistaNumeroHabitacionModel("habitaciones");
		$respuesta3 = Datos::vistaNumeroReservacionModel("reservaciones");
		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//IMPRIME LAS FILAS DE LA TABLA AGREGANDO BOTONES DE ACCION


		//SE MUESTRAN LAS HABITACIONES EN BASE A SU NUMERO
		echo '<label class="labels">NUMERO DE HABITACION</label>';
		echo '<select class="nombres" name="numeroHabitaciones" id="">';
		foreach($respuesta2 as $row2 => $item2){

				echo '<option value="'.$item2['id_habitacion'].'">'.$item2['id_habitacion'].'</option>';
		}
		echo '</select>';

		//SE MUESTRA EL NOMBRE DE LOS CLIENTES REGISTRADOS
		echo '<label class="labels">CLIENTES</label>';
		echo '<select class="nombres" name="nombreClientes" id="">';
		foreach($respuesta as $row => $item){

				echo '<option value="'.$item['nombre'].'">'.$item['nombre'].'</option>';
		}
		echo '</select>';

		//SE MUESTRA LAS RESERVACIONES REGISTRADAS
		echo '<label class="labels">NUMERO DE RESERVACION</label>';
		echo '<select class="nombres" name="numeroReservaciones" id="">';
		foreach($respuesta3 as $row3 => $item3){

				echo '<option value="'.$item3['id_reservacion'].'">'.$item3['id_reservacion'].'</option>';
		}
		echo '</select>';




if(isset($_POST["numeroHabitaciones"])){

	$datosController = array( "numero_habitacion"=>$_POST["numero_habitaciones"],
									"nombre_cliente"=>$_POST["nombreClientes"],
									"numero_reservacion"=>$_POST["numero_reservacion"]);

									$respuesta = Datos::registroReservacionHabitacionModel($datosController, "reservaHabitacion");
									//SI ES CORRRECTO MANDA UN ACTION okPro
									if($respuesta == "success"){

										header("location:index22.php?action=okReservacionHabitacion");

									}
									//SI NO MANDA AL INDEX
									else{

										header("location:index22.php");
									}

									}

}



	#VISTA DE RESERVACION
	#------------------------------------



	public function reservarHabitacionController(){

		$respuesta = Datos::reservarHabitacionModel("clientes");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		//IMPRIME LAS FILAS DE LA TABLA AGREGANDO BOTONES DE ACCION
		foreach($respuesta as $row => $item){


		echo'<tr>
				<td>'.$item["id_reservacion"].'</td>
				<td>'.$item["tipo"].'</td>
				<td>'.$item["noches"].'</td>
				<td><a href="index22.php?action=editarPro&id='.$item["id"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td><a href="index22.php?action=productos&idBorrar='.$item["id"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	#EDITAR PRODUCTO
	#------------------------------------

	public function editarHabitacionController(){
		//OBTIENE ID POR GET
		$datosController = $_GET["id"];
		//LLAMA METODO DE EDITAR EL PRODUCTO
		$respuesta = Datos::editarHabitacionModel($datosController, "habitaciones");
		//GENERAR LOS INPUT PARA EDICION
		echo'<input type="hidden" value="'.$respuesta["id_habitacion"].'" name="idEditar">

			 <input type="text" value="'.$respuesta["tipo"].'" name="tipoEditar" required>

			 <input type="text" value="'.$respuesta["precio"].'" name="precioEditar" required>

			 <input type="submit" type="button" class="btn btn-success" value="Actualizar">';

	}

	#ACTUALIZAR PRODUCTO
	#------------------------------------
	public function actualizarHabitacionController(){

		if(isset($_POST["tipoEditar"])){
			//GUARDA VALORES EN EL ARRAY
			$datosController = array( "id"=>$_POST["idEditar"],
							          "tipo"=>$_POST["tipoEditar"],
				                      "precio"=>$_POST["precioEditar"]);
			//LLAMA AL METODO DE ACTUALIZAR PRODUCTO MODELO
			$respuesta = Datos::actualizarHabitacionModel($datosController, "habitaciones");
			//SI ES CORRECTO LLAMA AL ACTION CAMBIOPRO
			if($respuesta == "success"){

				header("location:index22.php?action=cambioPro");
			}
			else{
				echo "error";
			}

		}

	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarHabitacionController(){

		if(isset($_GET["idBorrar"])){
			//OBITENE ID PARA BORRAR
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO DE BORRAR PRODUCTO
			$respuesta = Datos::borrarHabitacionModel($datosController, "habitaciones");
			//SI ES CORRECTO NOS REGRESA A LA VISTA PRODUCTOS
			if($respuesta == "success"){
error_reporting(0);
				header("location:index22.php?action=productos");
error_reporting(0);
			}

		}

	}


	#REGISTRO DE VENTAS
	#------------------------------------
	public function registroVentaController(){

		if(isset($_POST["productoRegistro"])){
			//GUARDAR ARRAY CON LOS DATOS DE LA VENTA
			$datosController = array( "producto_id"=>$_POST["productoRegistro"],
								      "cantidad"=>$_POST["cantidadRegistro"]);
			//LLAMA METODO DE REGISTRO DE LA VENTA
			$respuesta = Datos::registroVentaModel($datosController, "ventas");
			//SI ES CORRECTO LLAMA LA ACTION OKVEN DE ENLACES
			if($respuesta == "success"){
				header("location:index22.php?action=okVen");
			}
			else{
				header("location:index22.php");
			}

		}

	}

	#REGISTRO DE RESERVACIONES
	#------------------------------------
	public function registroReservacionController(){

		if(isset($_POST["tipoReservacion"])){
			//GUARDAR ARRAY CON LOS DATOS DE LA VENTA
			$datosController = array( "tipo_habitacion"=>$_POST["tipoReservacion"],
								      "noches"=>$_POST["nochesReservacion"]);
			//LLAMA METODO DE REGISTRO DE LA VENTA
			$respuesta = Datos::registroReservacionModel($datosController, "reservaciones");
			//SI ES CORRECTO LLAMA LA ACTION OKVEN DE ENLACES
			if($respuesta == "success"){
				header("location:index22.php?action=okRes");
			}
			else{
				header("location:index22.php");
			}

		}

	}

	public function registroReservacionHabitacionController(){

		if(isset($_POST["Enviar"])){
			//GUARDAR ARRAY CON LOS DATOS DE LA VENTA
			$datosController = array( "numero_habitacion"=>$_POST["numeroHabitaciones"],
								      "nombre_cliente"=>$_POST["nombreClientes"],
										"numero_reservacion"=>$_POST["numeroReservaciones"]);
			//LLAMA METODO DE REGISTRO DE LA VENTA
			$respuesta = Datos::registroReservacionHabitacionModel($datosController, "reservahabitacion");
			//SI ES CORRECTO LLAMA LA ACTION OKVEN DE ENLACES
			if($respuesta == "success"){
				header("location:index22.php?action=okReservacionHabitacion");
			}
			else{
				header("location:index22.php");
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
				<td><a href="index22.php?action=editarVen&id='.$item["id"].'"><button type="button" class="btn btn-info">Editar</button></a></td>
				<td><a href="index22.php?action=ventas&idBorrar='.$item["id"].'"><button type="button" class="btn btn-danger">Borrar</button></a></td>
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
				header("location:index22.php?action=cambioVen");
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

				header("location:index22.php?action=ventas");

			}

		}

	}


	#BORRAR RESERVACIONES
	#------------------------------------
	public function borrarReservacionController(){

		if(isset($_GET["idBorrar"])){
			//OBITNE ID DE LA FILA PARA BORRAR
			$datosController = $_GET["idBorrar"];
			//LLAMA AL METODO DE BORRAR VENTA
			$respuesta = Datos::borrarReservacionModel($datosController, "reservaciones");
			//SI ES CORRECTO NOS REGRESA A LA VISTA DE VENTAS
			if($respuesta == "success"){
error_reporting(0);
				header("location:index22.php?action=reservacion");
error_reporting(0);
			}

		}

	}

}

?>
