


<?php 

//El index muestra la salida de las vistas al usuario
//tambien a traves de el enviaremos las distintas acciones 
//que el usuario envie al controlador

//require_once establece el codigo del archivo a utilizar

	require_once "Controller/controller.php";
	require_once "Model/model.php";

	$mvc = new MvcController();
	$mvc->plantilla();
 ?>