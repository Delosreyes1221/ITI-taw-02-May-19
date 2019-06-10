
<?PHP
error_reporting(0);
$datosController = $_GET["id"];
error_reporting(0);
$Id_materia = $datosController;
//$respuesta = Datos::vistaAlumnosModel("alumnos");
$respuesta2 = Datos::vistaAlumnosMateriasModel($datosController,"contacto");
?>
<h1 align="center">CONTACTOS DEL PROVEEDOR</h1>
    <div class="row-spacing col-lg-7">
        <table class="table">
          <thead>

            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>Email</th>
            <th>TELEFONO</th>
            <th>CLAVE</th>
            <?php
          echo '</thead>';
          foreach($respuesta2 as $row => $item){
          echo'<tr>

              <td>'.$item["nombre"].'</td>
              <td>'.$item["apellidos"].'</td>
              <td>'.$item["email"].'</td>
              <td>'.$item["telefono"].'</td>
              <td>'.$item["clave"].'</td>
              
            </tr>';

          }
        echo '</table>';
      echo '<div>';

      $registro = new MvcController();
      $registro -> borrarAlumnoMateriaController();
?>
