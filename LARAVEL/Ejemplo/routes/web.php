<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function() {
    return view('hola');
});

// Cuando un usurio hace un peticion http Laravel busca en los archivos de rutas una definicion que coincida cn el patron de la url segun
// el metodo usado en la primera coincidencia le muestra el resultado al usuario 

Route::get('/taw', function() {
    return ('Bienvenidos');
});

Route::get('/usr', function() {
    return 'Mostrando el Id del usuario: '.$_GET['id'];
});
//Debemos poner en l url http://127.0.0.1:8000/usr?id=5

//Mostrar una ruta limpia
Route::get('/usr/{id}', function($id) {
    return "Mostrando el Id del usuario: {$id}";
})->where ('id', '[0-9] +');

//Mostrar una ruta limpia
Route::get('/saludo/{name}/{nicknme}', function($name, $nickname) {
    return "Bienvenido {name}, tu apodo es {nickname}";
});

//http://127.0.0.1:8000/saludo/mrio/perro

//Mostrar una ruta limpia
Route::get('/saludo2 /{name}/{nicknme}', function($name, $nickname=null) {
	if($nickname){
		return "Bienvenido {name}, tu apodo es {nickname}";
	}else{
		return "Bienvenido {name}, tu no apodo es {nickname}";
	}
    
});

//Mostrar una ruta limpia
Route::get('/principal',function () {
	return view('principal');
    
});

//Mostrar una con seccion/yield
Route::get('/principal2',function () {
	return view('principal/contenido');
    
});


//RUTAS DE CRUD 