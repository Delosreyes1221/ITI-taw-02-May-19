<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php.
// Se extiende cuando se requiere manipuar una funcion, en este caso se va a  manipular la función "conectar" del models/conexion.php:
class Datos extends Conexion{

	#INGRESO MAESTRO
	#-------------------------------------
	#Obtiene el email, contrasena, numero de empleado y nivel de los maestros.
	public static function ingresoMaestroModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT email, password, num_empleado, nivel FROM $tabla WHERE email = :email");
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();
		$stmt->close();
	}

	#VISTA MAESTROS MODEL
	#-------------------------------------
	#Obtiene los datos de todos los maestros
	public static function vistaMaestrosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT m.num_empleado as num_empleado, m.nombre as nombre, m.email as email, c.nombre as nombre_carrera, m.nivel as nivel FROM $tabla as m inner join carrera as c on m.id_carrera=c.id");
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR MAESTRO
	#-------------------------------------
	#Se encarga de obtener los valores actuales de cierto empleado
	public static function editarMaestroModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT num_empleado, nombre, email, password, id_carrera, nivel FROM $tabla WHERE num_empleado = :num_empleado");
		$stmt->bindParam(":num_empleado", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

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
			$stmt->bindParam(":id_alumno", $datosModel["matricula"], PDO::PARAM_STR);


			//ejecucion de la sentencia
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

#EDITAR MATERIAS
#-------------------------------------

public static function editarMateriaModel($datosModel, $tabla){
//PREPARA PARA OBTENER TODOS LOS DATOS DE LA TABLA DE USUARIOS PARA EDITAR UN REGISTRO
	$stmt = Conexion::conectar()->prepare("SELECT m.id_materia, m.nombre as nombreMateria, ma.nombre FROM materias m INNER JOIN maestros ma ON m.id_maestro = ma.num_empleado WHERE id_materia = :id");
	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
	$stmt->execute();

	return $stmt->fetch();

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


	#ACTUALIZAR MATERIA
#-------------------------------------

public static function actualizarMateriaModel($datosModel, $tabla){
	//PREPARA PARA ACTUALIZAR LOS DATOS DE UN REGISTRO DE LA TABLA USUARIOS
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, id_maestro = :num_empleado  WHERE id_materia = :id");
	//asigna a los valores a las variables
	$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
  $stmt->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_STR);
	$stmt->bindParam(":id", $datosModel["id_materia"], PDO::PARAM_INT);

	if($stmt->execute()){
		return "success";
	}
	else{
		return "error";
	}

	$stmt->close();

}

	#OBTENER CARRERAS
	#-------------------------------------
	#Obtiene las carreras de toda la tabla
	public static function obtenerCarrerasModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#OBTENER TUTORES
	#-------------------------------------
	#Obtiene las tutores de toda la tabla
	public static function obtenerTutoresModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT num_empleado, nombre FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#OBTENER ALUMNOS
	#-------------------------------------
	#Obtiene las alumnos de toda la tabla
	public static function obtenerAlumnosModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre FROM $tabla");
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#OBTENER ALUMNOS NIVEL
	#-------------------------------------
	#Obtiene los alumnos que tienen a cierto tutor
	public static function obtenerAlumnosNivelModel($tabla, $id){
		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre FROM $tabla WHERE id_tutor=:id_tutor");
		$stmt->bindParam(":id_tutor", $id, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	#ACTUALIZAR MAESTRO
	#-------------------------------------
	#Permite realizar un update a la tabla de maestros
	public static function actualizarMaestroModel($datosModel, $tabla){

		var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, email = :email, password = :password, id_carrera = :id_carrera WHERE num_empleado = :num_empleado");

		$stmt->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#BORRAR MAESTRO
	#------------------------------------
	public static function borrarMaestroModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE num_empleado = :num_empleado");
		$stmt->bindParam(":num_empleado", $datosModel, PDO::PARAM_STR);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}

	#REGISTRO DE MAESTROS
	#-------------------------------------
	public static function registroMaestroModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (num_empleado, nombre, email, password, id_carrera, nivel) VALUES (:num_empleado,:nombre,:email,:password,:id_carrera,:nivel)");

		$stmt1->bindParam(":num_empleado", $datosModel["num_empleado"], PDO::PARAM_STR);
		$stmt1->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt1->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt1->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt1->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);
		$stmt1->bindParam(":nivel", $datosModel["nivel"], PDO::PARAM_INT);

		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#REGISTRO DE ALUMNOS
	#-------------------------------------
	public static function registroAlumnoModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula, nombre, id_carrera, id_tutor) VALUES (:matricula,:nombre,:id_carrera,:id_tutor)");

		$stmt1->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt1->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt1->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);
		$stmt1->bindParam(":id_tutor", $datosModel["id_tutor"], PDO::PARAM_INT);

		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#VISTA ALUMNOS
	#-------------------------------------
	public static function vistaAlumnoModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT a.matricula as matricula, a.nombre as nombre, c.nombre as carrera, m.nombre as tutor from $tabla as a inner join carrera as c on c.id=a.id_carrera INNER JOIN maestros as m on m.num_empleado=a.id_tutor");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	public static function vistaAlumnosMateriasModel($datosModel, $tabla){
	//PREPARAMOS LA SENTENCIA PARA VER LOS PRODUCTOS
	$stmt = Conexion::conectar()->prepare("SELECT ma.id, a.nombre FROM $tabla ma INNER JOIN alumnos a ON ma.id_alumno = a.matricula WHERE ma.id_materia = :id");
	//EJECUTAR SENTENCIA

	$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
	$stmt->execute();

	#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
	return $stmt->fetchAll();

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

	#EDICION DE ALUMNOS
	#-------------------------------------
	public static function editarAlumnoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT matricula, nombre, id_carrera, id_tutor FROM $tabla WHERE matricula = :matricula");
		$stmt->bindParam(":matricula", $datosModel, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZACION DE ALUMNOS
	#-------------------------------------
	public static function actualizarAlumnoModel($datosModel, $tabla){
		var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, id_carrera = :id_carrera, id_tutor = :id_tutor WHERE matricula = :matricula");

		$stmt->bindParam(":matricula", $datosModel["matricula"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":id_carrera", $datosModel["id_carrera"], PDO::PARAM_INT);
		$stmt->bindParam(":id_tutor", $datosModel["id_tutor"], PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#BORRAR USUARIO
	#------------------------------------
	public static function borrarAlumnoModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE matricula = :matricula");
		$stmt->bindParam(":matricula", $datosModel, PDO::PARAM_STR);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}


	#VISTA CARRERA
	#-------------------------------------
	public static function vistaCarreraModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre from $tabla");
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement.
		return $stmt->fetchAll();

		$stmt->close();

	}

	#REGISTRO DE CARRERAS
	#-------------------------------------
	public static function registroCarreraModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre) VALUES (:nombre)");

		$stmt1->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#EDICION DE LA CARRERA
	#-------------------------------------
	public static function editarCarreraModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, nombre FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZACION DE LA CARRERA
	#-------------------------------------
	public static function actualizarCarreraModel($datosModel, $tabla){
		var_dump($datosModel);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);

		var_dump($datosModel);
		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}

	#BORRAR TODO SOBRE LA CARRERA
	#------------------------------------
	public static function borrarCarreraModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

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

	#VISTA DE LAS TUTORIAS POR NIVEL
	#-------------------------------------
	#Muestra solo las tutorias que ha hecho el empleado, con el numero de maestro ingresado
	public static function vistaTutoriasNivelModel($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where num_maestro=:num_maestro");
		$stmt->bindParam(":num_maestro", $id, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#BORRAR DE LAS TUTORIAS
	#-------------------------------------
	public static function borrarTutoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();

	}

	#BORRAR ALUMNOS TUTORIAS
	#-------------------------------------
	public static function borrarAlumnosTutoriaModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_sesion = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}


	#REGISTRO DE TUTORIAS
	#-------------------------------------
	public static function registroTutoriaModel($datosModel, $tabla){

		$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (fecha, hora, tipo, tema, num_maestro) VALUES (:fecha,:hora,:tipo,:tema,:num_maestro)");

		$stmt1->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt1->bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
		$stmt1->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt1->bindParam(":tema", $datosModel["tema"], PDO::PARAM_STR);
		$stmt1->bindParam(":num_maestro", $datosModel["num_maestro"], PDO::PARAM_STR);

		var_dump($datosModel);

		if($stmt1->execute()){
			return "success";
		}
		else{
			return "error";
		}

		$stmt1->close();

	}

	#OBTENER ULTIMA TUTORIA
	#-------------------------------------
	public static function ObtenerLastTutoria($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT max(id) FROM $tabla");
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}

	#REGISTRO DE LOS ALUMNOS
	#-------------------------------------
	public static function registroAlumnosTutoriaModel($datosModel, $id_sesion, $tabla){
		$datosModel_array =  explode(",",$datosModel);

		for($i=0;$i<sizeof($datosModel_array);$i++){
			$stmt1 = Conexion::conectar()->prepare("INSERT INTO $tabla (matricula_alumno, id_sesion) VALUES (:matricula_alumno,:id_sesion)");
			$stmt1->bindParam(":matricula_alumno", $datosModel_array[$i], PDO::PARAM_STR);
			$stmt1->bindParam(":id_sesion", $id_sesion, PDO::PARAM_INT);

			if(!$stmt1->execute())
				return "error";

		}

		return "success";

		$stmt1->close();

	}

	#EDICION DE LA INTERFAZ
	#-------------------------------------
	public static function editarTutoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, hora, fecha, tipo, tema, num_maestro FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#OBTENER LOS ALUMNOS DE LA TUTORIA
	#-------------------------------------
	public static function obtenerAlumnosTutoriaModel($datosModel,$tabla){

		$stmt = Conexion::conectar()->prepare("SELECT st.matricula_alumno, a.nombre FROM $tabla as st INNER JOIN alumnos AS a ON a.matricula=st.matricula_alumno WHERE st.id_sesion=:id_sesion");
		$stmt->bindParam(":id_sesion", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();
	}

	#ACTUALIZA EL TUTOR MUCHO MAS.
	#-------------------------------------
	public static function actualizarTutoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, hora = :hora, tipo = :tipo, tema = :tema WHERE id = :id");

		$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":hora", $datosModel["hora"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datosModel["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":tema", $datosModel["tema"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute())
			return "success";
		else
			return "error";

		$stmt->close();
	}


}

?>
