<h1>REGISTRO DE RESERVACIONES</h1>
<!-- VISTA DE REGISTRO DE USUARIOS CON INPUT DE REGISTRO DE USUARIOS -->
<form method="post">

<!-- SELECT TIPO DE HABITACION -->
<!-- Label TIPO DE HABITACION -->
<label for="" style="font-size:20px;">Tipo de habitacion</label>
	<select name="tipoReservacion" id="id_habitacion">
		<option value="1">Simple</option>
		<option value="2">Doble</option>
		<option value="3">Matrimonial</option>
	</select>

<!-- INPUT DE EMAIL -->
	<input type="number" placeholder="Noches de hospedaje" name="nochesReservacion" required>


<!-- INPUT DE BOTON DE GUARDAR O ENVIAR -->
	<input type="submit" type="button" class="btn btn-success" value="Enviar">

</form>

<?php
//LAMA AL MAETODO DE REGSITRO DE USUARIO NUEVO
$registro = new MvcController();
$registro -> registroReservacionController();

if(isset($_GET["action"])){

	if($_GET["action"] == "okRes"){

		echo "Registro Exitoso";
	
	}

}

?>
