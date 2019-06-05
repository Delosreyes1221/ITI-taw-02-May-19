<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

//incluir la conexion de la bd
require_once "conexion.php";

//extendemos la clase conexion a la clase datos
class Datos extends Conexion{

	#REGISTRO DE ALUMNO
	#-------------------------------------
	public static function registroAlumnoModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, matricula, fecha) VALUES (:nombre,:matricula,:fecha)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);

		//ejecucion de la sentencia
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

///REGISTRAR UNA MATERIA EN UN GRUPO
  public static function	registroMateriasGruposModel($datosModel, $tabla){
		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_grupo, id_materia) VALUES (:id_grupo,:id_materia)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_STR);


		//ejecucion de la sentencia
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	///REGISTRAR UN ALUMNO EN UNA MATERIA
	  public static function	registroAlumnosMateriasModel($datosModel, $tabla){
			#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

			//preparamos la conexion para ejecutar la sentencia sql
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_materia, id_alumno) VALUES (:id_materia,:id_alumno)");

			#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

			//vincula las variables para la sentencia
			$stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_STR);
			$stmt->bindParam(":id_alumno", $datosModel["id_alumno"], PDO::PARAM_STR);


			//ejecucion de la sentencia
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

		#PERMITE REALIZAR UNA VISTA PARA TUTORIAS
#-------------------------------------
public static function vistaTutoriasModel($tabla){

	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
	$stmt->execute();

	return $stmt->fetchAll();

	$stmt->close();

}

#VISTA DE LAS TUTORIAS POR NIVEL
#-------------------------------------
#Muestra solo las tutorias que ha hecho el empleado, con el numero de maestro ingresado
public function vistaTutoriasNivelModel($tabla, $id){

	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where num_maestro=:num_maestro");
	$stmt->bindParam(":num_maestro", $id, PDO::PARAM_STR);
	$stmt->execute();

	return $stmt->fetchAll();

	$stmt->close();

}

#BORRAR ALUMNOS TUTORIAS
#-------------------------------------
public function borrarAlumnosTutoriaModel($datosModel, $tabla){
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sesion = :id");
	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

	if($stmt->execute())
		return "success";
	else
		return "error";

	$stmt->close();
}

#OBTENER ALUMNOS
	#-------------------------------------
	#Obtiene las alumnos de toda la tabla
	public static function obtenerAlumnosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#BORRAR DE LAS TUTORIAS
	#-------------------------------------
	public function borrarTutoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}





	#REGISTRO DE MAESTROS
	#-------------------------------------
	public static function registroMaestroModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, matricula, fecha) VALUES (:nombre,:matricula,:fecha)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);

		//ejecucion de la sentencia
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	#REGISTRO DE ALUMNO
	#-------------------------------------
	public static function registroMateriaModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, id_maestro) VALUES (:nombre,:id_maestro)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_maestro", $datosModel["id_maestro"], PDO::PARAM_STR);

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

	#VISTA ALUMNOS
	#-------------------------------------

	public static function vistaAlumnosModel($tabla){
		//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS
		$stmt = Conexion::conectar()->prepare("SELECT id_alumno, matricula, nombre, fecha FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA MAESTROS
	#-------------------------------------

	public static function vistaMaestroModel($tabla){
		//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA MATERIAS
	#-------------------------------------

	public static function vistaMateriasModel($tabla){
		//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA GRUPOS
	#-------------------------------------

	public static function vistaGruposModel($tabla){
		//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR ALUMNOS
	#-------------------------------------

	public static function editarAlumnoModel($datosModel, $tabla){
//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS PARA EDITAR UN REGISTRO
		$stmt = Conexion::conectar()->prepare("SELECT id_alumno, nombre, matricula, fecha FROM $tabla WHERE id_alumno = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#EDITAR MAESTROS
	#-------------------------------------

	public static function editarMaestrosModel($datosModel, $tabla){
//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS PARA EDITAR UN REGISTRO
		$stmt = Conexion::conectar()->prepare("SELECT id_maestro, nombre, matricula, fecha FROM $tabla WHERE id_maestro = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

///EDITAR GRUPO
	public static function editarGrupoModel($datosModel, $tabla){
//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS PARA EDITAR UN REGISTRO
		$stmt = Conexion::conectar()->prepare("SELECT id_grupo, nombre  FROM $tabla WHERE id_grupo = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR ALUMNO
	#-------------------------------------

	public static function actualizarAlumnoModel($datosModel, $tabla){
		//PREPARA PARA ACTUALIZAR LOS DATOS DE UN REGISTRO DE LA TABLA USUARIOS
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_grupo, id_materia) VALUES (:id_grupo,:id_materia)");
		//asigna a los valores a las variables
		$stmt->bindParam(":id_grupo", $datosModel["id_grupo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_materia", $datosModel["id_materia"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
	}

	#ACTUALIZAR MATERIAS DEL grupo
	#-------------------------------------

	public static function actualizarMateriaGrupoModel($datosModel, $tabla){
		//PREPARA PARA ACTUALIZAR LOS DATOS DE UN REGISTRO DE LA TABLA USUARIOS
		$stmt = Conexion::conectar()->prepare("INSERT $tabla SET nombre = :nombre, matricula = :matricula, fecha = :fecha WHERE id_alumno = :id");
		//asigna a los valores a las variables
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_alumno"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public static function actualizarMaestroModel($datosModel, $tabla){
		//PREPARA PARA ACTUALIZAR LOS DATOS DE UN REGISTRO DE LA TABLA USUARIOS
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, matricula = :matricula, fecha = :fecha WHERE id_maestro = :id");
		//asigna a los valores a las variables
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_maestro"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
	}


		//ACTUALIZAR GRUPO
		//-------------------------------------
		public static function actualizarGrupoModel($datosModel, $tabla){
			//PREPARA PARA ACTUALIZAR LOS DATOS DE UN REGISTRO DE LA TABLA USUARIOS
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id_grupo = :id");
			//asigna a los valores a las variables
			$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":id", $datosModel["id_grupo"], PDO::PARAM_INT);

			if($stmt->execute()){
				return "success";
			}
			else{
				return "error";
			}

		$stmt->close();

	}


	#EDITAR MATERIAS
	#-------------------------------------

	public static function editarMateriaModel($datosModel, $tabla){
//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS PARA EDITAR UN REGISTRO
		$stmt = Conexion::conectar()->prepare("SELECT m.id_materia, m.nombre as nombreMateria, ma.nombre FROM materias m INNER JOIN maestros ma ON m.id_maestro = ma.id_maestro WHERE id_materia = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR MATERIA
	#-------------------------------------

	public static function actualizarMateriaModel($datosModel, $tabla){
		//PREPARA PARA ACTUALIZAR LOS DATOS DE UN REGISTRO DE LA TABLA USUARIOS
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_maestro = :id_maestro, nombre = :nombre WHERE id_materia = :id");
		//asigna a los valores a las variables
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_maestro", $datosModel["id_maestro"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id_materia"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}

	#BORRAR ALUMNO
	#------------------------------------
	public static function borrarAlumnoModel($datosModel, $tabla){
		//PREPARA SENTENCIA PARA BORRAR REGISTRO DE USUARIO
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_alumno = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}

	#BORRAR MATERIA DEL GRUPO
	#------------------------------------
	public static function borrarAlumnoMateriaModel($datosModel, $tabla){
		//PREPARA SENTENCIA PARA BORRAR REGISTRO DE USUARIO
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

	#BORRAR MAESTROS
	#------------------------------------
	public static function borrarMaestroModel($datosModel, $tabla){
		//PREPARA SENTENCIA PARA BORRAR REGISTRO DE USUARIO
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_maestro = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}


	#BORRAR GRUPOS
	#------------------------------------
	public static function borrarGrupoModel($datosModel, $tabla){
		//PREPARA SENTENCIA PARA BORRAR REGISTRO DE USUARIO
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_grupo = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt->close();

	}

	#BORRAR MATERIA
	#------------------------------------
	public static function borrarMateriaModel($datosModel, $tabla){
		//PREPARA SENTENCIA PARA BORRAR REGISTRO DE USUARIO
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_materia = :id");
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
	public static function registroGrupoModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		//preparamos la conexion para ejecutar la sentencia sql
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		//vincula las variables para la sentencia
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

		//ejecucion de la sentencia
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

		# REGISTRO DE MATERIAS EN LOS GRUPOS
		#-------------------------------------
		public static function registroMateriasenGrupoModel($id_grupo,$id_materia, $tabla){

			#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

			//preparamos la conexion para ejecutar la sentencia sql
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_grupo, id_materia) VALUES (:id_grupo, :id_materia)");

			#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

			//vincula las variables para la sentencia
			$stmt->bindParam(":id_grupo", $id_grupo, PDO::PARAM_STR);
			$stmt->bindParam(":id_materia", $id_materia, PDO::PARAM_STR);

			//ejecucion de la sentencia
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

	#VISTA DE PROESORES PARA MOSTRAR EN LAS MTERIAS
	#-------------------------------------

	public static function vistaProfesoresModel($tabla){
		//PREPARAMOS LA SENTENCIA PARA VER LOS PRODUCTOS
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		//EJECUTAR SENTENCIA
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#VISTA DE MATERIAS PARA LOS GRUPOS
#-------------------------------------

public static function vistaMateriasGruposModel($datosModel, $tabla){
	//PREPARAMOS LA SENTENCIA PARA VER LOS PRODUCTOS
	$stmt = Conexion::conectar()->prepare("SELECT gm.id, ma.nombre FROM $tabla gm INNER JOIN materias ma ON gm.id_materia = ma.id_materia WHERE gm.id_grupo = :id");
	//EJECUTAR SENTENCIA

	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
	$stmt->execute();

	#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
	return $stmt->fetchAll();

	$stmt->close();

}

public static function vistaAlumnosMateriasModel($datosModel, $tabla){
	//PREPARAMOS LA SENTENCIA PARA VER LOS PRODUCTOS
	$stmt = Conexion::conectar()->prepare("SELECT ma.id, a.nombre FROM $tabla ma INNER JOIN alumnos a ON ma.id_alumno = a.id_alumno WHERE ma.id_materia = :id");
	//EJECUTAR SENTENCIA

	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
	$stmt->execute();

	#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
	return $stmt->fetchAll();

	$stmt->close();

}




	#EDITAR PRODUCTO
	#-------------------------------------

	public static function editarProductoModel($datosModel, $tabla){
		//PREPARA SENTECNAI PARA EDIATR UN PRODUCTO
		$stmt = Conexion::conectar()->prepare("SELECT id, producto, precio FROM $tabla WHERE id = :id");
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

	public static function actualizarProductoModel($datosModel, $tabla){
		//PREPARA LA SENTENCIA PARA CTUALIZAR PRODUCTOS
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET producto = :producto, precio = :precio WHERE id = :id");
		//ASIGNA VALORES A LO SPARAMETROS DE LA SENTENCCIA
		$stmt->bindParam(":producto", $datosModel["producto"], PDO::PARAM_STR);
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


	#BORRAR PRODUCTO
	#------------------------------------
	public static function borrarProductoModel($datosModel, $tabla){
		//PREPARA SENTECNIA PARA BORRAR PRODUCTO
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
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
