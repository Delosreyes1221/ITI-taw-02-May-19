<?php
//clase conexion
class Conexion{
	//funcion para conectar a la bd por PDO
	public static function conectar(){
		//crear objeto de tipo PDO
		$link = new PDO("mysql:host=localhost;dbname=unidad1","root","");
		//retorna la conexion
		return $link;

	}

}

?>
