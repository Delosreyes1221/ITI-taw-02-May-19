<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

//incluir la conexion de la bd
require_once "conexion.php";

//extendemos la clase conexion a la clase datos
class Datos extends Conexion{


	# VISTA DE CLIENTES PARA REGISTRO DE HABITACION
	#-------------------------------------
	public static function vistaClienteNombreModel($tabla){

		//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	# VISTA DE HABITACIONES PARA REGISTRO DE HABITACION
	#-------------------------------------
	public static function vistaNumeroHabitacionModel($tabla){

		//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}
	# VISTA DE RESERVACIONES PARA REGISTRO DE HABITACION
	#-------------------------------------
	public static function vistaNumeroReservacionModel($tabla){

		//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}


	#REGISTRO DE USUARIOS
	#-------------------------------------
	public static function registroClienteModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, email, telefono) VALUES (:nombre,:email,:telefono)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);


		//ejecucion de la sentencia
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	#INGRESO USUARIO
	#-------------------------------------
	public static function ingresoUsuarioModel($datosModel, $tabla){
		//METODO PARA INGRESA USUARIO Y TRAER DATOS MEDIANTE PDO
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");
		//ASIGNA VALOR DE VARIABLES DE SENTENCIA
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		//EJECITA SENTENCIA
		$stmt->execute();

		#fetch(): Obtiene una fila de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetch();
		//CIERRA LA CONEXION
		$stmt->close();

	}

	#VISTA CLIENTES
	#-------------------------------------

	public static function vistaClientesModel($tabla){
		//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#RESERVACION DE HABITACION
	#-------------------------------------

	public static function reservarNombreModel($tabla){
		//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS
	$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------

	public static function editarUsuarioModel($datosModel, $tabla){
//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS PARA EDITAR UN REGISTRO
		$stmt = Conexion::conectar()->prepare("SELECT id_cliente, nombre, email, telefono FROM $tabla WHERE id_cliente = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public static function actualizarUsuarioModel($datosModel, $tabla){
		//PREPARA PARA ACTUALIZAR LOS DATOS DE UN REGISTRO DE LA TABLA USUARIOS
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email, telefono = :telefono WHERE id_cliente = :id");
		//asigna a los valores a las variables
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}


	#BORRAR USUARIO
	#------------------------------------
	public static function borrarClientesModel($datosModel, $tabla){
		//PREPARA SENTENCIA PARA BORRAR REGISTRO DE CLIENTES
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cliente = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}

	#BORRAR USUARIO
	#------------------------------------
	public static function borrarReservacionModel($datosModel, $tabla){
		//PREPARA SENTENCIA PARA BORRAR REGISTRO DE CLIENTES
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_reservacion = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}



	# REGISTRO DE PRODUCTOS
	#-------------------------------------
	public static function registroHabitacionesModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo,precio) VALUES (:tipo,:precio)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);

		//ejecucion de la sentencia
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	# REGISTRO DE RESERVACIONES
	#-------------------------------------
	public static function registroReservacionModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tipo_habitacion,noches) VALUES (:tipo_habitacion,:noches)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":tipo_habitacion", $datosModel["tipo_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":noches", $datosModel["noches"], PDO::PARAM_STR);

		//ejecucion de la sentencia
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	public static function registroReservacionHabitacionModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla numero_habitacion,nombre_cliente,numero_reservacion) VALUES (:numero_habitacion,:nombre_cliente,:numero_reservacion)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":numero_habitacion", $datosModel["numero_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_cliente", $datosModel["nombre_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":numero_reservacion", $datosModel["numero_reservacion"], PDO::PARAM_STR);

		//ejecucion de la sentencia
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}


	#VISTA HABITACIONES
	#-------------------------------------

	public static function vistaHabitacionesModel($tabla){
		//PREPARAMOS LA SENTENCIA PARA VER LOS PRODUCTOS
		$stmt = Conexion::conectar()->prepare("SELECT id_habitacion, tipo, precio FROM $tabla");
		//EJECUTAR SENTENCIA
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA RESERVACION
	#-------------------------------------

	public static function vistaReservacionModel($tabla){
		//PREPARAMOS LA SENTENCIA PARA VER LOS PRODUCTOS
		$stmt = Conexion::conectar()->prepare("SELECT t.id_reservacion, t.tipo_habitacion, t.noches, h.tipo  FROM $tabla t INNER JOIN habitaciones h ON t.tipo_habitacion = h.id_habitacion");
		//EJECUTAR SENTENCIA
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA RESERVACION HABITACION
	#-------------------------------------

	public static function vistaReservacionHabitacionModel($tabla){
		//PREPARAMOS LA SENTENCIA PARA VER LOS PRODUCTOS
		$stmt = Conexion::conectar()->prepare("SELECT * FROM reservaHabitacion");
		//EJECUTAR SENTENCIA
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}



	#EDITAR PRODUCTO
	#-------------------------------------

	public static function editarHabitacionModel($datosModel, $tabla){
		//PREPARA SENTECNAI PARA EDIATR UN PRODUCTO
		$stmt = Conexion::conectar()->prepare("SELECT id_habitacion, tipo, precio FROM $tabla WHERE id_habitacion = :id");
		//ASIGANA ID
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		//EJECUTA SENTENCIA
		$stmt->execute();
		//OBTIENE LA FILA
		return $stmt->fetch();

		$stmt->close();

	}

	#EDITAR PRODUCTO
	#-------------------------------------

	public static function editarReservacionModel($datosModel, $tabla){
		//PREPARA SENTECNAI PARA EDIATR UN PRODUCTO
		$stmt = Conexion::conectar()->prepare("SELECT id_reservacion, tipo_habitacion, noches FROM $tabla WHERE id_reservacion = :id");
		//ASIGANA ID
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		//EJECUTA SENTENCIA
		$stmt->execute();
		//OBTIENE LA FILA
		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR PRODUCTO
	#-------------------------------------

	public static function actualizarHabitacionModel($datosModel, $tabla){
		//PREPARA LA SENTENCIA PARA CTUALIZAR PRODUCTOS
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo = :tipo, precio = :precio WHERE id_habitacion = :id");
		//ASIGNA VALORES A LO SPARAMETROS DE LA SENTENCCIA
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}

	#ACTUALIZAR RESERVACION
	#-------------------------------------

	public static function actualizarReservacionModel($datosModel, $tabla){
		//PREPARA LA SENTENCIA PARA CTUALIZAR PRODUCTOS
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipo_reservacion = :tipo_habitacion, noches = :noches WHERE id_reservacion = :id");
		//ASIGNA VALORES A LO SPARAMETROS DE LA SENTENCCIA
		$stmt->bindParam(":tipo_reservacion", $datosModel["tipo_reservacion"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_habitacion", $datosModel["tipo_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_reservacion", $datosModel["id_reservacion"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}


	#BORRAR PRODUCTO
	#------------------------------------
	public static function borrarHabitacionModel($datosModel, $tabla){
		//PREPARA SENTECNIA PARA BORRAR PRODUCTO
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_habitacion = :id");
		//ASIGNA ID DE PARAMETRO
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		//SI ES CORRECTO MANDA MENSAJE CORRECTO SI NO ERROR
		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}


	# REGISTRO DE VENTAS
	#-------------------------------------
	public static function registroVentaModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (producto_id,cantidad,total) VALUES (:producto_id,:cantidad,:total)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":producto_id", $datosModel["producto_id"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_STR);
		//OBTENEMOS LA CANTIDAD DEL REGISTRO
		$cantidad = $datosModel["cantidad"];

		$stmt2 = Conexion::conectar()->prepare("SELECT * FROM productos WHERE id = :producto_id");
		$stmt2->bindParam(":producto_id", $datosModel["producto_id"], PDO::PARAM_STR);
		$stmt2->setFetchMode(PDO::FETCH_ASSOC);
		// Ejecutamos
		$stmt2->execute();
		// Mostramos los resultados
		$row = $stmt2->fetch();
		$precio2 = $row["precio"];
		//CALCULAMOS EL TOTAL
		$total = $cantidad * $precio2;

		//ASIGANMOS EN TOTOAL
		$stmt->bindParam(":total", $total, PDO::PARAM_STR);

		//ejecucion de la sentencia
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

		#VISTA VENTAS
	#-------------------------------------

	public static function vistaVentasModel($tabla){
		//PREPARAMOS LA SENTENCIA PARA VER LOAS VENTAS
		$stmt = Conexion::conectar()->prepare("SELECT id, producto_id, cantidad, total FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR VENTA
	#-------------------------------------

	public static function editarVentaModel($datosModel, $tabla){
		//PREPARAMOS LA SENTENCIA PARA EDITAR A VENTA
		$stmt = Conexion::conectar()->prepare("SELECT id, producto_id, cantidad FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR VENTA
	#-------------------------------------

	public static function actualizarVentaModel($datosModel, $tabla){
		//PREPARAMOS LA SENTENCIA PARA ACTUALZAR LA VENTA
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cantidad = :cantidad, total = :total WHERE id = :id");

		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_STR);

		$cantidad = $datosModel["cantidad"];
		//$cantidad = $datosModel["producto_id"];

		$stmt2 = Conexion::conectar()->prepare("SELECT * FROM productos WHERE id = :producto_id");
		$stmt2->bindParam(":producto_id", $datosModel["producto_id"], PDO::PARAM_STR);
		$stmt2->setFetchMode(PDO::FETCH_ASSOC);
		// Ejecutamos
		$stmt2->execute();
		// Mostramos los resultados
		$row = $stmt2->fetch();

		$precio2 = $row["precio"];

		$total = $cantidad * $precio2;
		//$total = $cantidad;

		$stmt->bindParam(":total", $total, PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}


	#BORRAR VENTA
	#------------------------------------
	public static function borrarVentaModel($datosModel, $tabla){
		//PREPARAMOS LA SENTENCIA PARA BORRAR LAS VENTAS
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}

}

?>
