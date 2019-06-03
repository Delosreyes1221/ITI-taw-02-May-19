<?php

class Conexion{
	public static function conectar(){
			$link = new PDO("mysql:host=localhost;dbname=tutorias","root","");
			echo "dseee";
		return $link;

	}

}


//Verificar conexión correcta
//$a= new Conexion();
//$a -> conectar();

?>
