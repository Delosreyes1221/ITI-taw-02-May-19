<h1>RESERVARCION DE HABITACIONES</h1>
<!-- VISTA DE REGISTRO DE USUARIOS CON INPUT DE REGISTRO DE USUARIOS -->
<form method="post">

<!-- SELECT TIPO DE HABITACION -->
<!-- Label TIPO DE HABITACION -->
<label for="" style="font-size:20px;">Nombre del cliente</label>
<select name="nombreCliente" >
				<option value="<?php$item['nombre'];?>"> <?php.$item['nombre'];?></option>
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
