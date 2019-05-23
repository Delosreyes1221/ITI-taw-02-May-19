<?php
//SE LLAMA A LOS ENLACES DE LOS MODELOS
require_once "models/enlaces.php";
//SE LLAMA AL CRUD DE LOS MODELOS
require_once "models/crud.php";
//SE LLAMA AL CONTROLADOR
require_once "controllers/controller.php";
//OBJETO DE CONTROLADOR
$mvc = new MvcController();
//METODO DE PAGINA DEL CONTROLADOR QUE LLAMA AL TEMPLATE
$mvc -> pagina();

?>